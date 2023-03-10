<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarEventStoreRequest;
use App\Http\Resources\CarEventResource;
use App\Jobs\EventJob;
use App\Models\CarEvent;
use Illuminate\Http\Response;

class CarEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @OA\Get(
     *     path="/api/car_events",
     *     operationId="/api/car_events(GET)",
     *     summary="Получить список событий машин",
     *     tags={"События машины"}, 
     *     description="Получение списка всех событий машин",  
     *     @OA\Response(
     *         response="200",
     *         description="Возвращает список событий машин"
     *     )
     *  )
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CarEventResource:: collection(CarEvent::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @OA\Post(
     *     path="/api/car_events",
     *     operationId="/api/car_events(POST)",
     *     summary="Добавить событие машины",
     *     tags={"События машины"},
     *     description="Создание события машины",
     *     @OA\RequestBody(
     *        required=true,
     *           @OA\JsonContent(ref="#/components/schemas/CarStoreRequest"),
     *     ),      
     *     @OA\Response(
     *         response="200",
     *         description="Создание нового события машины"
     *     ),
     * )
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarEventStoreRequest $request)
    {
        dispatch(new EventJob($request->validated()));

        return $request;
    }

    /**
     * Display the specified resource.
     * 
     * @OA\Get(
     *     path="/api/car_events/{id}", 
     *     operationId="/api/car_events{car_events}(GET)",
     *     summary="Получить событие машины",
     *     tags={"События машины"}, 
     *     description="Получение события машины по идентификатору",
     *     @OA\Parameter(
     *         in="path", 
     *         name="id",
     *         description="Идентификатор события машины",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Возвращает событие машину"
     *     )
     * )
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CarEvent $carEvent)
    {
        // return Events::find($id);
        return new CarEventResource($carEvent);
    }

    /**
     * Update the specified resource in storage.
     *
     * @OA\Put(
     *     path="/api/car_events/{id}",
     *     operationId="/api/car_events(PUT)",
     *     summary="Редактировать событие машины",
     *     tags={"События машины"},
     *     description="Редактирование события машины по идентификатору",
     *     @OA\Parameter(
     *         in="path", 
     *         name="id",
     *         description="Идентификатор события машины",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),         
     *     @OA\RequestBody(
     *       required=true,
     *       @OA\JsonContent(ref="#/components/schemas/CarEventStoreRequest")
     *      ),
     *     @OA\Response(
     *         response="200",
     *         description="Редактирование события машины",
     *     ),
     * )
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CarEventStoreRequest $request, CarEvent $car_event)
    {
        
        $car_event->update($request->validated());

        return new CarEventResource($car_event);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @OA\Delete(
     *     path="/api/car_events/{id}",     
     *     operationId="/api/car_events/{car_events}(DELETE)",
     *     summary="Удалить событие машины",
     *     tags={"События машины"},         
     *     description="Удаление собятия машины по идентификатору",
     *     @OA\Parameter(
     *         in="path", 
     *         name="id",
     *         description="Идентификатор события машины",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response="204",
     *         description="Удаление собятия машины"
     *     )
     * )
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarEvent $car_event)
    {
        $car_event->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
