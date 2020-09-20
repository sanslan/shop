<?php

namespace App\Http\Controllers\V1\Panel\Shop;

use App\Http\Controllers\Controller;
use App\Repositories\V1\Panel\Shop\Interfaces\ShopRepositoryInterface;

class ShopController extends Controller
{

    private $shopRepository;

    public function __construct(ShopRepositoryInterface $shopRepository)
    {
        $this->shopRepository = $shopRepository;
    }
    /**
     * Display shop data and statistics.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $shop_data = $this->shopRepository->get_data();

        return response()->json(['data' => $shop_data,'status' => 'success']);
    }
}
