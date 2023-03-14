<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarMarkStoreRequest;
use App\Http\Resources\CarMarkResource;
use App\Models\CarMark;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class CarMarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @OA\Get(
     *     path="/api/car_marks",
     *     operationId="/api/car_marks(GET)",
     *     summary="Получить список марок машин",
     *     tags={"Марки машин"}, 
     *     description="Получение списка всех марок машин",  
     *     @OA\Response(
     *         response="200",
     *         description="Возвращает список марок машин"
     *     )
     *  )
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CarMarkResource::collection(CarMark::paginate(5));
        $cacheCarMarks = CarMarkResource::collection(CarMark::paginate(3));
        Cache::put('cacheCarMarcks', $cacheCarMarks, now()-> addMinutes(10));
        return $cacheCarMarks;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @OA\Post(
     *     path="/api/car_marks",
     *     operationId="/api/car_marks(POST)",
     *     summary="Добавить марку машины",
     *     tags={"Марки машин"},
     *     description="Создание марки машины",
     *     @OA\RequestBody(
     *        required=true,
     *           @OA\JsonContent(ref="#/components/schemas/CarMarkStoreRequest"),
     *     ),      
     *     @OA\Response(
     *         response="200",
     *         description="Создание новой марки машины"
     *     ),
     * )
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarMarkStoreRequest $request)
    {
        $created_mark = CarMark::create($request->validated());

        return new CarMarkResource($created_mark);
    }

    /**
     * Display the specified resource.
     *
     * @OA\Get(
     *     path="/api/car_marks/{id}", 
     *     operationId="/api/car_marks{car_marks}(GET)",
     *     summary="Получить марку машины",
     *     tags={"Марки машин"}, 
     *     description="Получение марки машины по идентификатору",
     *     @OA\Parameter(
     *         in="path", 
     *         name="id",
     *         description="Идентификатор марки машины",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Возвращает марку машины"
     *     )
     * )
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CarMark $car_mark)
    {
        return new CarMarkResource($car_mark);
    }

    /**
     * Update the specified resource in storage.
     *
     * @OA\Put(
     *     path="/api/car_marks/{id}",
     *     operationId="/api/car_marks(PUT)",
     *     summary="Редактировать марку машины",
     *     tags={"Марки машин"},
     *     description="Редактирование марки машины по идентификатору",
     *     @OA\Parameter(
     *         in="path", 
     *         name="id",
     *         description="Идентификатор марки машины",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),         
     *     @OA\RequestBody(
     *       required=true,
     *       @OA\JsonContent(ref="#/components/schemas/CarMarkStoreRequest")
     *      ),
     *     @OA\Response(
     *         response="200",
     *         description="Редактирование марки машины",
     *     ),
     * )
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CarMarkStoreRequest $request, CarMark $car_mark)
    {
        $car_mark->update($request->validated());

        return new CarMarkResource($car_mark);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @OA\Delete(
     *     path="/api/car_marks/{id}",     
     *     operationId="/api/car_marks/{car_marks}(DELETE)",
     *     summary="Удалить марку машины",
     *     tags={"Марки машин"},         
     *     description="Удаление марки машины по идентификатору",
     *     @OA\Parameter(
     *         in="path", 
     *         name="id",
     *         description="Идентификатор марки машины",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response="204",
     *         description="Удаление марки машины"
     *     )
     * )
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarMark $car_mark)
    {
        $car_mark->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
