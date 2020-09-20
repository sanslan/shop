<?php
namespace App\Repositories\V1\Panel\Shop;


use App\Models\Shop\ShopUser;
use App\Models\Shop\ShopUserRole;
use App\Repositories\V1\Panel\Shop\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    private $model;
    private $model_shop_user_roles;
    private $shop_id;


    public function __construct(ShopUser $user, ShopUserRole $shop_user_role)
    {
        $this->model = $user;
        $this->model_shop_user_roles = $shop_user_role;
        $this->shop_id = auth('shop_user')->check() ? auth('shop_user')->user()->shop_id : null;
    }

    public function all()
    {
        $page_count = request('page_count') ?? 10;
        return $this->model->where('shop_id',$this->shop_id)->paginate($page_count);
    }

    public function findById($user_id)
    {
        return $this->model->where('shop_id',$this->shop_id)->findOrfail($user_id);
    }

    public function create($shop_user_data)
    {
        $shop_user_data = array_merge($shop_user_data,['shop_id' => $this->shop_id]);

        $shop_user =  $this->model->create($shop_user_data);
        return $shop_user->load('role');
    }

    public function update($request,$user_id)
    {
        $shop_user = $this->model->where('shop_id',$this->shop_id)->findOrFail($user_id);

        $shop_user_data = array_merge($request,['shop_id' => $this->shop_id]);

        $shop_user->update($shop_user_data);
        return $shop_user;
    }

    public function destroy($user_id)
    {
        return $this->model->where('shop_id',$this->shop_id)->findOrfail($user_id)->delete();
    }

    public function user_roles()
    {
        return $this->model_shop_user_roles->all();
    }


}
