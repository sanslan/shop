<?php
namespace App\Repositories\V1\Panel\Staff;


use App\Models\Finance\SubAccount;
use App\Repositories\V1\BaseRepository;
use App\Repositories\V1\Panel\Staff\Interfaces\SubAccountRepositoryInterface;

class SubAccountRepository extends BaseRepository implements SubAccountRepositoryInterface
{
    protected $model;

    public function __construct(SubAccount $sub_account)
    {
        $this->model = $sub_account;
    }


    public function findById( $sub_account_id )
    {
        return $this->model->find( $sub_account_id );
    }

}
