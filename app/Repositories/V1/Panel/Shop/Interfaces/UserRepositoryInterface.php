<?php


namespace App\Repositories\V1\Panel\Shop\Interfaces;

interface UserRepositoryInterface
{
    public function findById($user_id);
    public function all();
    public function create($request);
    public function update($request,$user_id);
    public function destroy($user_id);
    public function user_roles();
}
