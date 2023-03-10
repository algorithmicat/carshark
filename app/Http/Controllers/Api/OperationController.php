<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OperationStoreRequest;
use App\Http\Resources\OperationResource;
use App\Models\Operation;
use Illuminate\Http\Response;

class OperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @OA\Get(
     *     path="/api/operations",
     *     operationId="/api/operations(GET)",
     *     summary="Получить список операций",
     *     tags={"Операции"}, 
     *     description="Получение списка всех операций",  
     *     @OA\Response(
     *         response="200",
     *         description="Возвращает список операций"
     *     )
     *  )
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return OperationResource::collection(Operation::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @OA\Post(
     *     path="/api/operations",
     *     operationId="/api/operations(POST)",
     *     summary="Добавить операцию",
     *     tags={"Операции"},
     *     description="Создание операции",
     *     @OA\RequestBody(
     *        required=true,
     *           @OA\JsonContent(ref="#/components/schemas/OperationStoreRequest"),
     *     ),      
     *     @OA\Response(
     *         response="200",
     *         description="Создание новой операции"
     *     ),
     * )
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OperationStoreRequest $request)
    {
        $created_operation = Operation::create($request->validated()); //создаем переменную, вызываем модель, метод креэйт. Потом: вместо all, валидированные

        return new OperationResource($created_operation);
    }

    /**
     * Display the specified resource.
     *
     * @OA\Get(
     *     path="/api/operations/{id}", 
     *     operationId="/api/operations/{operations}(GET)",
     *     summary="Получить операцию",
     *     tags={"Операции"}, 
     *     description="Получение операции по идентификатору",
     *     @OA\Parameter(
     *         in="path", 
     *         name="id",
     *         description="Идентификатор операции",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Возвращает операцию"
     *     )
     * )   
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Operation $operation)
    {
        return new OperationResource($operation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @OA\Put(
     *     path="/api/operations/{id}",
     *     operationId="/api/operations(PUT)",
     *     summary="Редактировать операцию",
     *     tags={"Операции"},
     *     description="Редактирование операции по идентификатору",
     *     @OA\Parameter(
     *         in="path", 
     *         name="id",
     *         description="Идентификатор операции",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),         
     *     @OA\RequestBody(
     *       required=true,
     *       @OA\JsonContent(ref="#/components/schemas/OperationStoreRequest")
     *      ),
     *     @OA\Response(
     *         response="200",
     *         description="Редактирование операции",
     *     ),
     * )
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OperationStoreRequest $request, Operation $operation)
    {
        $operation->update($request->validated());

        return new OperationResource($operation);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @OA\Delete(
     *     path="/api/operations/{id}",     
     *     operationId="/api/operations/{operations}(DELETE)",
     *     summary="Удалить операцию",
     *     tags={"Операции"},         
     *     description="Удаление операции по идентификатору",
     *     @OA\Parameter(
     *         in="path", 
     *         name="id",
     *         description="Идентификатор операции",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response="204",
     *         description="Удаление операции"
     *     )
     * )
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Operation $operation)
    {
        $operation->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
