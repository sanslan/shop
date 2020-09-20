<?php

namespace App\Http\Controllers\V1\Panel\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Panel\Staff\StoreDeliveryCompanyUser;
use App\Http\Requests\V1\Panel\Staff\UpdateDeliveryCompanyUser;
use App\Repositories\V1\Panel\Staff\DeliveryCompanyUserRepository;

class DeliveryCompanyUsersController extends Controller
{

    private $deliveryCompanyUserRepository;

    public function __construct(DeliveryCompanyUserRepository $deliveryCompanyUserRepository)
    {
        $this->deliveryCompanyUserRepository = $deliveryCompanyUserRepository;
    }
    /**
     * Display a listing of the users.
     * @param int $company_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(int $company_id)
    {
        $delivery_company_users = $this->deliveryCompanyUserRepository->all($company_id);

        return response()->json(['data' => $delivery_company_users,'status' => 'success'],200);
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  StoreDeliveryCompanyUser  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreDeliveryCompanyUser $request)
    {
        $delivery_company_user = $this->deliveryCompanyUserRepository->create($request);

        return response()->json(['data' => $delivery_company_user,'status' => 'success'],200);
    }

    /**
     * Display the specified user.
     *
     * @param  int  $user_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($user_id)
    {
        $delivery_company_users = $this->deliveryCompanyUserRepository->findById($user_id);

        return response()->json(['data' => $delivery_company_users,'status' => 'success'],200);
    }

    /**
     * Update the specified user in storage.
     *
     * @param  UpdateDeliveryCompanyUser  $request
     * @param  int  $user_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateDeliveryCompanyUser $request, $user_id)
    {
        $delivery_company_user = $this->deliveryCompanyUserRepository->update($request,$user_id);

        return response()->json(['data' => $delivery_company_user,'status' => 'success'],200);
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
