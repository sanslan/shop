<?php
namespace App\Repositories\V1\Panel\Staff;


use App\Models\Finance\Account;
use App\Repositories\V1\BaseRepository;
use App\Repositories\V1\Panel\Staff\Interfaces\AccountRepositoryInterface;

class AccountRepository extends BaseRepository implements AccountRepositoryInterface
{
    protected $model;

    public function __construct(Account $account)
    {
        $this->model = $account;
    }


    public function findById( $account_id )
    {
        return $this->model->find( $account_id );
    }

    public function sub_accounts(int $account_id)
    {
        $account = $this->model->find($account_id);

        return $account->sub_accounts;
    }

    public function list_accounts( array $columns=['*'], string $orderBy='id', string $sortBy='asc' )
    {
        return $this->all($columns,$orderBy,$sortBy);
    }


}
