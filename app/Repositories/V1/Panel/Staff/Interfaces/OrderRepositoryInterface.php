<?php


namespace App\Repositories\V1\Panel\Staff\Interfaces;

interface OrderRepositoryInterface
{
    public function findById($user_id);
    public function all();
    public function search();
}
