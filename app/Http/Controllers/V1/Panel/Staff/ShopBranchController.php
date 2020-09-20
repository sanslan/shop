<?php

namespace App\Http\Controllers\V1\Panel\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Panel\Staff\StoreShopBranch;
use App\Http\Requests\V1\Panel\Staff\UpdateShopBranch;
use App\Models\Finance\SubAccount;
use App\Models\Shop\Shop;
use App\Models\Shop\ShopBranch;
use Grimzy\LaravelMysqlSpatial\Types\Point;

class ShopBranchController extends Controller
{
    /**
     * Display a listing of the shop branches.
     *
     * @param integer $shop_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get_shop_branches($shop_id)
    {
        $shop_branches = ShopBranch::where('shop_id',$shop_id)
            ->with(['status','sub_account','country.translation','city.translation','state.translation'])
            ->paginate(10)->each(function ($row){
                $row->append('shop_name');
            });

        return response()->json(['data' => $shop_branches,'status' => 'success'],200);
    }

    /**
     * Store a newly created shop branch in storage.
     *
     * @param  StoreShopBranch  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreShopBranch $request)
    {

        $sub_account = SubAccount::create([
            'name' => request('name'),
            'account_id' => Shop::find(request('shop_id'))->account_id,
            'balance' => 0
        ]);

        $shop_branch = new ShopBranch($request->validated());
        $shop_branch->location = new Point(request('lat'),request('long'));
        $shop_branch->sub_account_id = $sub_account->id;
        $shop_branch->save();


        return response()->json(['data' => $shop_branch,'status' => 'success'],201);
    }

    /**
     * Display the specified shop branch.
     *
     * @param  ShopBranch $shop_branch
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShopBranch $shop_branch)
    {
        $shop_branch->load(['status','sub_account','country.translation','city.translation','state.translation'])
            ->append('shop_name','product_count','order_count');

        return response()->json(['data' => $shop_branch,'status' => 'success'],201);
    }

    /**
     * Update the specified shop branch in storage.
     *
     * @param  UpdateShopBranch  $request
     * @param  ShopBranch  $shop_branch
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateShopBranch $request, ShopBranch  $shop_branch)
    {

        $shop_branch->fill($request->validated());
        $shop_branch->location = new Point(request('lat'),request('long'));
        $shop_branch->save();

        $shop_branch->sub_account->update(['balance' => $request->balance]);

        return response()->json(['data' => $shop_branch,'status' => 'success'],201);
    }

    /**
     * Remove the specified shop branch from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        //
    }
}
