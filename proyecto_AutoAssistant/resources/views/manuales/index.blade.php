<x-app-layout>
    <style>
        .container {
            padding: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            color: #ffffff;
        }

        .table th,
        .table td {
            border: 1px solid #fafafa;
            padding: 10px;
        }

        .table th {
            background-color: #000000;
            font-weight: bold;
            text-align: center;
        }

        .table td {
            text-align: center;
        }

        .modal {
            max-width: 600px;
        }
    </style>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('manuales de taller y propietario') }}
        </h2>
    </x-slot>



    <body>
        <div class="container">
            <br>
            <br>

            <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">Nuevo</button>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ARCHIVO</th>
                        <th scope="col">MARCA</th>
                        <th scope="col">MODELO</th>
                        <th scope="col">ESTADO</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($manuales as $key => $item)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td width="10%">
                                <button type="button" class="btn btn-info"
                                    onclick="showFile('{{ $item->id }}')">Ver</button>
                                <button type="button" class="btn btn-success"
                                    onclick="modalEdit('{{ $item->id }}','{{ $item->title }}','{{ $item->state }}','{{ $item->thesis_code }}')"
                                    data-toggle="modal" data-target="#exampleModalEdit">Editar</button>
                                <button type="button" class="btn btn-danger"
                                    onclick="deleteThesis('{{ $item->id }}')">Eliminar</button>
                            </td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->title2 }}</td>
                            <td>
                                @if ($item->state == 1)
                                    Disponible
                                @elseif ($item->state == 0)
                                    No disponible
                                @else
                                    {{ $item->state }}
                                @endif
                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
            <!-- Modal -->
            <form enctype="multipart/form-data" class="modal fade" id="exampleModal" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                @csrf
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Nueva Tesis</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="title">MARCA</label>
                                <input type="text" class="form-control" id="title" name="title">

                            </div>
                            <div class="form-group">
                                <label for="title2">MODELO</label>
                                <input type="text" class="form-control" id="title2" name="title2">

                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Archivo</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1"
                                    name="file">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" value="1" checked class="form-check-input"
                                    id="exampleCheck1" name="state">
                                <label class="form-check-label" for="exampleCheck1">Activo</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" id="btn-register">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
            <form enctype="multipart/form-data" class="modal fade" id="exampleModalEdit" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                @csrf
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Tesis</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="title">Titulo</label>
                                <input type="text" class="form-control" id="title-edit" name="title">
                                <input type="hidden" id="thesis_id" name="thesis_id">
                                <input type="hidden" id="thesis_code" name="thesis_code">
                            </div>
                            <div class="form-group">
                                <label for="file-edit">Archivo</label>
                                <input type="file" class="form-control-file" id="file-edit" name="file">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" value="1" checked class="form-check-input"
                                    id="state-edit" name="state">
                                <label class="form-check-label" for="state-edit">Activo</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" id="btn-update">Actualizar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            function modalEdit(id, tit, est, cod) {
                $('#title-edit').val(tit);
                $('#title2-edit').val(tit);
                $('#state-edit').val(est);
                $('#thesis_id').val(id);
                $('#thesis_code').val(cod);
            }
        </script>

        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script>
            $("#btn-register").click(function() {
                var formData = new FormData(document.getElementById("exampleModal"));
                $.ajax({
                    url: "{{ route('thesis_register') }}",
                    type: "post",
                    dataType: "html",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false
                }).done(function(res) {
                    msg = JSON.parse(res).response.msg
                    alert(msg);
                    location.reload();
                }).fail(function(res) {
                    console.log(res)
                });
            });

            function showFile(id) {
                $.ajax({
                    url: "{{ asset('/thesis/file/') }}/" + id,
                    type: "get",
                    dataType: "html",
                    contentType: false,
                    processData: false
                }).done(function(res) {
                    url = JSON.parse(res).response.url
                    window.open('storage/' + url, '_blank');
                }).fail(function(res) {
                    console.log(res)
                });
            }
            $("#btn-update").click(function() {
                var formData = new FormData(document.getElementById("exampleModalEdit"));
                $.ajax({
                    url: "{{ route('thesis_update') }}",
                    type: "post",
                    dataType: "html",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false
                }).done(function(res) {
                    msg = JSON.parse(res).response.msg
                    alert(msg);
                    location.reload();
                }).fail(function(res) {
                    console.log(res)
                });
            });

            function deleteThesis(id) {
                $.ajax({
                    url: "{{ asset('/thesis/delete/') }}/" + id,
                    type: "get",
                    dataType: "html",
                    contentType: false,
                    processData: false
                }).done(function(res) {
                    msg = JSON.parse(res).response.msg
                    alert(msg);
                    location.reload();
                }).fail(function(res) {
                    console.log(res)
                });
            }
        </script>
</x-app-layout>
