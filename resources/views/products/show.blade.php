@extends('index')

@section('css')
    <link href="{{ asset('/assets/vendor/data-tables/DataTables-1.11.5/css/dataTables.bootstrap5.min.css') }}"
        rel="stylesheet">
@endsection

@section('content')
<!-- ======= Product-view Section ======= -->
<section id="product-view" class="section-bg">
    <br>
    <br>
    <br>
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h1 class="display-4" style="text-align: center"> :: {{ $product->name }} :: </h1>
                </div>
                <a class="btn btn-outline-success" href="{{ route('products.index') }}">
                    <i class="bi bi-arrow-left-square-fill"> Volver</i>
                </a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <ul class="list-group row">

                    <li class="list-group-item">
                        <label for="name"><strong>Nombre:</strong></label>
                        <p id="name"><h1 class="display-6">{{ $product->name }}</h1></p>
                    </li>

                    <li class="list-group-item" style="text-align: justify;">
                        <label for="description"><strong>Descripción:</strong></label>
                        <p id="description">{{ $product->description }}</p>
                    </li>
                    
                    <li class="list-group-item">
                        <label for="codec"><strong>Codigo:</strong></label>
                        <p id="codec">{{ $product->codec }}</p>
                    </li>

                    <div class="row col-sm-12">
                        <li class="list-group-item col-sm-6">
                            <label for="priceBuy"><strong>Precio de Compra:</strong></label>
                            <p id="priceBuy">{{ $product->priceBuy }}</p>
                        </li>

                        <li class="list-group-item col-sm-6">
                            <label for="priceSell"><strong>Precio de Venta:</strong></label>
                            <p id="priceSell">{{ $product->priceSell }}</p>
                        </li>
                    </div>

                    <li class="list-group-item">
                        <label for="paymentLink"><strong>Enlace Unico de Pago:</strong></label>
                        <p id="paymentLink"> <a href="{{ $product->paymentLink }}">{{ $product->paymentLink }}</a></p>
                    </li>

                    {{-- <div class="row">
                        <li class="list-group-item col-sm-6">
                            <label for="video"><strong>Video:</strong></label>
                            <video id="video" src="{{ asset('/public/storage/'.$product->video) }}" width="60px" height="60px"></video>
                        </li>
                        
                    </div> --}}

                    <li class="list-group-item">
                        <label for="poster"><strong>Poster:</strong></label>
                        <img id="poster" src="{{ asset('/public/storage/'.$product->poster)}}" width="60px" height="60px" alt="Portada del Producto">
                    </li>
                    <li class="list-group-item">
                        <label for="day"><strong>Día:</strong></label>
                        <p id="day">{{ $product->day }}</p>
                    </li>
                    <li class="list-group-item">
                        <label for="category"><strong>Categoría:</strong></label>
                        <p id="category">{{ $product->category }}</p>
                    </li>
                    <li class="list-group-item">
                        <label for="events_id"><strong>Evento:</strong></label>
                        <p id="events_id">:: {{ $product->enventByProduct($product->events_id)->title }} :: <br>
                            Fecha Inicio: {{ date('d/m/Y', strtotime($product->enventByProduct($product->events_id)->dateStart)) }}</p>
                    </li>
                    <li class="list-group-item">
                        <label for="type"><strong>Tipo:</strong></label>
                        <p id="type">{{ $product->type }}</p>
                    </li>
                    <li class="list-group-item">
                        <label for="status"><strong>Estado:</strong></label>
                        <p id="status"><h1 class="display-6">{{ $product->status == 1 ? 'Activo' : 'Inactivo'}}</h1></p>
                    </li>
                </ul>
            </div>
            <br>
            <div class="pull-left">
                <h1 class="display-4" style="text-align: center"> :: Videos Asignados al Producto ::</h1>
            </div>
            <table id="video-list" class="table table-bordered shadow-lg mt-4">
                <thead>
                    <tr class="table-dark text-center">
                        <th width="5%">No.</th>
                        <th width="5%">Creado</th>
                        <th width="30%">Titulo</th>
                        <th width="35%">Descripción</th>
                        <th width="10%">Url</th>
                        <th width="5%">Estado</th>
                        <th width="10%">Opción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product->videos as $video)
                        <tr>
                            <td class="text-center"></td>
                            <td>{{ date('d/m/Y', strtotime($video->created_at)) }}</td>
                            
                            <td>{{ $video->title }}</td>
                            
                            <td style="text-align: justify;">{{ \Str::limit($video->description, 70) }}</td>
                            
                            <td class="text-center">
                                <video width="80" height="80" class="img-thumbnail">
                                    <source src="{{ asset('/storage/'.$video->url) }}" type="video/mp4">
                                    Tu navegador no admite el elemento <code>video</code>.
                                </video>
                            </td>
                            
                            <td>{{ $video->status == 1 ? 'Activo' : 'Inactivo'}}</td>

                            <td class="text-center">
                                <div class="btn-group">
                                    <a class="btn btn-outline-secondary" href="{{ route('videos.show', $video->id) }}">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>
                                    <a class="btn btn-outline-success" href="{{ route('videos.edit', $video->id) }}">
                                        <i class="bi bi-vector-pen"></i>
                                    </a>
                                    <form action="{{ route('videos.destroy', $video) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('¿Desea eliminar el Video?')" class="btn btn-outline-danger"><i class="bi bi-trash-fill"></i></button>
                                    </form>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <br>
    <br>
</section>
<!-- End Produc-view Section -->
@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            /* inicializando libreria requiere ID tabla */
            var t = $('#video-list').DataTable({
                "order": [
                    /* Ordenamiento predeterminado indice en base cero*/
                    [1, "desc"]
                ],
                "columnDefs": [{
                    /* columna no busqueda indice en base cero*/
                    "targets": [5],
                    "searchable": false,
                }],
                "buttons": [{
                        extend: 'excelHtml5',
                        text: 'Exportar a Excel',
                        titleAttr: 'Exportar a Excel',
                        title: 'Mensajes Recibidos',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5]
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        text: 'Exportar a PDF',
                        titleAttr: 'Exportar a PDF',
                        className: 'btn btn-danger',
                        title: 'Mensajes Recibidos',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5]
                        }
                    },
                    {
                        extend: 'print',
                        text: 'Imprimir',
                        titleAttr: 'Imprimir',
                        className: 'btn btn-info',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5]
                        }
                    }
                ],
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
                }

            });
            /* Generar index de fila automaticamente */
            t.on('order.dt search.dt', function() {
                let i = 1;
                t.cells(null, 0, {
                    search: 'applied',
                    order: 'applied'
                }).every(function(cell) {
                    this.data(i++);
                });
            }).draw();
        });
    </script>
@endsection
