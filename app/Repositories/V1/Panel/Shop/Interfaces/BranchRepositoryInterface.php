<?php


namespace App\Repositories\V1\Panel\Shop\Interfaces;

interface BranchRepositoryInterface
{
    public function findById($user_id);
    public function all();
    public function update($request,$branch_id);
    public function branch_statuses();
}
