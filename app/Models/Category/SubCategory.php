<?php

namespace App\Models\Category;

use App\Models\Product\Option;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;

    public function translation(){
        return $this->hasMany('App\Models\Category\SubCategoryTranslate');
    }

    public function options(){
        return Option::query()->where('subcategory_id',$this->id)
            ->select('options.id','name')
            ->leftJoin('option_translates', 'options.id', '=', 'option_id')
            ->where('option_translates.locale',app()->getLocale())
            ->get();
    }

    public function tr(){
        return $this->hasOne('App\Models\Category\SubCategoryTranslate')
            ->where('locale','=',app()->getLocale());
    }

    public function sub(){
        return $this->hasMany('App\Models\Category\SubCategory','parent_id','id');
    }

    public function children(){
        return $this->hasMany('App\Models\Category\SubCategory','parent_id','id')
            ->with('children.tr');
    }

    public function main_category(){
        return $this->belongsTo('App\Models\Category\Category','category_id','id');
    }
}
