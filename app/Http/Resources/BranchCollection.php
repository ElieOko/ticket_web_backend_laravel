<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BranchCollection extends ResourceCollection
{
    /**JsonResource
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public static $wrap = "branches";
    public function toArray(Request $request)
    {
        return $this->collection;
       
    }
    // public function with(Request $request)
    // {
    //     return [
    //         "user"=>[
    //             'key' => 'value',
    //         ]
    //         ];

    // }
}
