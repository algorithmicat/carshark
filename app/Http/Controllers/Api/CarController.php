<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarStoreRequest;
use App\Http\Resources\CarResource;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Cache;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @OA\Get(
     *     path="/api/cars",
     *     operationId="/api/cars(GET)",
     *     summary="Получить список машин",
     *     tags={"Машины"}, 
     *     description="Получение списка всех машин",  
     *     @OA\Response(
     *         response="200",
     *         description="Возвращает список машин"
     *     )
     *  )
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cacheCars = CarResource::collection(Car::paginate(3));
        Cache::put('cacheCars', $cacheCars, now()-> addMinutes(10));
        return $cacheCars;
    }

    /** 
     * Store a newly created resource in storage.  
     * 
     * @OA\Post(
     *     path="/api/cars",
     *     operationId="/api/cars(POST)",
     *     summary="Добавить машину",
     *     tags={"Машины"},
     *     description="Создание машины",
     *     @OA\RequestBody(
     *        required=true,
     *           @OA\JsonContent(ref="#/components/schemas/CarStoreRequest"),
     *     ),      
     *     @OA\Response(
     *         response="200",
     *         description="Создание новой машины"
     *     ),
     * )
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
     *
     * @OA\Get(
     *     path="/api/cars/{id}", 
     *     operationId="/api/cars/{cars}(GET)",
     *     summary="Получить машину",
     *     tags={"Машины"}, 
     *     description="Получение машины по идентификатору",
     *     @OA\Parameter(
     *         in="path", 
     *         name="id",
     *         description="Идентификатор машины",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Возвращает машину"
     *     )
     * )      
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        $cacheCar = new CarResource($car);
        Cache::put('cacheCar', $cacheCar, now()-> addMinutes(10));
        return $cacheCar;

    }

    /**
     * Update the specified resource in storage.
     * 
     * @OA\Put(
     *     path="/api/cars/{id}",
     *     operationId="/api/cars(PUT)",
     *     summary="Редактировать машину",
     *     tags={"Машины"},
     *     description="Редактирование машины по идентификатору",
     *     @OA\Parameter(
     *         in="path", 
     *         name="id",
     *         description="Идентификатор машины",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),         
     *     @OA\RequestBody(
     *       required=true,
     *       @OA\JsonContent(ref="#/components/schemas/CarStoreRequest")
     *      ),
     *     @OA\Response(
     *         response="200",
     *         description="Редактирование машины",
     *     ),
     * )
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
     * @OA\Delete(
     *     path="/api/cars/{id}",     
     *     operationId="/api/cars/{cars}(DELETE)",
     *     summary="Удалить машину",
     *     tags={"Машины"},         
     *     description="Удаление машины по идентификатору",
     *     @OA\Parameter(
     *         in="path", 
     *         name="id",
     *         description="Идентификатор машины",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response="204",
     *         description="Удаление машины"
     *     )
     * )
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();

        return response(null, HttpResponse::HTTP_NO_CONTENT);
    }
}


