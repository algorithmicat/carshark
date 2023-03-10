<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarModelStoreRequest;
use App\Http\Resources\CarModelResourse;
use App\Models\CarModel;
use Illuminate\Http\Response;

class CarModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @OA\Get(
     *     path="/api/car_models",
     *     operationId="/api/car_models(GET)",
     *     summary="Получить список моделей машин",
     *     tags={"Модели машин"}, 
     *     description="Получение списка всех моделей машин",  
     *     @OA\Response(
     *         response="200",
     *         description="Возвращает список моделей машин"
     *     )
     *  )
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CarModelResourse::collection(CarModel::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @OA\Post(
     *     path="/api/car_models",
     *     operationId="/api/car_models(POST)",
     *     summary="Добавить модель машины",
     *     tags={"Модели машин"},
     *     description="Создание модели машины",
     *     @OA\RequestBody(
     *        required=true,
     *           @OA\JsonContent(ref="#/components/schemas/CarModelStoreRequest"),
     *     ),      
     *     @OA\Response(
     *         response="200",
     *         description="Создание новой модели машины"
     *     ),
     * )
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarModelStoreRequest $request)
    {
        $created_car_models = CarModel::create($request->validated()); //создаем переменную, вызываем модель, метод креэйт. Потом: вместо all, валидированные

        return new CarModelResourse($created_car_models);
    }

    /**
     * Display the specified resource.
     *
     *  @OA\Get(
     *     path="/api/car_models/{id}", 
     *     operationId="/api/car_models{car_models}(GET)",
     *     summary="Получить модель машины",
     *     tags={"Модели машин"}, 
     *     description="Получение модели машины по идентификатору",
     *     @OA\Parameter(
     *         in="path", 
     *         name="id",
     *         description="Идентификатор модели машины",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Возвращает модель машины"
     *     )
     * )
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CarModel $car_model)
    {
        return new CarModelResourse($car_model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @OA\Put(
     *     path="/api/car_models/{id}",
     *     operationId="/api/car_models(PUT)",
     *     summary="Редактировать модель машины",
     *     tags={"Модели машин"},
     *     description="Редактирование модели машины по идентификатору",
     *     @OA\Parameter(
     *         in="path", 
     *         name="id",
     *         description="Идентификатор модели машины",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),         
     *     @OA\RequestBody(
     *       required=true,
     *       @OA\JsonContent(ref="#/components/schemas/CarModelStoreRequest")
     *      ),
     *     @OA\Response(
     *         response="200",
     *         description="Редактирование модели машины",
     *     ),
     * )
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CarModelStoreRequest $request, CarModel $car_model)
    {
        $car_model->update($request->validated());

        return new CarModelResourse($car_model);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @OA\Delete(
     *     path="/api/car_models/{id}",     
     *     operationId="/api/car_models/{car_models}(DELETE)",
     *     summary="Удалить модель машины",
     *     tags={"Модели машин"},         
     *     description="Удаление модели машины по идентификатору",
     *     @OA\Parameter(
     *         in="path", 
     *         name="id",
     *         description="Идентификатор модели машины",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response="204",
     *         description="Удаление модели машины"
     *     )
     * )
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarModel $car_model)
    {
        $car_model->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
