<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OperationStoreRequest;
use App\Http\Resources\OperationResource;
use App\Models\Operations;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return OperationResource::collection(Operations::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OperationStoreRequest $request)
    {
        $created_operation = Operations::create($request->validated()); //создаем переменную, вызываем модель, метод креэйт. Потом: вместо all, валидированные

        return new OperationResource($created_operation);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Operations $operation)
    {
        return new OperationResource($operation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OperationStoreRequest $request, Operations $operation)
    {
        $operation->update($request->validated());

        return new OperationResource($operation);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Operations $operation)
    {
        $operation->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
