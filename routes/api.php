<?php

use Illuminate\Support\Facades\Route;


/******************Authentication route*********************/

//Client Auth routes
Route::group(['namespace' => 'V1\Client','prefix' => 'v1'], function()
{
    Route::post('/user/register', 'AuthController@register');
    Route::post('/user/login', 'AuthController@login');
});

//Staff Auth  routes
Route::group(['namespace' => 'V1\Panel\Staff','prefix' => 'v1'], function()
{
    Route::post('/staff/login', 'AuthController@login');
});

//Shop User Auth  routes
Route::group(['namespace' => 'V1\Panel\Shop','prefix' => 'v1'], function()
{
    Route::post('/shop/user/login', 'ShopUserAuthController@login');
});

//Delivery Companies Auth  routes
Route::group(['namespace' => 'V1\Panel\DeliveryCompany','prefix' => 'v1'], function()
{
    //Route::post('/shop/user/register', 'ShopUserAuthController@register');
    Route::post('/delivery/login', 'DeliveryCompanyAuthController@login');
});

//Courier Auth  routes
Route::group(['namespace' => 'V1\Panel\DeliveryCompany','prefix' => 'v1'], function()
{
    //Route::post('/shop/user/register', 'ShopUserAuthController@register');
    Route::post('/delivery/courier/login', 'CourierAuthController@login');
});


/********************************Staff routes*************************************/
Route::group(['namespace' => 'V1\Panel\Staff','prefix' => 'v1/staff/','middleware' => 'auth:staff'], function()
{
    //Navigation
    Route::get('navigation', 'NavigationController@getNavigation');
    //Users
    Route::get('users', 'UserController@index');
    Route::get('users/addresses/{user}', 'UserController@get_user_addresses');
    Route::get('users/{user}', 'UserController@show');
    Route::put('user/{user}', 'UserController@update');
    //Categories
    Route::get('categories', 'CategoryController@index');
    Route::get('categories/{category}', 'CategoryController@show');
    Route::post('categories', 'CategoryController@store');
    Route::put('category/{category}', 'CategoryController@update');
    //Route::delete('category/{category}', 'CategoryController@destroy');
    //SubCategories
    Route::get('subcategories/{sub_category}', 'SubCategoryController@show');
    Route::post('subcategories', 'SubCategoryController@store');
    Route::put('subcategory/{subcategory}', 'SubCategoryController@update');
    //Route::delete('subcategory/{subcategory}', 'SubCategoryController@destroy');
    //Shops
    Route::get('shops/{shop}/categories', 'ShopController@getCategories');
    Route::post('shops/categories', 'ShopController@storeCategories');
    Route::delete('shops/categories', 'ShopController@deleteCategories');
    Route::get('shops', 'ShopController@index');
    Route::get('shops/statuses', 'ShopController@getStatuses');
    Route::get('shops/{shop}', 'ShopController@show');
    Route::post('shops', 'ShopController@store');
    Route::put('shop/{shop}', 'ShopController@update');
    //Shop branches
    Route::get('shops/{shop_id}/branches', 'ShopBranchController@get_shop_branches');
    Route::get('shops/branch/{shop_branch}', 'ShopBranchController@show');
    Route::post('shops/branches', 'ShopBranchController@store');
    Route::put('shops/branch/{shop_branch}', 'ShopBranchController@update');
    //Shop users
    Route::get('shops/{shop_id}/users', 'ShopUserController@index');
    Route::get('shops/users/roles', 'ShopUserController@get_user_roles');
    Route::get('shops/users/{shop_user}', 'ShopUserController@show');
    Route::post('shops/users', 'ShopUserController@store');
    Route::put('shops/users/{shop_user}', 'ShopUserController@update');
    //Route::delete('shops/users/{shop_user}', 'ShopUserController@destroy');

    //Staff users
    Route::get('staff_users', 'StaffUserController@index');
    Route::get('staff_users/{user}', 'StaffUserController@show');
    Route::post('staff_users', 'StaffUserController@store');
    Route::put('staff_user/{user}', 'StaffUserController@update');
    //Brands
    Route::get('brands', 'BrandController@index');
    Route::get('brands/{brand}', 'BrandController@show');
    Route::post('brands', 'BrandController@store');
    Route::put('brands/{brand}', 'BrandController@update');
    Route::delete('brands/{brand}', 'BrandController@destroy');

    //Delivery companies user
    Route::get('delivery_companies/{company_id}/users', 'DeliveryCompanyUsersController@index');
    Route::get('delivery_companies/users/{user_id}', 'DeliveryCompanyUsersController@show');
    Route::put('delivery_companies/users/{user_id}', 'DeliveryCompanyUsersController@update');
    Route::post('delivery_companies/users', 'DeliveryCompanyUsersController@store');

    //Delivery companies couriers
    Route::get('delivery_companies/{company_id}/couriers', 'DeliveryCompanyCouriersController@index');

    //Delivery companies
    Route::get('delivery_companies', 'DeliveryCompanyController@index');
    Route::get('delivery_companies/{company_id}', 'DeliveryCompanyController@show');
    Route::put('delivery_companies/{company_id}', 'DeliveryCompanyController@update');
    Route::post('delivery_companies', 'DeliveryCompanyController@store');

    //Product options
    Route::get('options/types', 'OptionController@get_option_types');
    Route::get('options/sub_categories', 'OptionController@get_sub_categories');
    Route::get('options', 'OptionController@index');
    Route::get('options/{option}', 'OptionController@show');
    Route::post('options', 'OptionController@store');
    Route::post('options/values/{option}', 'OptionController@option_values_create');
    Route::put('options/values/{option}', 'OptionController@option_values_update');
    Route::put('options/{option}', 'OptionController@update');
    Route::delete('options/value/{option_value}', 'OptionController@destroy_option_value');
    Route::delete('options/{option}', 'OptionController@destroy');
    //Products
    Route::post('products/upload', 'ProductImageController@upload');
    Route::get('products/categories', 'ProductController@get_categories');
    Route::get('products/sub_of_sub_categories/{sub_category}', 'ProductController@get_sub_of_sub_categories');
    Route::get('products/sub_categories/{category}', 'ProductController@get_sub_categories');
    Route::get('products/shops', 'ProductController@get_shops');
    Route::get('products/shop_branches/{shop}', 'ProductController@get_shop_branches');
    Route::get('products/brands', 'ProductController@get_brands');
    Route::get('products/get_sub_category_options/{subCategory}', 'OptionController@get_sub_category_options');
    Route::get('products/option_values/{option}', 'OptionController@get_option_values');

    Route::get('products', 'ProductController@index');
    Route::get('products/{product_id}/get_product_options', 'ProductController@get_product_options');
    Route::get('products/{product_id}/get_product_custom_options', 'ProductController@get_product_custom_options');
    Route::get('products/{product}', 'ProductController@show');
    //Route::post('/staff/products/other_branch_product/{product_id}', 'ProductController@create_other_branch_product');
    Route::post('products', 'ProductController@store');
    Route::put('products/{product}', 'ProductController@update');
    Route::delete('products/image/{image}', 'ProductController@destroy_image');
    Route::delete('products/options/{product_option}', 'ProductController@destroy_product_option');
    Route::post('products/options', 'ProductController@store_option');
    Route::post('products/custom_options', 'ProductController@store_custom_option');
    Route::put('products/custom_options/{product_option}', 'ProductController@update_product_custom_option');

    //Orders
    Route::get('orders', 'OrderController@index');
    Route::get('orders/order_statuses', 'OrderController@order_statuses');
    Route::get('orders/{order_id}', 'OrderController@show');
    Route::post('orders/demo_order_creator', 'OrderController@demo_order_creator');
    Route::delete('orders/clear_all_orders', 'OrderController@clear_all_orders');

    //Transactions
    Route::get('transactions/get_accounts', 'TransactionController@get_accounts');
    Route::get('transactions', 'TransactionController@index');
    Route::get('transactions/{transaction_id}', 'TransactionController@show');
    Route::get('transactions/get_sub_accounts/{account_id}', 'TransactionController@get_sub_accounts');
    Route::post('transactions', 'TransactionController@store');
});

/********************************Shop panel routes*************************************/
Route::group(['namespace' => 'V1\Panel\Shop','prefix' => 'v1/shop/','middleware' => 'auth:shop_user'], function()
{
    //Shop user logout
    Route::post('users/logout', 'ShopUserAuthController@logout');
    //Users
    Route::post('users', 'UserController@store');
    Route::get('users/roles', 'UserController@user_roles');
    Route::put('users/{user_id}', 'UserController@update');
    Route::get('users/{user_id}', 'UserController@show');
    Route::get('users', 'UserController@index');
    Route::delete('users/{user_id}', 'UserController@destroy');

    //Branches
    Route::get('branches/statuses', 'BranchController@branch_statuses');
    Route::put('branches/{branch_id}', 'BranchController@update');
    Route::get('branches/{branch_id}', 'BranchController@show');
    Route::get('branches', 'BranchController@index');

    //Transactions
    Route::get('transactions', 'TransactionController@index');
    Route::get('transactions/{transaction_id}', 'TransactionController@show');

    //Shop data
    Route::get('shops', 'ShopController@index');

    //Orders
    Route::get('orders', 'OrderController@orders');
    Route::get('orders/{order_id}', 'OrderController@show');

    //Product details
    Route::get('products/categories', 'ProductController@get_categories');
    Route::get('products/sub_of_sub_categories/{sub_category}', 'ProductController@get_sub_of_sub_categories');
    Route::get('products/sub_categories/{category}', 'ProductController@get_sub_categories');
    Route::get('products/shop_branches', 'ProductController@get_shop_branches');
    Route::get('products/brands', 'ProductController@get_brands');
    Route::get('products/get_sub_category_options/{subCategory}', '\App\Http\Controllers\V1\Panel\Staff\OptionController@get_sub_category_options');
    Route::get('products/option_values/{option}', '\App\Http\Controllers\V1\Panel\Staff\OptionController@get_option_values');

    //Products
    Route::post('products', 'ProductController@store');
    Route::get('products', 'ProductController@index');
    Route::put('products/{product_id}', 'ProductController@update');
    Route::get('products/{product_id}', 'ProductController@show');

});

/******************Data routes*********************/
Route::group(['namespace' => 'V1\Data','prefix' => 'v1'], function()
{
    Route::get('/data/countries', 'DataController@get_countries');
    Route::get('/data/country/cities', 'DataController@get_cities');
    Route::get('/data/city/states', 'DataController@get_states');
    Route::get('/data/weeks', 'DataController@get_week_schedule');
});
