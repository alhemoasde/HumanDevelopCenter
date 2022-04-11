<?php

namespace App\Http\Controllers;

use App\Models\EventActivitys;
use App\Http\Requests\StoreEventActivitysRequest;
use App\Http\Requests\UpdateEventActivitysRequest;

class EventActivitysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEventActivitysRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventActivitysRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EventActivitys  $eventActivitys
     * @return \Illuminate\Http\Response
     */
    public function show(EventActivitys $eventActivitys)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EventActivitys  $eventActivitys
     * @return \Illuminate\Http\Response
     */
    public function edit(EventActivitys $eventActivitys)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventActivitysRequest  $request
     * @param  \App\Models\EventActivitys  $eventActivitys
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventActivitysRequest $request, EventActivitys $eventActivitys)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EventActivitys  $eventActivitys
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventActivitys $eventActivitys)
    {
        //
    }
}
