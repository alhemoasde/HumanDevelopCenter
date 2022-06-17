<?php

namespace App\Http\Controllers;

use App\Models\EventActivitys;
use App\Models\Events;
use App\Http\Requests\StoreEventActivitysRequest;
use App\Http\Requests\UpdateEventActivitysRequest;

class EventActivitysController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param \App\Models\Events $event
     * @return \Illuminate\Http\Response
     */
    public function index(Events $event)
    {
        $eventActivitys = EventActivitys::where('events_id','=',$event->id)->get();
        return view('activitys.index', compact('eventActivitys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('activitys.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEventActivitysRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventActivitysRequest $request)
    {
        EventActivitys::create( $request->all()
        +[
            'active' => true,
        ]
        );        
            
        return redirect()->route('events.index')->with('status', 'Actividad creada satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EventActivitys  $eventActivitys
     * @return \Illuminate\Http\Response
     */
    public function show(EventActivitys $eventActivitys)
    {
        return view('activitys.show', compact('eventActivitys'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EventActivitys  $eventActivitys
     * @return \Illuminate\Http\Response
     */
    public function edit(EventActivitys $eventActivitys)
    {
        return view('activitys.edit', compact('eventActivitys'));
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
        $eventActivitys->update($request->all());
        return redirect()->route('events.index')->with('status', 'Actividad actualizada satisfactoriamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EventActivitys  $eventActivitys
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventActivitys $eventActivitys)
    {
        $eventActivitys->delete();
        return redirect()->route('events.index')
                        ->with('status','Actividad eliminada satisfactoriamente.');
    }
}
