<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarStatusRequest;
use App\Http\Resources\CarStatusResource;
use App\Models\CarStatus;
use Illuminate\Http\Response;

/**
 * @OA\PathItem(path="/api/car_statuses")
 */

class CarStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  return status::all(); //показать всё
       return CarStatusResource::collection(CarStatus::all()); // получить всё с помощью ресурса, с использованием статичного метода коллектион
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarStatusRequest $request) //вместо Request, пишем созданный нами реквест
    {
        $created_status = CarStatus::create($request->validated()); //создаем переменную, вызываем модель, метод креэйт. Потом: вместо all, валидированные

        return new CarStatusResource($created_status);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CarStatus $car_status)
    {
        // return status::find($id); //получить один элемент
        //return new CarStatusResource(status::with('events')->findOrFail($id)); // получить один элемент с помощью ресурса, прописав его как новый
        return new CarStatusResource($car_status);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CarStatusRequest $request, CarStatus $car_status) //используем реквест наш, и переменную статус создаем
    {
        //$car_status->update($request->validated()); //изменяем проавалидированные данные
        $car_status->update($request->validated());

        return new CarStatusResource($car_status);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( CarStatus $car_status)
    {
        $car_status->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
