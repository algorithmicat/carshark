<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStatusStoreRequest;
use App\Http\Resources\UserStatusResource;
use App\Models\User_statuses;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserStatusResource::collection(User_statuses::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStatusStoreRequest $request)
    {
        $created_user_status = User_statuses::create($request->validated()); //создаем переменную, вызываем модель, метод креэйт. Потом: вместо all, валидированные

        return new UserStatusResource($created_user_status);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User_statuses $user_status)
    {
        return new UserStatusResource($user_status);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserStatusStoreRequest $request, User_statuses $user_status)
    {
        $user_status->update($request->validated());

        return new UserStatusResource($user_status);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User_statuses $user_status)
    {
        $user_status->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
