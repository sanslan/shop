<?php
namespace App\Repositories\V1\Panel\Shop;

use App\Models\Shop\ShopBranch;
use App\Models\Shop\ShopBranchStatus;
use App\Repositories\V1\Panel\Shop\Interfaces\BranchRepositoryInterface;

class BranchRepository implements BranchRepositoryInterface
{

    private $model;
    private $model_branch_statuses;
    private $shop_id;

    public function __construct(ShopBranch $branch, ShopBranchStatus $shop_branch_status)
    {
        $this->model = $branch;
        $this->model_branch_statuses = $shop_branch_status;
        $this->shop_id = auth('shop_user')->check() ? auth('shop_user')->user()->shop_id : null;
    }

    public function all()
    {
        return $this->model->where('shop_id',$this->shop_id)
            ->with(['city.translation','state.translation','status'])
            ->paginate(10);
    }

    public function findById($user_id)
    {
        return $this->model->where('shop_id',$this->shop_id)->findOrfail($user_id);
    }

    public function update($request,$branch_id)
    {
        $shop_branch = $this->model->where('shop_id',$this->shop_id)->findOrFail($branch_id);
        $shop_branch->update($request);

        return $shop_branch;
    }

    public function branch_statuses()
    {
        return $this->model_branch_statuses->all();
    }

}
