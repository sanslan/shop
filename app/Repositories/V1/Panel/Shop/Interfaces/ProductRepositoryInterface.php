<?php


namespace App\Repositories\V1\Panel\Shop\Interfaces;

interface ProductRepositoryInterface
{
    public function all();
    public function search();
    public function create_product($request);
    public function update_product($request,$product);
    public function findProductById($id);
    public function get_categories();
    public function get_sub_categories($category);
    public function get_sub_of_sub_categories($sub_category);
    public function get_shops_branches($shop);
    public function get_brands();
    public function delete_product_image($image);
    public function delete_product_option($product_option);
}
