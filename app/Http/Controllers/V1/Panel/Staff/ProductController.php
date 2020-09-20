<?php

namespace App\Http\Controllers\V1\Panel\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Panel\Staff\StoreProduct;
use App\Http\Requests\V1\Panel\Staff\StoreProductCustomOption;
use App\Http\Requests\V1\Panel\Staff\StoreProductOption;
use App\Http\Requests\V1\Panel\Staff\UpdateProduct;
use App\Http\Requests\V1\Panel\Staff\UpdateProductCustomOption;
use App\Models\Category\Category;
use App\Models\Category\SubCategory;
use App\Models\Product\Product;
use App\Models\Product\ProductImage;
use App\Models\Product\ProductOption;
use App\Models\Shop\Shop;
use App\Repositories\V1\Panel\Staff\Interfaces\ProductRepositoryInterface;

class ProductController extends Controller
{

    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Display products.
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
     * Store a product with translation.
     *
     * @param  StoreProduct  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreProduct $request)
    {
        $product = $this->productRepository->create_product($request);

        return response()->json(['data' => $product,'status' => 'success']);
    }

//    /**
//     * Store a product with translation.
//     *
//     * @param int $product_id
//     * @param  StoreProduct  $request
//     * @return \Illuminate\Http\JsonResponse
//     */
//    public function create_other_branch_product(StoreProduct $request,$product_id)
//    {
//        $product = $this->productRepository->create_other_branch_product($request,$product_id);
//
//        return response()->json(['data' => $product,'status' => 'success']);
//    }

    /**
     * Store a product with translation.
     *
     * @param  StoreProductOption  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store_option(StoreProductOption $request)
    {
        $product_option_value = $this->productRepository->create_option($request);

        return response()->json(['data' => $product_option_value,'status' => 'success']);
    }

    /**
     * Store a product with translation.
     *
     * @param  StoreProductCustomOption $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store_custom_option(StoreProductCustomOption $request)
    {
        $product_custom_options = $this->productRepository->create_custom_option($request);

        return response()->json(['data' => $product_custom_options,'status' => 'success']);
    }

    /**
     * Display product.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $product = $this->productRepository->findProductById($id);

        return response()->json(['data' => $product,'status' => 'success']);
    }

    /**
     * Display product options.
     *
     * @param  int $product_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get_product_options($product_id)
    {
        $options = $this->productRepository->findProductOptions($product_id);

        return response()->json(['data' => $options,'status' => 'success']);
    }

    /**
     * Display product custom options.
     *
     * @param  int $product_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get_product_custom_options($product_id)
    {
        $options = $this->productRepository->findProductCustomOptions($product_id);

        return response()->json(['data' => $options,'status' => 'success']);
    }

    /**
     * Update the specified product in storage.
     *
     * @param  UpdateProduct $request
     * @param  Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateProduct $request, Product $product)
    {

        $product = $this->productRepository->update_product($request,$product);

        return response()->json(['data' => $product,'status' => 'success']);
    }

    /**
     * Update product custom option.
     *
     * @param  UpdateProductCustomOption $request
     * @param  ProductOption $product_option
     * @return \Illuminate\Http\JsonResponse
     */
    public function update_product_custom_option(UpdateProductCustomOption $request,ProductOption $product_option)
    {
        $product_custom_option = $this->productRepository->updateProductCustomOption($request,$product_option);

        return response()->json(['data' => $product_custom_option,'status' => 'success']);
    }

    /**
     * Remove the specified image from storage.
     *
     * @param  ProductImage $image
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy_image(ProductImage $image)
    {
        $this->productRepository->delete_product_image($image);

        return response()->json(['status' => 'success'],200);
    }

    /**
     * Remove the specified product option from storage.
     *
     * @param  ProductOption $product_option
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy_product_option(ProductOption $product_option)
    {
        $this->productRepository->delete_product_option($product_option);

        return response()->json(['status' => 'success'],200);
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
     * Get shops list.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function get_shops()
    {
        $shops = $this->productRepository->get_shops();

        return response()->json(['data' => $shops,'status' => 'success']);
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

//    /**
//     * Get shop branches.
//     *
//     * @param int  $product_id
//     * @return \Illuminate\Http\JsonResponse
//     */
//    public function product_shop_branches($product_id)
//    {
//        $product_branches =  $this->productRepository->product_shops_branches($product_id);
//
//        return response()->json(['data' => $product_branches,'status' => 'success']);
//    }

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
