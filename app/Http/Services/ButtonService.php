<?php

namespace App\Http\Services;

use App\Button;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

class ButtonService
{
    public function getJsonResponse($buttons): JsonResponse
    {
        $buttons = $buttons->map(function ($item){
            return [
                'key' => $item->key,
                'value' => $item->value,
                'created_at' => strtotime($item->created_at),
                'updated_at' => strtotime($item->updated_at),
            ];
        });


        return Response::json([
                'data' => $buttons
            ]
            ,200,[], JSON_UNESCAPED_UNICODE);
    }

    public function getOneJsonResponse(Button $button): JsonResponse
    {

        $buttonResponse = [
            'key' => $button->key,
            'value' => $button->value,
            'created_at' => strtotime($button->created_at),
            'updated_at' => strtotime($button->updated_at),
        ];

        return Response::json([
                'data' => $buttonResponse
            ]
            ,200,[], JSON_UNESCAPED_UNICODE);
    }
}
