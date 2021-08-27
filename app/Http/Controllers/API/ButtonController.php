<?php

namespace App\Http\Controllers\API;

use App\Button;
use App\Http\Controllers\Controller;
use App\Http\Services\ButtonService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ButtonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param ButtonService $buttonService
     * @return JsonResponse
     */
    public function index(Request $request, ButtonService $buttonService): JsonResponse
    {
        if ($request->has('key')){
            /** @var Button $buttons */
            $buttons = Button::where('key', $request->input('key'))->get();
        } else {
            /** @var Button $buttons */
            $buttons = Button::all();
        }

        if ($buttons->isEmpty()){
            return Response::json(['Buttons not found'], 404);
        }

        return $buttonService->getJsonResponse($buttons);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param ButtonService $buttonService
     * @return JsonResponse
     */
    public function store(Request $request, ButtonService $buttonService): JsonResponse
    {
        $buttons = Button::where('key', $request->input('key'))
            ->where('value', $request->input('value'))
            ->get();

        if ($buttons->isEmpty()){
            $button = Button::create($request->all());
            $buttons = Button::where('key', $button->key)->get();
        }

        return $buttonService->getJsonResponse($buttons);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param ButtonService $buttonService
     * @return JsonResponse
     */
    public function update(Request $request, ButtonService $buttonService): JsonResponse
    {
        $button = Button::find($request->input('key'));

        if (!$button){
            return Response::json(['Buttons not found'], 404);
        }

        /** @var Button $button */
        $button->update($request->all());

        return $buttonService->getOneJsonResponse($button);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ButtonService $buttonService
     * @param Request $request
     * @return JsonResponse
     */
    public function destroy(ButtonService $buttonService, Request $request): JsonResponse
    {
        $button = Button::find($request->input('key'));

        if (!$button){
            return Response::json(['Buttons not found'], 404);
        }

        $button->delete();

        return $buttonService->getOneJsonResponse($button);
    }
}
