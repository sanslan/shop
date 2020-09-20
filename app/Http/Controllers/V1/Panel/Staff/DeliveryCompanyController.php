<?php

namespace App\Http\Controllers\V1\Panel\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Panel\Staff\StoreDeliveryCompany;
use App\Http\Requests\V1\Panel\Staff\UpdateDeliveryCompany;
use App\Repositories\V1\Panel\Staff\DeliveryCompanyRepository;

class DeliveryCompanyController extends Controller
{

    private $deliveryCompanyRepository;

    public function __construct(DeliveryCompanyRepository $deliveryCompanyRepository)
    {
        $this->deliveryCompanyRepository = $deliveryCompanyRepository;
    }

    /**
     * Display delivery companies.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $delivery_companies = $this->deliveryCompanyRepository->all();

        return response()->json(['data' => $delivery_companies,'status' => 'success'],200);
    }

    /**
     * Store a newly created company in storage.
     *
     * @param  StoreDeliveryCompany  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreDeliveryCompany $request)
    {
        $delivery_company = $this->deliveryCompanyRepository->create($request);

        return response()->json(['data' => $delivery_company,'status' => 'success'],200);
    }

    /**
     * Display the specified company.
     *
     * @param  int  $company_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($company_id)
    {
        $delivery_company = $this->deliveryCompanyRepository->findById($company_id);

        return response()->json(['data' => $delivery_company,'status' => 'success'],200);
    }

    /**
     * Update the specified company in storage.
     *
     * @param  UpdateDeliveryCompany  $request
     * @param  int  $company_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateDeliveryCompany $request, $company_id)
    {
        $company = $this->deliveryCompanyRepository->update($request,$company_id);

        return response()->json(['data' => $company,'status' => 'success'],200);
    }

}
