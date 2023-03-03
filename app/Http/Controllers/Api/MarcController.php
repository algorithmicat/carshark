<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MarcStoreRequest;
use App\Http\Resources\MarcResource;
use App\Models\Marc;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MarcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MarcResource::collection(Marc::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MarcStoreRequest $request)
    {
        $created_marc = Marc::create($request->validated());

        return new MarcResource($created_marc);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Marc $marc)
    {
        return new MarcResource($marc);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MarcStoreRequest $request, Marc $marc)
    {
        $marc->update($request->validated());

        return new MarcResource($marc);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marc $marc)
    {
        $marc->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
