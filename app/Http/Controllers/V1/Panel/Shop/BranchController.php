<?php

namespace App\Http\Controllers\V1\Panel\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Panel\Shop\UpdateBranch;
use App\Repositories\V1\Panel\Shop\Interfaces\BranchRepositoryInterface;

class BranchController extends Controller
{

    private $branchRepository;

    public function __construct(BranchRepositoryInterface $branchRepository)
    {
        $this->branchRepository = $branchRepository;
    }

    /**
     * Display a listing of the shop branches.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $shop_branches = $this->branchRepository->all();

        return response()->json(['data' => $shop_branches,'status' => 'success']);
    }


    /**
     * Display the specified shop branch.
     *
     * @param  int  $branch_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($branch_id)
    {
        $shop_branch = $this->branchRepository->findById($branch_id);

        return response()->json(['data' => $shop_branch,'status' => 'success']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateBranch $request
     * @param  int  $branch_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateBranch $request, $branch_id)
    {
        $shop_branch = $this->branchRepository->update($request->validated(),$branch_id);

        return response()->json(['data' => $shop_branch,'status' => 'success']);
    }

    /**
     * List of all shop branch statuses.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function branch_statuses()
    {
        $shop_branch_statuses = $this->branchRepository->branch_statuses();

        return response()->json(['data' => $shop_branch_statuses,'status' => 'success']);
    }
}
