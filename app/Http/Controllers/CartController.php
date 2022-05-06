<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{

    public function shop()
    {
        $products = Product::all();
        /* dd($products); */
        return view('cart.shop')->with(['products' => $products]);
    }

    public function cart()
    {
        $cartCollection = \Cart::getContent();
        
        return view('cart.cart')->with(['cartCollection' => $cartCollection, 'ipInfo' => $this->getLocation()]);
    }
    public function remove(Request $request)
    {
        \Cart::remove($request->id);
        return redirect()->route('cart.index')->with('success_msg', '¡Item eliminado!');
    }

    public function add(Request $request)
    {

        \Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->img
                /* 'slug' => $request->slug */
            )
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Item Agregado a sú Carrito!');
    }

    public function update(Request $request)
    {
        \Cart::update(
            $request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
            )
        );
        return redirect()->route('cart.index')->with('success_msg', 'Carrito está actualizado!');
    }

    public function clear()
    {
        \Cart::clear();
        return redirect()->route('cart.index')->with('success_msg', 'Carrito vacio!');
    }

    public function checkout(Request $request)
    {
        return view('cart.checkout');
    }

    public function getLocation()
    {
        $ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
        $arrayIp = [
            "ip" => "127.0.0.1",
            "success" => true,
            "type" => "IPv4",
            "continent" => "South America",
            "continent_code" => "SA",
            "country" => "Colombia",
            "country_code" => "CO",
            "country_flag" => "https://cdn.ipwhois.io/flags/co.svg",
            "country_capital" => "Bogotá",
            "country_phone" => "+57",
            "country_neighbours" => "BR,EC,PA,PE,VE",
            "region" => "Bogota",
            "city" => "Bogotá",
            "latitude" => 4.7109886,
            "longitude" => -74.072092,
            "asn" => "AS10620",
            "org" => "Telmex Colombia S.A.",
            "isp" => "Telmex Colombia S.A.",
            "timezone" => "America/Bogota",
            "timezone_name" => "-05",
            "timezone_dstOffset" => 0,
            "timezone_gmtOffset" => -18000,
            "timezone_gmt" => "-05:00",
            "currency" => "Colombian Peso",
            "currency_code" => "COP",
            "currency_symbol" => "$",
            "currency_rates" => 4090.613,
            "currency_plural" => "Colombian pesos",
        ];

        $ch = curl_init('http://ipwhois.app/json/' . $ip);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($ch);
        curl_close($ch);
        // Decode JSON response
        $ipWhoIsResponse = json_decode($json, true);
        // Country code output, field "country_code"
        if(isset($ipWhoIsResponse['country_code'])){
            return $ipWhoIsResponse;
        }else{
            return $arrayIp;
        }
    }
}
