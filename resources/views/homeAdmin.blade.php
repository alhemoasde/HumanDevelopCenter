@extends('index')

@section('css')
    <link href="{{ asset('/assets/vendor/data-tables/DataTables-1.11.5/css/dataTables.bootstrap5.min.css') }}"
        rel="stylesheet">
@endsection

@section('content')
    <!-- ======= Transaccion-list Section ======= -->
    <section id="Transaccion-list" class="section-bg">
        <br>
        <br>
        <br>
        <br>
        <div class="container-fluid" data-aos="fade-up">
            <h1 class="display-6 text-center">::: Registro de Transacciones :::</h1>
            <div class="my-3">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
            <br>
            <div class="table-responsive">
                <table id="transaction-list" class="table table-bordered shadow-lg mt-4">
                    <thead>
                        <tr class="table-dark text-center">
                            <th width="5%">No.</th>
                            <th width="5%">Creado</th>
                            <th width="15%">Factura CDH</th>
                            <th width="25%">Email Suscriptor</th>
                            <th width="20%">Total Venta</th>
                            <th width="20%">Autorizacion</th>
                            <th width="5%">Moneda</th>
                            <th width="20%">Estado</th>
                            {{-- <th width="10%">Opción</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                            <tr>
                                <td class="text-center"></td>
                                <td>{{ date('d/m/Y', strtotime($transaction->created_at)) }}</td>
                                <td>{{ $transaction->invoice_cart }}</td>
                                <td>{{ $transaction->subscriber_email }}</td>
                                <td>{{ number_format($transaction->amountTotalCart, 2, '.', ',') }}</td>
                                <td>{{ $transaction->autorizacion }}</td>
                                <td>{{ $transaction->currency_code }}</td>
                                <td>{{ $transaction->response_reason_text}}</td>

                                {{-- <td class="text-center">
                                    <div class="btn-group">
                                        <a class="btn btn-outline-secondary" href="{{ route('products.show', $product->id) }}">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>
                                        <a class="btn btn-outline-success" href="{{ route('products.edit', $product->id) }}">
                                            <i class="bi bi-vector-pen"></i>
                                        </a>
                                        <form action="{{ route('products.destroy', $product) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('¿Desea eliminar el Producto?')" class="btn btn-outline-danger"><i class="bi bi-trash-fill"></i></button>
                                        </form>
                                    </div>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <br>
            <br>
        </div>
    </section>
    <!-- End Transaccion-list Section -->
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            /* inicializando libreria requiere ID tabla */
            var t = $('#transaction-list').DataTable({
                "order": [
                    /* Ordenamiento predeterminado indice en base cero*/
                    [1, "desc"]
                ],
                "columnDefs": [{
                    /* columna no busqueda indice en base cero*/
                    "targets": [6],
                    "searchable": false,
                }],
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
