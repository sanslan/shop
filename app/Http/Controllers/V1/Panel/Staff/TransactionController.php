<?php

namespace App\Http\Controllers\V1\Panel\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Panel\Staff\StoreTransaction;
use App\Repositories\V1\Panel\Staff\Interfaces\AccountRepositoryInterface;
use App\Repositories\V1\Panel\Staff\Interfaces\SubAccountRepositoryInterface;
use App\Repositories\V1\Panel\Staff\Interfaces\TransactionRepositoryInterface;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{

    private $transactionRepository;
    private $accountRepository;
    private $subAccountRepository;

    public function __construct(
        TransactionRepositoryInterface $transactionRepository,
        AccountRepositoryInterface $accountRepository,
        SubAccountRepositoryInterface $subAccountRepository
    )
    {
        $this->transactionRepository = $transactionRepository;
        $this->accountRepository = $accountRepository;
        $this->subAccountRepository = $subAccountRepository;
    }
    /**
     * Display transactions
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $transactions = $this->transactionRepository->list_transactions( );

        if(request()->has('filter')){

            $transactions =  $this->transactionRepository->search();
        }

        return response()->json( ['data' => $transactions,'status' => 'success'] );
    }

    /**
     * Display the specified transaction.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
     public function show($id)
     {
         $transaction = $this->transactionRepository->findById( $id );

         return response()->json( ['data' => $transaction,'status' => 'success'] );
     }

    /**
     * Store a newly created transaction in storage.
     *
     * @param  StoreTransaction  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreTransaction $request)
    {

        //Withdraw amount from sub account
        if( $request->sub_account_id ){

            $sub_account = $this->subAccountRepository->findById( $request->sub_account_id );

            DB::beginTransaction();
            $transaction = $this->transactionRepository->store( $request->validated(), $sub_account->balance );
            //Update sub account balance
            $sub_account->balance = $transaction->balance;
            if( $sub_account->balance < 0 ){
                DB::rollBack();
                return response()->json([ 'message' => 'Yetərli balans yoxdur','status' => 'failed' ],400);
            }
            $sub_account->save();
            DB::commit();
        }
        //Withdraw amount from whole account
        else if( $request->account_id ){

            $account = $this->accountRepository->findById( $request->account_id );

            DB::beginTransaction();
            $transaction = $this->transactionRepository->store( $request->validated(), $account->balance );

            if( $account->balance !=  $request->amount ){
                DB::rollBack();
                return response()->json([ 'message' => 'Məbləğ sub hesabların toplam balansı ilə eyni olmalıdır','status' => 'failed' ],400);
            }
            if( $account->balance == 0 ){
                DB::rollBack();
                return response()->json([ 'message' => 'Sub hesablarda məbləğ yoxdur','status' => 'failed' ],400);
            }
            //Update sub accounts balances
            $account->sub_accounts()->update([ 'balance' => 0 ]);

            DB::commit();
        }



        return response()->json([ 'data' => $transaction,'status' => 'success' ]);
    }

    /**
     * Display all accounts
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function get_accounts()
    {
        $accounts = $this->accountRepository->list_accounts(['id','name'],'name')->append('balance');

        return response()->json(['data' => $accounts,'status' => 'success']);
    }

    /**
     * Display account sub accounts
     *
     * @param int $account_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get_sub_accounts( $account_id )
    {
        $sub_accounts = $this->accountRepository->sub_accounts( $account_id );

        return response()->json( ['data' => $sub_accounts,'status' => 'success'] );
    }

}
