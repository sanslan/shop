<?php


namespace App\Repositories\V1\Panel\Staff\Interfaces;


use Illuminate\Support\Collection;

interface DeliveryCompanyRepositoryInterface
{
    public function findById($user_id);
    public function all();
    public function create($request);
    public function update($request,$user_id);
}
