@extends('index')

@section('css')
<link href="{{asset('/assets/vendor/data-tables/DataTables-1.11.5/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet">
@endsection

@section('content')
<!-- ======= Contact-list Section ======= -->
<section id="contact-list" class="section-bg">
    <br>
    <br>
    <br>
    <br>
    <div class="container" data-aos="fade-up">
        <h1 class="display-6 text-center">::: Bandeja de Mensajes Recibidos :::</h1>
        <div class="table-responsive">
            <table id="contacts-list" class="table table-bordered shadow-lg mt-4">
                <thead>
                    <tr class="table-dark text-center">
                        <th width="4%">No.</th>
                        <th width="5%">Creado</th>
                        <th width="16%">Nombre</th>
                        <th width="20%">Email</th>
                        <th width="20%">Asunto</th>
                        <th width="25%">Mensaje</th>
                        <th width="10%">Opción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                    <tr>
                        <td class="text-center"></td>
                        <td>{{ date('d/m/Y',strtotime($contact->created_at)) }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->subject }}</td>
                        <td style="text-align: justify;">{{ \Str::limit($contact->message, 70) }}</td>
                        <td class="text-center">
                        <div class="btn-group"> 
                        <a class="btn btn-outline-secondary" href="{{ route('contacts.show',$contact->id) }}">
                            <i class="bi bi-eye-fill"></i>
                            </a>
                        </div>
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <br>
        <br>
</section>
<!-- End Contact-list Section -->
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        /* inicializando libreria requiere ID tabla */
        var t = $('#contacts-list').DataTable({
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