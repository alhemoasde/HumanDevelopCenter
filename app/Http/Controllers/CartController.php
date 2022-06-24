<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomUserNew;

class CartController extends Controller
{

    /**
     * Permite cargar la vista resumen productos disponibles.
     * @return \Illuminate\Http\Response
     */
    public function shop()
    {
        $products = Product::all();
        return view('cart.shop')->with(['products' => $products, 'ipInfo' => $this->getLocation()]);
    }

    /**
     * Permite cargar la vista resumen del carrito de compras.
     * @return \Illuminate\Http\Response
     */
    public function cart()
    {
        $cartCollection = \Cart::getContent();
        $year = date("Y");
        $invoice = 'CDH'.substr(str_shuffle('CentDevelopHuman'), 0, 16).$year.random_int(100,1000000);
        return view('cart.cart')->with(['cartCollection' => $cartCollection, 'ipInfo' => $this->getLocation(), 'invoice' => $invoice]);
    }

    /**
     * Permite remover productos del carrito.
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function remove(Request $request)
    {
        \Cart::remove($request->id);
        return redirect()->route('cart.index')->with('success_msg', '¡Item eliminado!');
    }

    /**
     * Permite añadir productos al carrito.
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Permite actualizar los productos del carrito.
     * Cantidad de articulos.
     * Nuevos articulos.
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Permite limpiar el carrito de compras.
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response 
     */
    public function clear()
    {
        \Cart::clear();
        return redirect()->route('cart.index')->with('success_msg', 'Carrito vacio!');
    }

    /**
     * Permite obtener la geolocalización del usuario en sesión 
     * tomando como dato la ip desde donde se establece la concexión.
     */
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

    /**
     * Permite guardar los datos de una transacción
     * confirmada con la pasarela de pago..
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response view cart.checkout con el resumen de la compra
     */
    public function checkout(Request $request)
    {
        $ref_payco = $this->getDataResponsePago($request->ref_payco);
        $transaction = Transaction::where('invoice_cart','=',$ref_payco['x_id_invoice'])->first();
        
        if(isset($transaction)){
            $transaction->update([
                'ref_transaction' => $request->ref_payco,
                'date_transaccion' => $ref_payco['x_transaction_date'],
                'transaction_id' => $ref_payco['x_transaction_id'],
                'autorizacion' => $ref_payco['x_approval_code'],
                'transaction_state' => $ref_payco['x_transaction_state'],
                'response_reason_text' => $ref_payco['x_response_reason_text'],
                'amount' => $ref_payco['x_amount_ok'],
                'currency_code' => $ref_payco['x_currency_code'],
                'customer_ip' => $ref_payco['x_customer_ip'],
                'signature' => $ref_payco['x_signature'],
            ]);
        } 
        \Cart::clear();
        return view('cart.checkout', compact(['ref_payco']));
    }

    /**
     * Permite consultar en Epayco los resultados de una transacción.
     * @param  Parametro enviado como respuest desde Epayco.co $ref_payco
     * @return Información de respuesta en formato JSON $dataResponse
     */
    public function getDataResponsePago($ref_payco)
    {
        $ch = curl_init('https://secure.epayco.co/validation/v1/reference/'.$ref_payco);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($ch);
        curl_close($ch);
        // Decode JSON response
        $dataResponse = json_decode($json, true);
        return $dataResponse['data'];
    }

    /**
     * Permite guardar los principales datos del carrito de compras.
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveCart(Request $request){
        $transaction = Transaction::create([
            'invoice_cart' => $request->invoice_cart,
            'subscriber_email' => $request->checkoutEmail,
            'amountTotalCart' => $request->amountTotalCart,
        ]);
        $cartCollection = \Cart::getContent();
        $products=array();
        foreach($cartCollection as $item){
            array_push($products,$item->id);
        }
        $transaction->products()->sync($products);
        $transaction->save();
        
        // Se verifica si el comprador existe como suscriptor, si no se crea. 
        $subscriberExist = Subscriber::where('email','=',$request->checkoutEmail)->first();
        if(!isset($subscriberExist)){
            Subscriber::create([
                'name' => $request->checkoutName,
                'email' => $request->checkoutEmail,
            ]);
            Mail::to($request->checkoutEmail)->send(new WelcomUserNew());   
        }
        return view('cart.saveCart');
    }

    /**
     * Permite actualizar los datos de una transacción
     * confirmada con la pasarela de pago Epayco.
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response view cart.checkout con el resumen de la compra
     */
    public function updateCheckout(Request $request)
    {
        $ref_payco = $this->getDataResponsePago($request->ref_transaction);
        $transaction = Transaction::where('invoice_cart','=',$ref_payco['x_id_invoice'])->first();
        
        if(isset($transaction)){
            $transaction->update([
                'ref_transaction' => $request->ref_payco,
                'date_transaccion' => $ref_payco['x_transaction_date'],
                'transaction_id' => $ref_payco['x_transaction_id'],
                'autorizacion' => $ref_payco['x_approval_code'],
                'transaction_state' => $ref_payco['x_transaction_state'],
                'response_reason_text' => $ref_payco['x_response_reason_text'],
                'amount' => $ref_payco['x_amount_ok'],
                'currency_code' => $ref_payco['x_currency_code'],
                'customer_ip' => $ref_payco['x_customer_ip'],
                'signature' => $ref_payco['x_signature'],
            ]);
        } 
        
    }

}
