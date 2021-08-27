<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

class ButtonCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param Request $request
     * @return Collection
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($item){
            return [
                'key' => $item->key,
                'value' => $item->value,
                'created_at' => strtotime($item->created_at),
                'updated_at' => strtotime($item->updated_at),
            ];
        });
    }
}
