<?php

namespace App\Http\Controllers\V1\Panel\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Panel\Shop\StoreProduct;
use App\Http\Requests\V1\Panel\Shop\UpdateProduct;
use App\Models\Category\Category;
use App\Models\Category\SubCategory;
use App\Models\Shop\Shop;
use App\Repositories\V1\Panel\Shop\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $products = $this->productRepository->all();

        if(request()->has('filter')){

            $products =  $this->productRepository->search();
        }

        return response()->json(['data' => $products,'status' => 'success']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreProduct  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreProduct $request)
    {
        $product = $this->productRepository->create_product($request);

        return response()->json(['data' => $product,'status' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $product_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($product_id)
    {
        $product = $this->productRepository->findProductById($product_id);

        return response()->json(['data' => $product,'status' => 'success']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateProduct  $request
     * @param  int  $product_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateProduct $request, $product_id)
    {
        $product = $this->productRepository->update_product($request,$product_id);

        return response()->json(['data' => $product,'status' => 'success']);
    }

    /**
     * Get categories.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function get_categories()
    {
        $categories = $this->productRepository->get_categories();

        return response()->json(['data' => $categories,'status' => 'success']);
    }

    /**
     * Get sub categories of category.
     *
     * @param Category $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function get_sub_categories(Category $category)
    {
        $sub_categories = $this->productRepository->get_sub_categories($category);

        return response()->json(['data' => $sub_categories,'status' => 'success']);
    }

    /**
     * Get sub categories of category.
     *
     * @param SubCategory $sub_category
     * @return \Illuminate\Http\JsonResponse
     */
    public function get_sub_of_sub_categories(SubCategory $sub_category)
    {
        $sub_categories = $this->productRepository->get_sub_of_sub_categories($sub_category);

        return response()->json(['data' => $sub_categories,'status' => 'success']);
    }

    /**
     * Get shop branches.
     *
     * @param Shop  $shop
     * @return \Illuminate\Http\JsonResponse
     */
    public function get_shop_branches(Shop $shop)
    {
        $shop_branches =  $this->productRepository->get_shops_branches($shop);

        return response()->json(['data' => $shop_branches,'status' => 'success']);
    }


    /**
     * Get shop branches.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function get_brands()
    {
        $brands =  $this->productRepository->get_brands();

        return response()->json(['data' => $brands,'status' => 'success']);
    }


}
