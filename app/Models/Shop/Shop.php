<?php

namespace App\Models\Shop;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Shop extends Model
{
    protected $guarded = ['id'];

    public function status(){
        return $this->belongsTo('App\Models\Shop\ShopStatus');
    }

    public function account(){
        return $this->belongsTo('App\Models\Finance\Account');
    }

    public function branches(){
        return $this->hasMany('App\Models\Shop\ShopBranch');
    }

    public function balances(){
        return $this->hasManyThrough(
            'App\Models\Finance\SubAccount',
            'App\Models\Shop\ShopBranch',
            'shop_id',
            'id',
            'id',
            'sub_account_id');
    }


    public function getBalanceAttribute(){
        return $this->balances()->sum('balance');
    }

    public function getProductCountAttribute(){
        $branches_ids = $this->branches->pluck('id')->toArray();

        return Product::whereIn('shop_branch_id',$branches_ids)->count();
    }

    public function getOrderCountAttribute(){
        $orders = DB::select("SELECT count('id') as count FROM shop_branches sb left join products p
                                 ON sb.id= p.shop_branch_id inner join cart_products cp
                                 ON p.id = cp.product_id where shop_id=?",[$this->id]);
        return $orders[0]->count;

    }

    public function categories(){
        return $this->belongsToMany('App\Models\Category\Category', 'shop_categories', 'shop_id',
            'category_id'
        );
    }
}
