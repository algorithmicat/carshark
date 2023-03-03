<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarStoreRequest;
use App\Http\Resources\CarResource;
use App\Jobs\ForgotCarJob;
use App\Models\Car;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Cache::put('test', 'xxx', now()-> addMinutes(10));

        return CarResource:: collection(Car::all());
    }

    /**
     * Store a newly created resource in storage.
     * pppp
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarStoreRequest $request)
    {
        $created_car = Car::create($request->validated());
        // dispatch(new ForgotCarJob($car));

        return new CarResource($created_car);
    }

    /**
     * Display the specified resource.
     * ggg milashka
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return new CarResource($car);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CarStoreRequest $request, Car $car) /* Вместо айди получаем объект $car. Используем вместо реквеста, класс реквеста CarStoreRequest*/
    {
        // dd($request->all());
        $car->update($request->validated());

        return new CarResource($car); //чтобы возвращались нужные колонки из БД
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();

        return response(null, HttpResponse::HTTP_NO_CONTENT);
    }
}
