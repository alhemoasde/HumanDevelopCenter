<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;
use App\Models\User;
use App\Models\Transaction;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /* public function __construct()
    {
        $this->middleware('admin');
    } */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('homeAdmin');
    }

    /**
     * Metodo que permite visualizar al suscriptor los productos 
     * adquiridos.
     */
    public function indexSuscriptor(Request $request)
    {
        if(isset($request->email)){
            $email=$request->email;
            $subscriber = Subscriber::where('email','=',$email)
            ->where('status','=',1)->first();
            $user = User::where('email','=',$email)
            ->where('status','=',1)->first();
        }
        
        if(isset($subscriber) && isset($user)){
            $objeto=$user;
        }else if(isset($subscriber)){
            $objeto=$subscriber;
        }else if(isset($user)){
            $objeto=$user;
        }else{
            $status='<p>No registras suscrito a nuestros servicios.</p>';
            return $status;
        }
        return view('/home', compact('objeto'));
    }
}
