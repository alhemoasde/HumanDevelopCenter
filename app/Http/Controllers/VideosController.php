<?php

namespace App\Http\Controllers;

use App\Models\Videos;
use App\Http\Requests\StoreVideosRequest;
use App\Http\Requests\UpdateVideosRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\User;

class VideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Videos::all();
        return view('videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('status','=','1')->where('profile','=','Speaker')->get();
        return view('videos.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVideosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVideosRequest $request)
    {
        if(isset($request->urlText)){
            $video = Videos::create(['url' => 'videos/'.$request->urlText] + $request->all());
        }else{
            $video = Videos::create($request->all());
        }

        if($request->file('url')){
            $video ->url = $request->file('url')->store('videos','public');
            $video->save();
        } 

        /* if($request->file('poster')){
            $video ->poster = $request->file('poster')->store('posters','public');
            $video->save();
        }
 */
        return redirect()->route('videos.index')->with('status', 'Datos enviados satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Videos  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Videos $video)
    {
        return view('videos.show', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Videos $video)
    {
        $users = User::where('status','=','1')->where('profile','=','Speaker')->get();
        return view('videos.edit', compact(['video','users']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVideosRequest  $request
     * @param  \App\Models\Videos  $video
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVideosRequest $request, Videos $video)
    {
        if(($video->url != '' && isset($request->urlText)) || ($video->url != '' && $request->file('url'))){
            Storage::disk('public')->delete($video->url);
            $video->url ='';
            $video->update();
        }

        if(isset($request->urlText)){
            $video->update(['url' => 'videos/'.$request->urlText] + $request->all());
        }else{
            $video->update($request->all());
        }

        if($request->file('url')){
            $video ->url = $request->file('url')->store('videos','public');
            $video->save();
        }

        return redirect()->route('videos.index')->with('status', 'Video actualizado satisfactoriamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Videos  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Videos $video)
    {
        if($video->url != ''){
            Storage::disk('public')->delete($video->url);
            $video->url ='';
            $video->update();

            $video->delete();

            return redirect()->route('videos.index')
                        ->with('status','Video eliminado satisfactoriamente.');

        }
    }
}
