<?php
namespace App\Repositories\V1\Panel\Shop;

use App\Models\Shop\Shop;
use App\Repositories\V1\Panel\Shop\Interfaces\ShopRepositoryInterface;

class ShopRepository implements ShopRepositoryInterface
{

    private $model;
    private $shop_id;

    public function __construct( Shop $shop )
    {
        $this->model = $shop;
        $this->shop_id = auth('shop_user')->check() ? auth('shop_user')->user()->shop_id : null;
    }

    public function get_data()
    {
        return $this->model->with('status')->find($this->shop_id)->append(['balance','order_count','product_count']);
    }


}
