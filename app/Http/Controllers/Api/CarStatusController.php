<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarMarkStoreRequest;
use App\Http\Requests\CarStatusRequest;
use App\Http\Requests\CarStatusStoreRequest;
use App\Http\Resources\CarStatusResource;
use App\Models\CarStatus;
use Illuminate\Http\Response;

class CarStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @OA\Get(
     *     path="/api/car_statuses",
     *     operationId="/api/car_statuses(GET)",
     *     summary="Получить список статусов машин",
     *     tags={"Статусы машин"}, 
     *     description="Получение списка всех статусов машин",  
     *     @OA\Response(
     *         response="200",
     *         description="Возвращает список статусов машин"
     *     )
     *  )
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
     * @OA\Post(
     *     path="/api/car_statuses",
     *     operationId="/api/car_statuses(POST)",
     *     summary="Добавить статус машины",
     *     tags={"Статусы машин"},
     *     description="Создание статуса машины",
     *     @OA\RequestBody(
     *        required=true,
     *           @OA\JsonContent(ref="#/components/schemas/CarStatusStoreRequest"),
     *     ),      
     *     @OA\Response(
     *         response="200",
     *         description="Создание нового статуса машины"
     *     ),
     * )
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarMarkStoreRequest $request) //вместо Request, пишем созданный нами реквест
    {
        $created_status = CarStatus::create($request->validated()); //создаем переменную, вызываем модель, метод креэйт. Потом: вместо all, валидированные

        return new CarStatusResource($created_status);
    }

    /**
     * Display the specified resource.
     *
     * @OA\Get(
     *     path="/api/car_statuses/{id}", 
     *     operationId="/api/car_statuses{car_statuses}(GET)",
     *     summary="Получить статус машины",
     *     tags={"Статусы машин"}, 
     *     description="Получение статуса машины по идентификатору",
     *     @OA\Parameter(
     *         in="path", 
     *         name="id",
     *         description="Идентификатор статуса машины",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Возвращает статус машины"
     *     )
     * )
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
     * @OA\Put(
     *     path="/api/car_statuses/{id}",
     *     operationId="/api/car_statuses(PUT)",
     *     summary="Редактировать статус машины",
     *     tags={"Статусы машин"},
     *     description="Редактирование статуса машины по идентификатору",
     *     @OA\Parameter(
     *         in="path", 
     *         name="id",
     *         description="Идентификатор статуса машины",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),         
     *     @OA\RequestBody(
     *       required=true,
     *       @OA\JsonContent(ref="#/components/schemas/CarStatusStoreRequest")
     *      ),
     *     @OA\Response(
     *         response="200",
     *         description="Редактирование статуса машины",
     *     ),
     * )
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CarStatusStoreRequest $request, CarStatus $car_status) //используем реквест наш, и переменную статус создаем
    {
        //$car_status->update($request->validated()); //изменяем проавалидированные данные
        $car_status->update($request->validated());

        return new CarStatusResource($car_status);
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @OA\Delete(
     *     path="/api/car_statuses/{id}",     
     *     operationId="/api/car_statuses/{car_statuses}(DELETE)",
     *     summary="Удалить событие машины",
     *     tags={"Статусы машин"},         
     *     description="Удаление статуса машины по идентификатору",
     *     @OA\Parameter(
     *         in="path", 
     *         name="id",
     *         description="Идентификатор статуса машины",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response="204",
     *         description="Удаление статуса машины"
     *     )
     * )
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( CarStatus $car_status)
    {
        $car_status->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
