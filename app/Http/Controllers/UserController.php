<?php

namespace App\Http\Controllers;

use App\Models\Videos;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\WelcomUserNew;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usersInactivo = User::where('status','=','0')->get();
        $usersAdmin = User::where('profile','=','Admin')
        ->where('status','=','1')->get();
        $usersSpeaker = User::where('profile','=','Speaker')
        ->where('status','=','1')->get();
        $usersClient = User::where('profile','=','Cliente')
        ->where('status','=','1')->get();
        return view('users.index', compact(['usersInactivo','usersAdmin','usersSpeaker','usersClient']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create([
            'telephone' => $request['telephone'],
            'password' => Hash::make($request['password']),
        ]+$request->all());

        if($user->profile == 'Cliente'){
            Mail::to($request['email'])->send(new WelcomUserNew());
        }

        /* $product->videos()->sync($request->videos); */

        if($request->file('photography')){
            $user ->photography = $request->file('photography')->store('photos','public');
            $user->save();
        }

        return redirect()->route('users.index')->with('status', 'Usuario creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usur  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        /* $user->videos; */
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        if($user->photography != '' && $request->file('photography')){
            Storage::disk('public')->delete($user->photography);
            $user->photography ='';
            $user->update();
        }
        
        /* if($user->email == $request['email']){
            unset($request['email']);
        } */

        $user->update([
            'email' => $user->email == $request['email'] ? $user->email : $request['email'],
            'telephone' => $request['telephone'],
        ]+$request->all());

       /*  $product->videos()->sync($request->videos); */

        if($request->file('photography')){
            $user ->photography = $request->file('photography')->store('photos','public');
            $user->save();
        }

        return redirect()->route('users.index')->with('status', 'Usuario actualizado satisfactoriamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->photography != ''){
            Storage::disk('public')->delete($user->photography);
            $user->photography ='';
            $user->update();
        }

        $user->delete();
    
        return redirect()->route('users.index')
                        ->with('status','Usuario eliminado satisfactoriamente.');
    }

    public function showProfile($id)
    {
        $user= User::find($id);
        return view('users.show', compact('user'));
    }
}
