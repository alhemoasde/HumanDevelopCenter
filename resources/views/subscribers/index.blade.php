@extends('index')

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css" />
@endsection

@section('content')
    <!-- ======= Subscriber-list Section ======= -->
    <section id="contact-list" class="section-bg">
        <br>
        <br>
        <br>
        <br>
        <div class="container-fluid" data-aos="fade-up">
            <h1 class="display-6 text-center">::: Bandeja de Suscriptores :::</h1>
            <div class="btn-group">
                <a class="btn btn-outline-success" href="{{ route('subscribers.create') }}">
                    <i class="bi bi-plus-square-fill"> Agregar Suscriptor</i>
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
                <table id="subscriptor-list" class="table table-bordered shadow-lg mt-4">
                    <thead>
                        <tr class="table-dark text-center">
                            <th width="5%">No.</th>
                            <th width="5%">Creado</th>
                            <th width="35%">Nombre</th>
                            <th width="40%">Email</th>
                            <th width="5%">Estado</th>
                            <th width="10%">Opción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subscribers as $subscriber)
                            <tr>
                                <td class="text-center"></td>
                                <td>{{ date('d/m/Y', strtotime($subscriber->created_at)) }}</td>
                                <td>{{ $subscriber->name }}</td>
                                <td>{{ $subscriber->email }}</td>
                                <td>{{ $subscriber->status == 1 ? 'Activo' : 'Inactivo' }}</td>

                                <td class="text-center">
                                    <div class="btn-group">
                                        <a class="btn btn-outline-secondary"
                                            href="{{ route('subscribers.show', $subscriber->id) }}">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>
                                        <a class="btn btn-outline-success"
                                            href="{{ route('subscribers.edit', $subscriber->id) }}">
                                            <i class="bi bi-vector-pen"></i>
                                        </a>
                                        <form action="{{ route('subscribers.destroy', $subscriber) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('¿Desea eliminar el Suscriptor?')"
                                                class="btn btn-outline-danger"><i class="bi bi-trash-fill"></i></button>
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
    <!-- End Subscriber-list Section -->
@endsection

@section('js')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js">
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/select/1.4.0/js/dataTables.select.min.js"></script>

    <script>
        $(document).ready(function() {
            /* inicializando libreria requiere ID tabla */
            var t = $('#subscriptor-list').DataTable({

                dom: 'Bfrtip',
                buttons: [
                    {
                    extend: 'excelHtml5',
                    text: 'Excel',
                    titleAttr: 'Exportar a Excel',
                    title: 'Suscriptores Centro de Desarrollo Humano Colombia',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    text: 'PDF',
                    titleAttr: 'Exportar a PDF',
                    title: 'Suscriptores Centro de Desarrollo Humano Colombia',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    }
                },
                {
                    extend: 'print',
                    text: 'Imprimir',
                    titleAttr: 'Imprimir',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    }
                }
                ],
                order: [
                    /* Ordenamiento predeterminado indice en base cero*/
                    [1, "desc"]
                ],
                columnDefs: [{
                    /* columna no busqueda indice en base cero*/
                    "targets": [5],
                    "searchable": false,
                }],
                language: {
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
