@extends('index')

@section('css')
    <link href="{{ asset('/assets/vendor/data-tables/DataTables-1.11.5/css/dataTables.bootstrap5.min.css') }}"
        rel="stylesheet">
@endsection

@section('content')
    <!-- ======= Videos-list Section ======= -->
    <section id="videos-list" class="section-bg">
        <br>
        <br>
        <br>
        <br>
        <div class="container-fluid" data-aos="fade-up">
            <h1 class="display-6 text-center">::: Bandeja de Videos :::</h1>
            <div class="btn-group">
                <a class="btn btn-outline-success" href="{{ route('videos.create') }}">
                    <i class="bi bi-plus-square-fill"> Crear Video</i>
                </a>
            </div>
            <div class="my-3">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
            <br>
            <div class="table-responsive">
                <table id="video-list" class="table table-bordered shadow-lg mt-4">
                    <thead>
                        <tr class="table-dark text-center">
                            <th width="5%">No.</th>
                            <th width="5%">Creado</th>
                            <th width="30%">Titulo</th>
                            <th width="35%">Descripción</th>
                            <th width="5%">Estado</th>
                            <th width="10%">Opción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($videos as $video)
                            <tr>
                                <td class="text-center"></td>
                                <td>{{ date('d/m/Y', strtotime($video->created_at)) }}</td>
                                
                                <td>{{ $video->title }}</td>
                                
                                <td style="text-align: justify;">{{ \Str::limit($video->description, 70) }}</td>
                                
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
            <br>
            <br>
            
        </div>
    </section>
    <!-- End Videos-list Section -->
@endsection

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
                    "targets": [6],
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
