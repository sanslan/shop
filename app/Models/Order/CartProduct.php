<?php

namespace App\Models\Order;

use App\Models\Product\CustomOptionValue;
use App\Models\Product\Product;
use App\Models\Product\ProductOptionValue;
use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model
{
    protected $guarded = [];

    public function cart_option(){

        return $this->hasOne('App\Models\Order\CartProductOption','cart_product_id');
    }

    public function product(){

        $product = Product::with('tr','images')->find($this->product_id);
        $product->option = null;

        //Cart product has no option
        if( !$this->cart_option ){

            return $product;
        }
        //Card product has option
        else{

            $product_option = $this->cart_option->product_option;
            $product->price = $product_option->price;

            //Product option is custom
            if($product_option->custom_option){

                $custom_option_value = CustomOptionValue::with('options.tr','options.value.tr')
                    ->where('product_option_id',$product_option->id)->first();

                $option = [];
                $option['name'] = $custom_option_value->options->tr->name;
                $option['value'] = $custom_option_value->options->value->tr->name;

                $product->option =(object) $option;
                return $product;
            }
            //Product option is ordinary option
            else{
                $product_option_value = ProductOptionValue::with('options.tr','values.tr')
                    ->where('product_option_id',$product_option->id)->first();

                $option = [];
                $option['name'] = $product_option_value->options->tr->name;
                $option['value'] = $product_option_value->values->tr->name;
                $product->option = (object) $option;

                return $product;
            }
        }
    }
}
