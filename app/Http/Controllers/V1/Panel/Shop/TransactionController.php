<?php

namespace App\Http\Controllers\V1\Panel\Shop;

use App\Http\Controllers\Controller;
use App\Repositories\V1\Panel\Shop\Interfaces\TransactionRepositoryInterface;

class TransactionController extends Controller
{

    private $transactionRepository;

    public function __construct(TransactionRepositoryInterface $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    /**
     * Display a listing of the transactions.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $shop_transactions = $this->transactionRepository->all();

        if(request()->has('filter')){

            $shop_transactions =  $this->transactionRepository->search();
        }

        return response()->json(['data' => $shop_transactions,'status' => 'success']);
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
}
