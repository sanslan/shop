<?php


namespace App\Repositories\V1\Panel\Staff\Interfaces;

interface AccountRepositoryInterface
{
    public function findById( int $account_id );
    public function sub_accounts( int $account_id );
    public function list_accounts( array $columns,string $orderBy,string $sortBy );
}
