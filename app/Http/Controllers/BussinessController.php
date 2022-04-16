<?php

namespace App\Http\Controllers;

use App\Models\Bussiness;
use App\Http\Requests\StoreBussinessRequest;
use App\Http\Requests\UpdateBussinessRequest;

class BussinessController extends Controller
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
     * @param  \App\Http\Requests\StoreBussinessRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBussinessRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bussiness  $bussiness
     * @return \Illuminate\Http\Response
     */
    public function show(Bussiness $bussiness)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bussiness  $bussiness
     * @return \Illuminate\Http\Response
     */
    public function edit(Bussiness $bussiness)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBussinessRequest  $request
     * @param  \App\Models\Bussiness  $bussiness
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBussinessRequest $request, Bussiness $bussiness)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bussiness  $bussiness
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bussiness $bussiness)
    {
        //
    }
}
