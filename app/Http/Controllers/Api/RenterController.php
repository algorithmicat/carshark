<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RenterStoreRequest;
use App\Http\Resources\RenterResource;
use App\Models\Renter;
use Illuminate\Http\Response;

class RenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RenterResource::collection(Renter::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RenterStoreRequest $request)
    {
        $created_renter = Renter::create($request->validated()); //создаем переменную, вызываем модель, метод креэйт. Потом: вместо all, валидированные

        return new RenterResource($created_renter);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Renter $renter)
    {
        return new RenterResource($renter);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RenterStoreRequest $request, Renter $renter)
    {
        $renter->update($request->validated());

        return new RenterResource($renter);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Renter $renter)
    {
        $renter->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
