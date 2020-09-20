<?php
namespace App\Repositories\V1\Panel\Staff;

use App\Models\Brand\Brand;
use App\Models\Category\Category;
use App\Models\DeliveryCompany\DeliveryCompany;
use App\Models\Finance\Account;
use App\Models\Product\CustomOption;
use App\Models\Product\CustomOptionValue;
use App\Models\Product\CustomValue;
use App\Models\Product\Product;
use App\Models\Product\ProductOption;
use App\Models\Shop\Shop;
use App\Models\Shop\ShopBranch;
use App\Repositories\V1\Panel\Staff\Interfaces\DeliveryCompanyRepositoryInterface;
use App\Repositories\V1\Panel\Staff\Interfaces\ProductRepositoryInterface;
use Illuminate\Support\Str;

class DeliveryCompanyRepository implements DeliveryCompanyRepositoryInterface
{
    private $model;

    public function __construct(DeliveryCompany $deliveryCompany)
    {
        $this->model = $deliveryCompany;
    }

    public function create($request)
    {
        $data = store_files(['logo'],$request->validated(),'delivery_companies');

        $account = Account::create(['name' => $data['name']]);
        $data = array_merge($data,['account_id' => $account->id]);

        return DeliveryCompany::create($data);
    }

    public function all()
    {
        return DeliveryCompany::paginate(10);
    }

    public function findById($company_id)
    {
        $company =  $this->model->find($company_id);
        $company->append(['balance','courier_count']);
        $company->order_count = 24;
        return $company;
    }

    public function update($request, $company_id)
    {
        $company = DeliveryCompany::find($company_id);

        $data = store_files(['logo'],$request->validated(),'delivery_companies',$company);
        $company->update($data);
        return $company;
    }

}
