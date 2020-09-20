<?php


namespace App\Repositories\V1\Panel\Staff\Interfaces;

interface SubAccountRepositoryInterface
{
    public function findById( int $sub_account_id );
}
