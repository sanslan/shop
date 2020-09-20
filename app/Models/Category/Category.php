<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;

    public function translation(){
        return $this->hasMany('App\Models\Category\CategoryTranslate');
    }

    public function tr(){
        return $this->hasOne('App\Models\Category\CategoryTranslate')
            ->where('locale','=',app()->getLocale());
    }

    public function sub(){
        return $this->hasMany('App\Models\Category\SubCategory')->whereNull('parent_id');
    }

    public function shops(){
        return $this->belongsToMany(
            'App\Models\Shop\Shop',
            'shop_categories',
            'category_id',
            'shop_id'
        );
    }
}
