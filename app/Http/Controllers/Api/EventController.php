<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventStoreRequest;
use App\Http\Resources\CarEventResource;
use App\Http\Resources\EventResource;
use App\Jobs\EventJob;
use App\Models\Events;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return EventResource:: collection(Events::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventStoreRequest $request)
    {
        dispatch(new EventJob($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Events $event)
    {
        // return Events::find($id);
        return new CarEventResource($event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventStoreRequest $request, Events $event)
    {
        $event->update($request->validated());

        return new EventResource($event);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Events $event)
    {
        $event->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
