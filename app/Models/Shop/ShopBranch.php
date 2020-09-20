<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Model;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use Illuminate\Support\Facades\DB;

class ShopBranch extends Model
{
    use SpatialTrait;

    protected $spatialFields = ['location'];

    protected $fillable = [
        'shop_id','name','online','status_id','sub_account_id','country_id',
        'city_id','state_id','address','location','schedule_start_week_id',
        'schedule_end_week_id','schedule_start_time','schedule_end_time'
    ];

    public function status(){
        return $this->hasOne('App\Models\Shop\ShopBranchStatus','id','status_id');
    }

    public function shop(){
        return $this->belongsTo('App\Models\Shop\Shop');
    }

    public function getShopNameAttribute($value)
    {
        return $this->shop->name;
    }

    public function getLocationAttribute($value)
    {
        return [
            $this->attributes['location']->getLat(),
            $this->attributes['location']->getLng()
        ];
    }

    public function sub_account(){
        return $this->hasOne('App\Models\Finance\SubAccount','id','sub_account_id');
    }

    public function balance(){
        return $this->hasOne('App\Models\Finance\SubAccount','id','sub_account_id');
    }

    public function products(){
        return $this->hasMany('App\Models\Product\Product');
    }

    public function country(){
        return $this->belongsTo('App\Models\Data\Country');
    }

    public function city(){
        return $this->belongsTo('App\Models\Data\City');
    }

    public function state(){
        return $this->belongsTo('App\Models\Data\State');
    }

    public function getProductCountAttribute(){

        return $this->products->count();
    }

    public function getOrderCountAttribute(){
        $orders = DB::select("SELECT count('id') as count FROM shop_branches sb left join products p
                                 ON sb.id= p.shop_branch_id inner join cart_products cp
                                 ON p.id = cp.product_id where sb.id=?",[$this->id]);
        return $orders[0]->count;

    }
}
