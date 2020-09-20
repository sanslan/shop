<?php

namespace App\Http\Controllers\V1\Panel\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Panel\Staff\RegisterStaff;
use App\Http\Requests\V1\Panel\Staff\UpdateStaff;
use App\Models\Panel\Staff\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffUserController extends Controller
{
    /**
     * Display a listing of the staff users.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $staff_users = Staff::paginate(10);
        return response()->json(['data' => $staff_users,'status' => 'success'],200);
    }

    /**


    /**
     * Store a newly created staff user in storage.
     *
     * @param  RegisterStaff $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(RegisterStaff $request)
    {
        $request_data =  array_merge($request->all(),['password' =>Hash::make($request->password) ]);
        $staff =  Staff::create($request_data);
        $staff->load('role');

        return response()->json(['data' => $staff,'status' => 'success'],200);
    }

    /**
     * Display the specified staff user.
     *
     * @param  Staff  $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Staff $user)
    {
        return response()->json(['data' => $user,'status' => 'success'],200);
    }


    /**
     * Update the specified staff user in storage.
     *
     * @param  UpdateStaff  $request
     * @param  Staff $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateStaff $request, Staff $user)
    {
        $user->fill($request->validated());
        if(request('password')){
            $user->fill(['password' => Hash::make($request->password)]);
        }
        $user->save();
        $user->load('role');
        return response()->json(['data' => $user,'status' => 'success'],200);

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
