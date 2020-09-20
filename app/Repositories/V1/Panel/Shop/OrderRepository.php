<?php
namespace App\Repositories\V1\Panel\Shop;

use App\Models\Order\Order;
use App\Models\Shop\Shop;
use App\Repositories\V1\Panel\Shop\Interfaces\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface
{

    private $model;
    private $model_shop;


    public function __construct( Order $order, Shop $shop)
    {
        $this->model = $order;
        $this->model_shop = $shop;
    }

    public function all()
    {
        $user = auth('shop_user')->user();
        if($user->branch_id){
            $orders = $this->model->where('shop_branch_id',$user->branch_id);
        }else{
            $shop = $this->model_shop->findOrFail($user->shop_id);
            $shop_branches_ids = $shop->branches->pluck('id')->toArray();
            $orders = $this->model->whereIn('shop_branch_id',$shop_branches_ids);
        }
        $orders = $orders->with([

            'user' => function ($q) {
                $q->select(['id', 'last_name', 'first_name']);
            },
            'shop_branch' => function ($q) {
                $q->select(['id','name']);
            },
            'status.tr',

        ])->paginate(10);

        $orders = tap($orders, function ($orders) {
            return $orders->transform(function ($order) {

                $order->total_amount = $order->total_amount();

                return collect($order)->forget(['user_id','shop_branch_id','cart','cart_id',
                    'status_id','payment_method','user_address_id','courier_id','is_takeaway',
                    'delivery_datetime','created_at','updated_at']);
            });
        });


        return $orders;
    }

    public function findById($order_id)
    {
        $user = auth('shop_user')->user();

        if($user->branch_id){
            $orders = $this->model->where('shop_branch_id',$user->branch_id);
        }else{
            $shop = $this->model_shop->findOrFail($user->shop_id);
            $shop_branches_ids = $shop->branches->pluck('id')->toArray();
            $orders = $this->model->whereIn('shop_branch_id',$shop_branches_ids);
        }

        $order = $orders->with([

            'user',
            'user_address',
            'courier.user',
            'shop_branch' => function ($q) {
                $q->select(['id','name']);
            },
            'status.tr',
            'payment'

        ])->findOrFail($order_id);

        $order->products = [];

        $order->cart->cart_items->each(function($cart_item) use($order){
            $order->products =array_merge($order->products, [$cart_item->cart_product->product()]);
        });

        $order->total_amount = $order->total_amount();
        $order->basket_amount = $order->basket_amount();


        $order = collect($order)->forget(['user.id','shop_branch_id','cart','cart_id']);

        return $order;

    }


    public function search()
    {

        $user = auth('shop_user')->user();

        if($user->branch_id){
            $orders = $this->model->where('shop_branch_id',$user->branch_id);
        }else{
            $shop = $this->model_shop->findOrFail($user->shop_id);
            $shop_branches_ids = $shop->branches->pluck('id')->toArray();
            $orders = $this->model->whereIn('shop_branch_id',$shop_branches_ids);
        }

        $orders = $orders->with([

            'user' => function ($q) {
                $q->select(['id', 'last_name', 'first_name']);
            },
            'shop_branch' => function ($q) {
                $q->select(['id','name']);
            },
            'status.tr',

        ]);

        foreach (request()->all() as $filter_column => $filter_value){

            if( ! in_array( $filter_column,$this->searchable ) || ! is_int( intval($filter_value) )){
                continue;
            }
            if( $filter_column == 'shop_id' ){
                $shop_branches = ShopBranch::where('shop_id',$filter_value)->pluck('id');
                $orders = $orders->whereIn('shop_branch_id',$shop_branches);
            }
            else if( $filter_column == 'user' ){
                $users = User::where('first_name','like', '%'.$filter_value."%")
                    ->orWhere('last_name','like', '%'.$filter_value."%")->pluck('id');
                $orders = $orders->whereIn('user_id',$users);
            }
            else{
                $orders = $orders->where($filter_column,$filter_value);
            }

        }

        $orders = $orders->paginate(10);

        $orders = tap($orders, function ($orders) {
            return $orders->transform(function ($order) {

                $order->total_amount = $order->total_amount();

                return collect($order)->forget(['user_id','shop_branch_id','cart','cart_id',
                    'status_id','payment_method','user_address_id','courier_id','is_takeaway',
                    'delivery_datetime','created_at','updated_at']);
            });
        });
        return $orders;
    }



}
