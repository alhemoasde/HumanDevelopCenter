<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Events;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events = Events::where('status','=','Programado')
        ->orWhere('status','=','En Desarrollo')->get();
        return view('products.create', compact('events'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->all());

        if($request->file('video')){
            $product ->video = $request->file('video')->store('videos','public');
            $product->save();
        }

        if($request->file('poster')){
            $product ->poster = $request->file('poster')->store('posters','public');
            $product->save();
        }

        return redirect()->route('products.index')->with('status', 'Datos enviados satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $events = Events::where('status','=','Programado')
        ->orWhere('status','=','En Desarrollo')->get();
        return view('products.edit', compact(['product','events']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        if($product->video != ''){
            Storage::disk('public')->delete($product->video);
            $product->video ='';
            $product->update();
        }

        if($product->poster != ''){
            Storage::disk('public')->delete($product->poster);
            $product->poster ='';
            $product->update();
        }
        
        $product->update($request->all());

        if($request->file('video')){
            $product ->video = $request->file('video')->store('videos','public');
            $product->save();
        }

        if($request->file('poster')){
            $product ->poster = $request->file('poster')->store('posters','public');
            $product->save();
        }

        return redirect()->route('products.index')->with('status', 'Producto actualizado satisfactoriamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if($product->video != ''){
            Storage::disk('public')->delete($product->video);
            $product->video ='';
            $product->update();
        }

        if($product->poster != ''){
            Storage::disk('public')->delete($product->poster);
            $product->poster ='';
            $product->update();
        }

        $product->delete();
    
        return redirect()->route('products.index')
                        ->with('status','Producto eliminado satisfactoriamente.');
    }
}
