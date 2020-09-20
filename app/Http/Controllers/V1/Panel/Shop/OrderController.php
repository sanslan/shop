<?php

namespace App\Http\Controllers\V1\Panel\Shop;

use App\Http\Controllers\Controller;
use App\Repositories\V1\Panel\Shop\Interfaces\OrderRepositoryInterface;

class OrderController extends Controller
{

    private $orderRepository;

    public function __construct(OrderRepositoryInterface $prderRepository)
    {
        $this->orderRepository = $prderRepository;
    }

    /**
     * Display a listing of the orders.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function orders()
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
     * @param  int  $order_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($order_id)
    {
        $order = $this->orderRepository->findById($order_id);

        return response()->json(['data' => $order,'status' => 'success']);
    }


}
