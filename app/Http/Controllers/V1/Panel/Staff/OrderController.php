<?php

namespace App\Http\Controllers\V1\Panel\Staff;

use App\Http\Controllers\Controller;
use App\Models\DeliveryCompany\Courier;
use App\Models\Order\Cart;
use App\Models\Order\CartItem;
use App\Models\Order\CartProduct;
use App\Models\Order\CartProductOption;
use App\Models\Order\Order;
use App\Models\Order\OrderPaymentMethod;
use App\Models\Order\OrderStatus;
use App\Models\Product\Product;
use App\Models\Product\ProductOption;
use App\Models\Shop\ShopBranch;
use App\Models\User\User;
use App\Models\User\UserAddress;
use App\Repositories\V1\Panel\Staff\Interfaces\OrderRepositoryInterface;

class OrderController extends Controller
{

    private $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }


    /**
     * Display orders
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $orders = $this->orderRepository->all();

        if(request()->has('filter')){

            $orders =  $this->orderRepository->search();
        }

        return response()->json(['data' => $orders,'status' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($order_id)
    {
        $order = $this->orderRepository->findById($order_id);

        return response()->json(['data' => $order,'status' => 'success']);
    }

    /**
     * Display order statuses
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function order_statuses()
    {
        $order_statuses = OrderStatus::with('tr')->get();

        return response()->json(['data' => $order_statuses,'status' => 'success']);
    }

    /**
     * Demo cart and order creator
     */
    public function demo_order_creator()
    {
        $products = Product::limit(10)->latest('id')->pluck('id');

        foreach ($products as $product_id){

            //Create cart product
            $cart_product  = CartProduct::create( ['product_id' => $product_id] );

            $product_option = ProductOption::where('product_id',$product_id)->get();

            //If product has options create cart product options
            if(count($product_option)){

                $product_options_ids =  $product_option->pluck('id');

                foreach ($product_options_ids as $product_option_id){
                    CartProductOption::create([
                       'cart_product_id' => $cart_product->id,
                        'product_option_id' => $product_option_id,
                        'quantity' => 1
                    ]);
                }
            }

        }

        //Create carts
        $site_users = User::pluck('id')->toArray();

        for ( $i=1; $i <= 20;$i++ ){
            $site_user_id = $site_users[array_rand( $site_users )];
            Cart::create([ 'id' => $i, 'user_id' => $site_user_id,'status' => 1 ]);
        }

        //Create cart items
        $all_cart_products = CartProduct::pluck('id')->toArray();

        for ( $i=1; $i <= 100;$i++ ){

            CartItem::create([
                'id' => $i,
                'cart_id' => rand(1,20),
                'cart_product_id' => $all_cart_products[array_rand( $all_cart_products )],
                'quantity' => rand(1,3),
                'price' => rand(100,250)
            ]);
        }

        //Create orders
        $all_shop_branches = ShopBranch::pluck('id')->toArray();
        $all_order_statuses = OrderStatus::pluck('id')->toArray();
        $all_payment_methods = OrderPaymentMethod::pluck('id')->toArray();
        $all_user_addresses = UserAddress::pluck('id')->toArray();
        $all_couriers = Courier::pluck('id')->toArray();

        for ( $i=1; $i <= 96;$i++ ){

            Order::create([
                'id' => $i,
                'cart_id' => rand(1,20),
                'shop_branch_id' => $all_shop_branches[ array_rand( $all_shop_branches ) ],
                'status_id' => $all_order_statuses[ array_rand( $all_order_statuses ) ],
                'payment_method' => $all_payment_methods[ array_rand( $all_payment_methods ) ],
                'payment_status' => rand(0,1),
                'user_id' => $site_users[array_rand( $site_users )],
                'user_address_id' => $all_user_addresses[array_rand( $all_user_addresses )],
                'is_takeaway' => 0,
                'delivery_datetime' => date('Y-m-d H:i:s'),
                'courier_id' => $all_couriers[array_rand( $all_couriers )],
                'delivery_cost' => rand(0,12),
            ]);
        }

        return 'ok';
    }

    /**
     * Clear all card and Orders
     */
    public function clear_all_orders()
    {
        if(request('sabotaj') == 'Sabotaj'){

            //Delete all orders
            $all_orders = Order::pluck('id');
            Order::whereIn('id',$all_orders)->delete();

            //Delete all product options
            CartProductOption::truncate();

            //Delete cart items
            $all_cart_items = CartItem::pluck('id');
            CartItem::whereIn('id',$all_cart_items)->delete();

            //Delete cart products
            $all_cart_products = CartProduct::pluck('id');
            CartProduct::whereIn('id',$all_cart_products)->delete();

            //Delete all carts
            $all_carts = Cart::pluck('id');
            Cart::whereIn('id',$all_carts)->delete();

            return 'Silindi';
        }
    }
}
