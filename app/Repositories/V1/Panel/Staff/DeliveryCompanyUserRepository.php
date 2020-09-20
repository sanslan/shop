<?php
namespace App\Repositories\V1\Panel\Staff;

use App\Models\DeliveryCompany\DeliveryCompanyUser;
use App\Repositories\V1\Panel\Staff\Interfaces\DeliveryCompanyUserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class DeliveryCompanyUserRepository implements DeliveryCompanyUserRepositoryInterface
{
    private $model;

    public function __construct(DeliveryCompanyUser $deliveryCompanyUser)
    {
        $this->model = $deliveryCompanyUser;
    }

    public function create($request)
    {
        $request_data =  array_merge( $request->validated(),['password' =>Hash::make($request->password)]);
        return $this->model->create($request_data);
    }

    public function all($company_id)
    {
        return $this->model->where('company_id',$company_id)->paginate(10);
    }

    public function findById($user_id)
    {
        return $this->model->find($user_id);
    }

    public function update($request, $user_id)
    {
        $user = $this->model->find($user_id);

        $request_data = $request->validated();
        if(request()->has('password')){
            $request_data =  array_merge( $request->validated(),['password' =>Hash::make($request->password)]);
        }

        $user->update($request_data);
        return $user;
    }

}
