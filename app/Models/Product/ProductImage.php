<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    protected $appends = ['path_thumb','path_main'];

    public function setFileNameAttribute($value)
    {
        $this->attributes['file_name'] = basename($value);
    }

    public function setFileDirectoryAttribute($value)
    {
        $this->attributes['file_directory'] = dirname(parse_url($value,PHP_URL_PATH));
    }

    public function setDiskAttribute($value)
    {
        $this->attributes['disk'] = parse_url($value,PHP_URL_SCHEME) . '://'.parse_url($value,PHP_URL_HOST);
    }

    public function getPathMainAttribute($value)
    {
        return $this->attributes['disk'] . $this->attributes['file_directory'].'/'.$this->attributes['file_name'];
    }

    public function getPathThumbAttribute($value)
    {
        return $this->attributes['disk'] . $this->attributes['file_directory'].'/thumb/'.$this->attributes['file_name'];
    }
}
