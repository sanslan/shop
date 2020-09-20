<?php
namespace App\Repositories\V1\Panel\Shop;

use App\Models\Finance\Transaction;
use App\Models\Shop\Shop;
use App\Repositories\V1\Panel\Shop\Interfaces\TransactionRepositoryInterface;
use Carbon\Carbon;

class TransactionRepository implements TransactionRepositoryInterface
{

    private $model;
    private $model_shop;
    private $shop_id;
    protected $searchable = ['id','sub_account_id','date','type','status'];

    public function __construct( Transaction $transaction, Shop $shop )
    {
        $this->model = $transaction;
        $this->model_shop = $shop;
        $this->shop_id = auth('shop_user')->check() ? auth('shop_user')->user()->shop_id : null;
    }

    public function all()
    {
        $shop = $this->model_shop->findOrFail($this->shop_id);
        $account_id = $shop->account->id;
        $sub_accounts_ids = $shop->account->sub_accounts->pluck('id')->toArray();

        return $this->model->where('account_id',$account_id)->orWhereIn('sub_account_id',$sub_accounts_ids)
            ->orderBy('created_at')->with(['sub_account','staff'])->paginate(10);
    }

    public function search()
    {
        $shop = $this->model_shop->findOrFail($this->shop_id);
        $account_id = $shop->account->id;
        $sub_accounts_ids = $shop->account->sub_accounts->pluck('id')->toArray();

        $transactions = $this->model->where('account_id',$account_id)->orWhereIn('sub_account_id',$sub_accounts_ids)
            ->orderBy('created_at');

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

    public function findById( $transaction_id )
    {
        $shop = $this->model_shop->findOrFail($this->shop_id);
        $account_id = $shop->account->id;
        $sub_accounts_ids = $shop->account->sub_accounts->pluck('id')->toArray();

        return $this->model->where('account_id',$account_id)->orWhereIn('sub_account_id',$sub_accounts_ids)->with([
            'sub_account' => function ($q) {
                $q->select('id', 'name');
            },
            'staff' =>function ($q) {
                $q->select('id','name');
            },
        ])->findOrFail( $transaction_id );
    }



}
