@extends('index');

@section('content')
    <label for="emails">¿A quién deseas enviar un correo electrónico?</label>
    <input type="email" multiple name="emails" id="emails" list="drawfemails" required size="64">

    <datalist id="drawfemails">
    <option value="gruñón@woodworkers.com">Gruñón</option>
    <option value="feliz@woodworkers.com">Feliz</option>
    <option value="dormilón@woodworkers.com">Dormilón</option>
    <option value="tímido@woodworkers.com">Tímido</option>
    <option value="estornudo@woodworkers.com">Estornudo</option>
    <option value="tontín@woodworkers.com">Tontín</option>
    <option value="doc@woodworkers.com">Doc</option>
    </datalist>
@endsection