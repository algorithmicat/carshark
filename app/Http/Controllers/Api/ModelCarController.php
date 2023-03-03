<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ModelCarStoreRequest;
use App\Http\Resources\ModelCarResourse;
use App\Models\ModelCar;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ModelCarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ModelCarResourse::collection(ModelCar::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModelCarStoreRequest $request)
    {
        $created_models_car = ModelCar::create($request->validated()); //создаем переменную, вызываем модель, метод креэйт. Потом: вместо all, валидированные

        return new ModelCarResourse($created_models_car);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ModelCar $models_car)
    {
        return new ModelCarResourse($models_car);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ModelCarStoreRequest $request, ModelCar $models_car)
    {
        $models_car->update($request->validated());

        return new ModelCarResourse($models_car);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModelCar $models_car)
    {
        $models_car->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
