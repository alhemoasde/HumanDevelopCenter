@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Mensajes</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('contact.index') }}"> Volver</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombe¿re:</strong>
                {{ $post->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $post->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Asunto:</strong>
                {{ $post->subject }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Mensaje:</strong>
                {{ $post->message }}
            </div>
        </div>
    </div>
@endsection