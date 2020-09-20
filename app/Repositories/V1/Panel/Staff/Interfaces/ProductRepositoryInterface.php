<?php


namespace App\Repositories\V1\Panel\Staff\Interfaces;


use Illuminate\Support\Collection;

interface ProductRepositoryInterface
{
    public function all();
    public function search();
    public function create_product($request);
    public function create_other_branch_product($request,$product_id);
    public function update_product($request,$product);
    public function create_option($request);
    public function create_custom_option($request);
    public function findProductById($id);
    public function findProductOptions($product_id);
    public function findProductCustomOptions($product_id);
    public function updateProductCustomOption($request,$product_option);
    public function get_categories();
    public function get_sub_categories($category);
    public function get_sub_of_sub_categories($sub_category);
    public function get_shops();
    public function get_shops_branches($shop);
    public function product_shops_branches($product_id);
    public function get_brands();
    public function delete_product_image($image);
    public function delete_product_option($product_option);
}
