<?php

namespace App\Http\Controllers;

use App\Models\EventActivitys;
use App\Models\Events;
use App\Models\User;
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
        return view('activitys.index', compact('eventActivitys', 'event'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Events $event)
    {
        $users = User::where('status','=','1')->where('profile','=','Speaker')->get();
        return view('activitys.create', compact('event', 'users'));
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
            
        return redirect()->route('activitys.index',$request->events_id)->with('status', 'Actividad creada satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EventActivitys  $eventActivity
     * @return \Illuminate\Http\Response
     */
    public function show(EventActivitys $eventActivity)
    {
        return view('activitys.show', compact('eventActivity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EventActivitys  $eventActivity
     * @return \Illuminate\Http\Response
     */
    public function edit(EventActivitys $eventActivity)
    {
        $users = User::where('status','=','1')->where('profile','=','Speaker')->get();
        return view('activitys.edit', compact('eventActivity','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventActivitysRequest  $request
     * @param  \App\Models\EventActivitys  $eventActivity
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventActivitysRequest $request, EventActivitys $eventActivity)
    {
        $eventActivity->update($request->all());
        return redirect()->route('activitys.index', $eventActivity->event)->with('status', 'Actividad actualizada satisfactoriamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EventActivitys  $eventActivity
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventActivitys $eventActivity)
    {
        $event = $eventActivity->event;
        $eventActivity->delete();
        return redirect()->route('activitys.index', $event->id)
                        ->with('status','Actividad eliminada satisfactoriamente.');
    }
}
