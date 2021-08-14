<?php

namespace App\Http\Controllers\API;

use App\Button;
use App\Http\Controllers\Controller;
use App\Http\Resources\ButtonCollection;
use App\Http\Resources\ButtonResource;
use Exception;
use Illuminate\Http\Request;

class ButtonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return ButtonCollection
     */
    public function index(): ButtonCollection
    {
        return new ButtonCollection(Button::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return ButtonResource
     */
    public function store(Request $request): ButtonResource
    {
        $buttons = Button::firstOrCreate($request->all());

        return new ButtonResource($buttons);
    }

    /**
     * Display the specified resource.
     *
     * @param Button $button
     * @return ButtonResource
     */
    public function show(Button $button): ButtonResource
    {
        return new ButtonResource($button);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Button $button
     * @return ButtonResource
     */
    public function update(Request $request, Button $button): ButtonResource
    {
        $button->update($request->all());

        return new ButtonResource($button);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Button $button
     * @return ButtonResource
     * @throws Exception
     */
    public function destroy(Button $button): ButtonResource
    {
        $button->delete();

        return new ButtonResource($button);
    }
}
