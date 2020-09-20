<?php

namespace App\Http\Controllers\V1\Panel\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Client\UpdateUser;
use App\Models\User\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $users = User::paginate(10);

        return response()->json(['data' => $users,'status' => 'success']);
    }


    /**
     * Display the specified user.
     *
     * @param  User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(User $user)
    {
        return response()->json(['data' => $user,'status' => 'success']);
    }


    /**
     * Update the specified user in storage.
     *
     * @param  UpdateUser  $request
     * @param  User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateUser $request, User $user){

        $data = $request->all();
        $data = store_files('photo',$data,'users',$user);
        if(request('password')){
            $data = array_merge($data,['password' =>Hash::make($request->password)]);
        }

        $user->update($data);

        return response()->json($user,201);
    }

    /**
     * Display the user addresses.
     *
     * @param  User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function get_user_addresses(User $user)
    {
        $user_addresses = $user->addresses;
        return response()->json(['data' => $user_addresses,'status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
