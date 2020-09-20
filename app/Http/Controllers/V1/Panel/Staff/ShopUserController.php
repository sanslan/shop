<?php

namespace App\Http\Controllers\V1\Panel\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Panel\Shop\RegisterShopUser;
use App\Http\Requests\V1\Panel\Shop\UpdateShopUser;
use App\Models\Shop\ShopUser;
use App\Models\Shop\ShopUserRole;
use Illuminate\Support\Facades\Hash;

class ShopUserController extends Controller
{
    /**
     * Display a listing of the shop users.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($shop_id)
    {
        $shop_users = ShopUser::where('shop_id',$shop_id)->paginate(10);
        return response()->json(['data' => $shop_users,'status' => 'success']);
    }

    /**
     * Store a newly created shop user in storage.
     *
     * @param RegisterShopUser $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(RegisterShopUser $request)
    {
        $request_data =  array_merge($request->validated(),['password' =>Hash::make($request->password) ]);
        $shop_user =  ShopUser::create($request_data);
        $shop_user->load('role');

        return response()->json(['data' => $shop_user,'status' => 'success']);
    }

    /**
     * Display the specified shop user.
     *
     * @param  ShopUser  $shop_user
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShopUser  $shop_user)
    {
        return response()->json(['data' => $shop_user,'status' => 'success']);
    }

    /**
     * Update the specified shop user in storage.
     *
     * @param UpdateShopUser $request
     * @param  ShopUser  $shop_user
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateShopUser $request,ShopUser  $shop_user)
    {
        $request_data = $request->validated();
        if(request('password')){
            $request_data =  array_merge($request_data,['password' =>Hash::make($request->password) ]);
        }
        $shop_user->update($request_data);

        return response()->json(['data' => $shop_user,'status' => 'success']);
    }

    /**
     * Remove the specified shop user from storage.
     *
     * @param  ShopUser  $shop_user
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShopUser $shop_user)
    {
        $shop_user->delete();
        return response()->json(['status' => 'success'],200);
    }

    /**
     * Display shop user roles.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function get_user_roles()
    {
        $shop_user_roles = ShopUserRole::all();

        return response()->json(['data' => $shop_user_roles,'status' => 'success']);
    }
}
