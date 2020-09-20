<?php

namespace App\Http\Controllers\V1\Panel\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:staff', ['except' => ['login','register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {

        $credentials = request(['email', 'password']);
        if (! $token = Auth::guard('staff')->attempt($credentials)) {
            return response()->json(['message' => 'Elektron poçt adresi və ya şifrə yanlışdır','status' => 'error'], 401);
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
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth('staff')->logout();
        return response()->json(['message' => 'Sessiya bitirildi','status' => 'success']);
    }
}
