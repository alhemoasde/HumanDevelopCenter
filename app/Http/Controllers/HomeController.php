<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;
use App\Models\Transaction;
use App\Models\Videos;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\File;


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
        $transactions = Transaction::all();
        return view('homeAdmin', compact('transactions'));
    }

    /**
     * Permite visualizar al suscriptor los productos 
     * adquiridos.
     * @return Array de productos adquiridos por un suscriptor.
     */
    public function indexSuscriptor(Request $request)
    {
        $subscriber = new Subscriber();
        if(isset($request->email)){
            $email=$request->email;
            $subscriber = Subscriber::where('email','=',$email)
            ->where('status','=',1)->first();
        }
     
        if(!isset($subscriber)){
            return view('subscribers.notSubsc');
        }

        $transactions = Transaction::where('subscriber_email','=',$subscriber->email)
        ->where('response_reason_text','=','Aprobada')->get();
        $buyVideos = array();
        foreach($transactions as $transaction){
            foreach($transaction->products as $product){
                foreach($product->videos as $video){
                    array_push($buyVideos, $video);
                }
            }
        }
        return view('/home', compact(['subscriber','buyVideos']));
    }

    /**
     * Permite la descarga de un video
     * @param Id App/Models/Videos
     * @return Response File .mp4
     */
    public function downloadProduct(Request $request)
    {
        $video = Videos::find($request->id)->fresh();
        return Storage::disk('public')->download($video->url,$video->title);
    }


}
