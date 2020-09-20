<?php


namespace App\Repositories\V1\Panel\Staff\Interfaces;


use Illuminate\Support\Collection;

interface DeliveryCompanyUserRepositoryInterface
{
    public function create($request);
    public function update($request,$company_id);
    public function findById($company_id);
    public function all($company_id);
}
