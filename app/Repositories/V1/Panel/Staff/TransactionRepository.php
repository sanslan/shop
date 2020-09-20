<?php
namespace App\Repositories\V1\Panel\Staff;


use App\Models\Finance\Transaction;
use App\Repositories\V1\Panel\Staff\Interfaces\TransactionRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Str;

class TransactionRepository implements TransactionRepositoryInterface
{
    private $model;

    protected $searchable = ['id','sub_account_id','date','type','status'];

    const TRANSACTION_INCOME = 1;
    const TRANSACTION_EXPENSE = 2;

    public function __construct(Transaction $transaction)
    {
        $this->model = $transaction;
    }

    public function store( $request, $balance )
    {
        //Withdraw from account
        if($request['account_id']){
            $new_balance = 0;
        }
        //Withdraw from sub account
       else if('sub_account_id'){
           if($request['type'] == self::TRANSACTION_EXPENSE){
               $new_balance = number_format( $balance - $request['amount'], 2 );
           }
           //Income
           else{
               $new_balance = number_format( $balance + $request['amount'], 2 );
           }
       }
       if(isset($new_balance)){
           $transaction_data = array_merge($request,[
                   'currency' => 'AZN',
                   'staff_id' => auth()->id(),
                   'transaction_ref' => Str::random(32),
                   'balance' => $new_balance
               ]
           );
           return $this->model->create( $transaction_data );
       }
    }

    public function list_transactions()
    {
        return $this->model->paginate(10);
    }

    public function findById( $transaction_id )
    {
        return $this->model->with([
            'sub_account' => function ($q) {
                $q->select('id', 'name');
            },
            'staff' =>function ($q) {
                $q->select('id','name');
            },
        ])->find( $transaction_id );
    }

    public function search()
    {

        $transactions = $this->model;

        foreach (request()->all() as $filter_column => $filter_value){

            if( ! in_array( $filter_column,$this->searchable ) || ! is_int( intval($filter_value) )){
                continue;
            }
            if( $filter_column == 'date' ){
                $date_arr = explode("-",$filter_value);
                if(count($date_arr) == 2){
                    $from = Carbon::parse($date_arr[0])->startOfDay()->toDateTimeString();
                    $to = Carbon::parse($date_arr[1])->endOfDay()->toDateTimeString();

                    $transactions = $transactions->whereBetween('created_at',array($from,$to));
                }else continue;

            }
            else{
                $transactions = $transactions->where($filter_column,$filter_value);
            }

        }

        return $transactions->paginate(10);

    }

}
