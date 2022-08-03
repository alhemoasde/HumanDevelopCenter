@extends('index')

@section('css')
@endsection

@section('content')
    <br>
    <br>
    <br>
    <br>
    <!-- ========================================================================= 
    ////// Tome este código y cópielo en el código fuente de su sitio web ////
    ========================================================================== -->
    <div id="miepayco">
        <script defer type="text/javascript" 
            src="https://mi-epayco.s3.amazonaws.com/embed.js" 
            miepaycoUrl="https://cdhumano.epayco.me">
        </script> 
    </div>
    <!-- ================================================================== -->
    <div style="text-align: center">
        <h2>Donar con Paypal</h2>
        <form action="https://www.paypal.com/donate" method="post" target="_top">
            <input type="hidden" name="hosted_button_id" value="ZFEUQPM6MJBDQ" />
            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - La forma más segura y fácil de pagar en línea." alt="Donar con el botón de PayPal" />
            <img alt="" border="1" src="https://www.paypal.com/en_CO/i/scr/pixel.gif" width="1" height="1" />
        </form>
    </div>
    
        

@endsection

@section('js')
@endsection