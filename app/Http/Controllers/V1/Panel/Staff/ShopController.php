<?php

namespace App\Http\Controllers\V1\Panel\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Panel\Staff\CreateShopCategories;
use App\Http\Requests\V1\Panel\Staff\StoreShop;
use App\Http\Requests\V1\Panel\Staff\UpdateShop;
use App\Models\Finance\Account;
use App\Models\Shop\Shop;
use App\Models\Shop\ShopStatus;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the shops
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $shops = Shop::with('status')->paginate(10)
            ->each(function($row){
                $row->setAppends(['balance','product_count','order_count']);
            });
        return response()->json(['data' => $shops,'status' => 'success']);
    }

    /**
     * Store a newly created shop in storage.
     *
     * @param StoreShop $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreShop $request)
    {
        $shop_data = $request->all();
        $shop_data = store_files(['logo','cover'],$shop_data,'shops');

        //Generate and add unique string for account_id
        $account = Account::create(['name' => $shop_data['name']]);
        $shop_data = array_merge($shop_data,['account_id' => $account->id]);

        $shop = Shop::create($shop_data);
        $shop->append(['balance','product_count','order_count']);
        $shop->load('status');
        return response()->json(['data' => $shop,'status' => 'success'],201);
    }

    /**
     * Display the specified shop.
     *
     * @param  Shop  $shop
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Shop $shop)
    {

        $shop->load('status')->append(['balance','order_count','product_count']);
        return response()->json(['data' => $shop,'status' => 'success']);
    }

    /**
     * Update the specified shop in storage.
     *
     * @param $request
     * @param Shop $shop
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateShop $request, Shop $shop)
    {
        $shop_data = $request->all();
        $shop_data = store_files(['logo','cover'],$shop_data,'shops',$shop);

        $shop->update($shop_data);
        $shop->load('status')->append(['balance','product_count','order_count']);
        return response()->json(['data' => $shop,'status' => 'success'],200);

    }

    /**
     * Remove the specified shop from storage.
     *
     * @param  Shop  $shop
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Shop $shop)
    {
        $shop->delete();
        return response()->json(['status' => 'success'],200);
    }

    /**
     * Add new category to a shop
     *
     * @param  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeCategories(CreateShopCategories $request){

        $shop = Shop::find($request->shop_id);
        $shop->categories()->attach($request->category_id);
        $categories = $shop->categories()->with('tr')->get();

        return response()->json(['data' => $categories,'status' => 'success'],201);
    }

    /**
     * Add new category to a shop
     *
     * @param  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteCategories(Request $request){

        $shop = Shop::find($request->shop_id);
        $shop->categories()->detach($request->category_id);

        return response()->json(['data' => null,'status' => 'success'],200);
    }

    /**
     * List shop categories
     *
     * @param  Shop $shop
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCategories(Shop $shop){

        $categories = $shop->categories()->with('tr')->get();

        return response()->json(['data' => $categories,'status' => 'success'],200);
    }

    /**
     * list shop statuses
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getStatuses(){

        $statuses = ShopStatus::all();

        return response()->json(['data' => $statuses,'status' => 'success'],200);
    }

}
