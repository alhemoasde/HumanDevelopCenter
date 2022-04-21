<?php

namespace App\Http\Controllers;

use App\Models\Bussiness;
use App\Http\Requests\StoreBussinessRequest;
use App\Http\Requests\UpdateBussinessRequest;
use Illuminate\Support\Facades\Storage;

class BussinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bussiness = Bussiness::all()->first();
        $urlLogo = Storage::url($bussiness->logo);
        return view('bussiness.index', compact(['bussiness','urlLogo']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bussiness.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBussinessRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBussinessRequest $request)
    {
        $busine = Bussiness::create($request->all());

        if($request->file('logo')){
            $busine ->logo =$request->file('logo')->store('logo','public');
            $busine->save();
        }

        return redirect()->route('bussiness.index')->with('status', 'Datos enviados satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bussiness  $bussiness
     * @return \Illuminate\Http\Response
     */
    public function show(Bussiness $bussiness)
    {
        //No aplica.
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bussiness  $bussiness
     * @return \Illuminate\Http\Response
     */
    public function edit(Bussiness $bussiness)
    {
        $urlLogo = Storage::url($bussiness->logo);
        return view('bussiness.edit', compact(['bussiness','urlLogo']));
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
        
        if($bussiness->logo != ''){
            Storage::disk('public')->delete($bussiness->logo);
            $bussiness->logo ='';
            $bussiness->update();
        }

        $bussiness->update($request->all());

        if ($request->file('logo')) {
            $bussiness->logo = $request->file('logo')->store('logo', 'public');
            $bussiness->update();
        }

        return redirect()->route('bussiness.index')->with('status', 'Datos actualizados satisfactoriamente.');
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
