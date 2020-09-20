<?php

namespace App\Http\Resources\V1\Panel\Staff;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ShopBranchCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection
        ];
    }
}
