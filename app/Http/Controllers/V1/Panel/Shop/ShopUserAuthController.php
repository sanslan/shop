<?php

namespace App\Http\Controllers\V1\Panel\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Panel\Shop\RegisterShopUser;
use App\Models\Shop\ShopUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ShopUserAuthController extends Controller
{
    public function register(RegisterShopUser $request){

        $request_data =  array_merge($request->all(),['password' =>Hash::make($request->password) ]);

        $shop_user =  ShopUser::create($request_data);

        return response()->json($shop_user,201);

    }

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:shop_user', ['except' => ['login','register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {

        $credentials = request(['email', 'password']);
        if (! $token = Auth::guard('shop_user')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return response()->json([
            'data' =>[
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth('user')->factory()->getTTL() * 60,
                'user' => auth('staff')->user()
            ],
            'status' => 'success'
        ]);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth('shop_user')->logout();

        return response()->json(['message' => 'Sessiya bitirildi','status' => 'success']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }
}
