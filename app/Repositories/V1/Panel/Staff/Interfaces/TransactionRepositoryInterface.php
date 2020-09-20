<?php


namespace App\Repositories\V1\Panel\Staff\Interfaces;

interface TransactionRepositoryInterface
{
    public function findById($transaction_id);
    public function list_transactions();
    public function search();
    public function store( $request, $balance );
}
