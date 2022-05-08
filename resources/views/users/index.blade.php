@extends('index')

@section('css')
    <link href="{{ asset('/assets/vendor/data-tables/DataTables-1.11.5/css/dataTables.bootstrap5.min.css') }}"
        rel="stylesheet">
@endsection

@section('content')
    <!-- ======= User-list Section ======= -->
    <section id="user-list" class="section-bg">
        <br>
        <br>
        <br>
        <br>
        <div class="container-fluid" data-aos="fade-up">
            <h1 class="display-6 text-center">::: Bandeja de Usuarios del Sistema :::</h1>
            <div class="btn-group">
                <a class="btn btn-outline-success" href="{{ route('users.create') }}">
                    <i class="bi bi-plus-square-fill"> Crear Usuario</i>
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
            <!-- Tabs navs -->
            <div class="d-flex align-items-start">
                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="btn btn-outline-dark active" id="v-pills-admin-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-admin" type="button" role="tab" aria-controls="v-pills-admin"
                        aria-selected="true"><i class="bi bi-person-check-fill"></i> Admin</button>
                    <button class="btn btn-outline-dark" id="v-pills-speaker-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-speaker" type="button" role="tab" aria-controls="v-pills-speaker"
                        aria-selected="false"><i class="bi bi-person-video2"></i> Ponentes</button>
                    <button class="btn btn-outline-dark" id="v-pills-client-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-client" type="button" role="tab" aria-controls="v-pills-client"
                        aria-selected="false"><i class="bi bi-people-fill"></i> Clientes</button>
                    <button class="btn btn-outline-dark" id="v-pills-inactive-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-inactive" type="button" role="tab" aria-controls="v-pills-inactive"
                        aria-selected="false"><i class="bi bi-person-dash-fill"></i> Inactivos</button>
                </div>
                <div class="container tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-admin" role="tabpanel"
                        aria-labelledby="v-pills-admin-tab">
                        <div class="table-responsive">
                            <table id="userAdmin-list" class="table table-bordered shadow-lg mt-4 ">
                                <thead>
                                    <tr class="table-dark text-center">
                                        <th width="5%">No.</th>
                                        <th width="5%">Creado</th>
                                        <th width="20%">Nombre</th>
                                        <th width="20%">Email</th>
                                        <th width="10%">Teléfono</th>
                                        <th width="20%">Fotografía</th>
                                        <th width="10%">Estado</th>
                                        <th width="10%">Opción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usersAdmin as $user)
                                        <tr>
                                            <td class="text-center"></td>
                                            <td>{{ date('d/m/Y', strtotime($user->created_at)) }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->telephone }}</td>
                                            <td class="text-center">
                                                <img class="img-fluid img-thumbnail"
                                                    src="{{ $user->photography == '' ? asset('/img/user-perfil-not.jpg') : asset('/public/storage/' . $user->photography) }}"
                                                    width="50px" height="50px" alt="Imagen de perfil">
                                            </td>
                                            <td>{{ $user->status == 1 ? 'Activo' : 'Inactivo' }}</td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a class="btn btn-outline-secondary"
                                                        href="{{ route('users.show', $user->id) }}">
                                                        <i class="bi bi-eye-fill"></i>
                                                    </a>
                                                    <a class="btn btn-outline-success"
                                                        href="{{ route('users.edit', $user->id) }}">
                                                        <i class="bi bi-vector-pen"></i>
                                                    </a>
                                                    <form action="{{ route('users.destroy', $user) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            onclick="return confirm('¿Desea eliminar el Usuario?')"
                                                            class="btn btn-outline-danger"><i
                                                                class="bi bi-trash-fill"></i></button>
                                                    </form>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-speaker" role="tabpanel" aria-labelledby="v-pills-speaker-tab">
                      <div class="table-responsive">
                        <table id="userSpeaker-list" class="table table-bordered shadow-lg mt-4 ">
                            <thead>
                                <tr class="table-dark text-center">
                                    <th width="5%">No.</th>
                                    <th width="5%">Creado</th>
                                    <th width="20%">Nombre</th>
                                    <th width="20%">Email</th>
                                    <th width="10%">Teléfono</th>
                                    <th width="20%">Fotografía</th>
                                    <th width="10%">Estado</th>
                                    <th width="10%">Opción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usersSpeaker as $user)
                                    <tr>
                                        <td class="text-center"></td>
                                        <td>{{ date('d/m/Y', strtotime($user->created_at)) }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->telephone }}</td>
                                        <td class="text-center">
                                            <img class="img-fluid img-thumbnail"
                                                src="{{ $user->photography == '' ? asset('/img/user-perfil-not.jpg') : asset('/public/storage/' . $user->photography) }}"
                                                width="50px" height="50px" alt="Imagen de perfil">
                                        </td>
                                        <td>{{ $user->status == 1 ? 'Activo' : 'Inactivo' }}</td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a class="btn btn-outline-secondary"
                                                    href="{{ route('users.show', $user->id) }}">
                                                    <i class="bi bi-eye-fill"></i>
                                                </a>
                                                <a class="btn btn-outline-success"
                                                    href="{{ route('users.edit', $user->id) }}">
                                                    <i class="bi bi-vector-pen"></i>
                                                </a>
                                                <form action="{{ route('users.destroy', $user) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        onclick="return confirm('¿Desea eliminar el Usuario?')"
                                                        class="btn btn-outline-danger"><i
                                                            class="bi bi-trash-fill"></i></button>
                                                </form>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-client" role="tabpanel" aria-labelledby="v-pills-client-tab">
                      <div class="table-responsive">
                        <table id="userClient-list" class="table table-bordered shadow-lg mt-4 ">
                            <thead>
                                <tr class="table-dark text-center">
                                    <th width="5%">No.</th>
                                    <th width="5%">Creado</th>
                                    <th width="20%">Nombre</th>
                                    <th width="20%">Email</th>
                                    <th width="10%">Teléfono</th>
                                    <th width="20%">Fotografía</th>
                                    <th width="10%">Estado</th>
                                    <th width="10%">Opción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usersClient as $user)
                                    <tr>
                                        <td class="text-center"></td>
                                        <td>{{ date('d/m/Y', strtotime($user->created_at)) }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->telephone }}</td>
                                        <td class="text-center">
                                            <img class="img-fluid img-thumbnail"
                                                src="{{ $user->photography == '' ? asset('/img/user-perfil-not.jpg') : asset('/public/storage/' . $user->photography) }}"
                                                width="50px" height="50px" alt="Imagen de perfil">
                                        </td>
                                        <td>{{ $user->status == 1 ? 'Activo' : 'Inactivo' }}</td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a class="btn btn-outline-secondary"
                                                    href="{{ route('users.show', $user->id) }}">
                                                    <i class="bi bi-eye-fill"></i>
                                                </a>
                                                <a class="btn btn-outline-success"
                                                    href="{{ route('users.edit', $user->id) }}">
                                                    <i class="bi bi-vector-pen"></i>
                                                </a>
                                                <form action="{{ route('users.destroy', $user) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        onclick="return confirm('¿Desea eliminar el Usuario?')"
                                                        class="btn btn-outline-danger"><i
                                                            class="bi bi-trash-fill"></i></button>
                                                </form>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-inactive" role="tabpanel"
                        aria-labelledby="v-pills-inactive-tab">
                        <div class="table-responsive">
                          <table id="userInactive-list" class="table table-bordered shadow-lg mt-4 ">
                              <thead>
                                  <tr class="table-dark text-center">
                                      <th width="5%">No.</th>
                                      <th width="5%">Creado</th>
                                      <th width="20%">Nombre</th>
                                      <th width="20%">Email</th>
                                      <th width="10%">Teléfono</th>
                                      <th width="20%">Fotografía</th>
                                      <th width="10%">Estado</th>
                                      <th width="10%">Opción</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($usersInactivo as $user)
                                      <tr>
                                          <td class="text-center"></td>
                                          <td>{{ date('d/m/Y', strtotime($user->created_at)) }}</td>
                                          <td>{{ $user->name }}</td>
                                          <td>{{ $user->email }}</td>
                                          <td>{{ $user->telephone }}</td>
                                          <td class="text-center">
                                              <img class="img-fluid img-thumbnail"
                                                  src="{{ $user->photography == '' ? asset('/img/user-perfil-not.jpg') : asset('/public/storage/' . $user->photography) }}"
                                                  width="50px" height="50px" alt="Imagen de perfil">
                                          </td>
                                          <td>{{ $user->status == 1 ? 'Activo' : 'Inactivo' }}</td>
                                          <td class="text-center">
                                              <div class="btn-group">
                                                  <a class="btn btn-outline-secondary"
                                                      href="{{ route('/speaker', 'id='.$user->id) }}">
                                                      <i class="bi bi-eye-fill"></i>
                                                  </a>
                                                  <a class="btn btn-outline-success"
                                                      href="{{ route('users.edit', $user->id) }}">
                                                      <i class="bi bi-vector-pen"></i>
                                                  </a>
                                                  <form action="{{ route('users.destroy', $user) }}" method="POST">
                                                      @csrf
                                                      @method('DELETE')
                                                      <button type="submit"
                                                          onclick="return confirm('¿Desea eliminar el Usuario?')"
                                                          class="btn btn-outline-danger"><i
                                                              class="bi bi-trash-fill"></i></button>
                                                  </form>
                                              </div>

                                          </td>
                                      </tr>
                                  @endforeach
                              </tbody>
                          </table>
                      </div>
                    </div>
                </div>
            </div>
            <!-- Tabs content -->
            <br>
            <br>
        </div>
    </section>
    <!-- End Product-list Section -->
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            /* inicializando libreria requiere ID tabla */
            var t = $('#userAdmin-list').DataTable({
                "order": [
                    /* Ordenamiento predeterminado indice en base cero*/
                    [1, "desc"]
                ],
                "columnDefs": [{
                    /* columna no busqueda indice en base cero*/
                    "targets": [7],
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

        $(document).ready(function() {
            /* inicializando libreria requiere ID tabla */
            var t = $('#userSpeaker-list').DataTable({
                "order": [
                    /* Ordenamiento predeterminado indice en base cero*/
                    [1, "desc"]
                ],
                "columnDefs": [{
                    /* columna no busqueda indice en base cero*/
                    "targets": [7],
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
        $(document).ready(function() {
            /* inicializando libreria requiere ID tabla */
            var t = $('#userClient-list').DataTable({
                "order": [
                    /* Ordenamiento predeterminado indice en base cero*/
                    [1, "desc"]
                ],
                "columnDefs": [{
                    /* columna no busqueda indice en base cero*/
                    "targets": [7],
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

        $(document).ready(function() {
            /* inicializando libreria requiere ID tabla */
            var t = $('#userInactive-list').DataTable({
                "order": [
                    /* Ordenamiento predeterminado indice en base cero*/
                    [1, "desc"]
                ],
                "columnDefs": [{
                    /* columna no busqueda indice en base cero*/
                    "targets": [7],
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
