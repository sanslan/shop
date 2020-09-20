<?php

namespace App\Http\Controllers\V1\Panel\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Panel\Shop\StoreUser;
use App\Http\Requests\V1\Panel\Shop\UpdateUser;
use App\Repositories\V1\Panel\Shop\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    /**
     * Display a listing of the shop users.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $shop_users = $this->userRepository->all();

        return response()->json(['data' => $shop_users,'status' => 'success']);
    }

    /**

    /**
     * Store a newly created shop user in storage.
     *
     * @param  StoreUser  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreUser $request)
    {
        $shop_user_data = array_merge($request->validated(),['password' => Hash::make($request->password)]);
        $shop_user = $this->userRepository->create($shop_user_data);

        return response()->json(['data' => $shop_user,'status' => 'success']);
    }

    /**
     * Display the specified shop user.
     *
     * @param  int  $user_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($user_id)
    {
        $shop_user = $this->userRepository->findById($user_id);

        return response()->json(['data' => $shop_user,'status' => 'success']);
    }


    /**
     * Update the specified shop user in storage.
     *
     * @param  UpdateUser  $request
     * @param  int  $user_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateUser $request, $user_id)
    {
        $shop_data = $request->validated();

        if($request->has('password')){
            $shop_data = array_merge($shop_data,['password' => Hash::make($request->password)]);
        }
        $shop_user =  $this->userRepository->update($shop_data,$user_id);

        return response()->json(['data' => $shop_user,'status' => 'success']);
    }

    /**
     * Remove the specified shop user from storage.
     *
     * @param  int  $user_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($user_id)
    {
        $this->userRepository->destroy($user_id);

        return response()->json(['status' => 'success']);
    }

    /**
     * List of all shop user roles.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function user_roles()
    {
        $shop_user_roles = $this->userRepository->user_roles();

        return response()->json(['data' =>$shop_user_roles,'status' => 'success']);
    }
}
