@extends('sitioweb')
@section('content')
    <style>
        .search-form {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: auto;
            margin-bottom: 10px;
            margin-top: 10px;
            max-width: 700px;
            text-align: center;
        }

        .search-input {
            flex: 1;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        .search-button {
            background-color: #f00a62;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 8px 15px;
            cursor: pointer;
            margin-left: 5px;
        }

        .background-image {
            background-image: url('/imagenes/fondo4.jpg');
            height: 100vh;
            width: 100%;
            background-size: cover;
            background-position: center;
        }

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
            border: 1px solid #000000;
            padding: 10px;
        }

        .table th {
            background-color: #000000;
            font-weight: bold;
            text-align: center;
            color: #ffffff;
        }

        .table td {
            text-align: center;
        }
    </style>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
            integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    </head>

    <body class="background-image">
        <div class="container table mt-4">
            <div id="buscarForm" class="search-form">
                <input type="text" name="search" id="search" class="search-input" placeholder="Buscar por marca..."
                    onkeyup="buscarServicios()">
                <button type="button" onclick="limpiarBusqueda()" class="search-button">Limpiar</button>
            </div>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>PDF</th>
                        <th>MARCA</th>
                        <th>MODELO</th>
                        <th>DISPONIBLE</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($theses as $key => $item)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>
                                <button type="button" class="btn btn-info"
                                    onclick="showFile('{{ $item->id }}')">Ver</button>
                            </td>
                            <td>{{ $item->title }}</td>
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
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            function showFile(id) {
                $.ajax({
                    url: "{{ asset('/thesis/file/') }}/" + id,
                    type: "get",
                    dataType: "html",
                    contentType: false,
                    processData: false
                }).done(function(res) {
                    url = JSON.parse(res).response.url;
                    window.open('storage/' + url, '_blank');
                }).fail(function(res) {
                    console.log(res);
                });
            }
        </script>
        <script>
            function buscarServicios() {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("search");
                filter = input.value.toUpperCase();
                table = document.getElementsByTagName("table")[0];
                tr = table.getElementsByTagName("tr");

                for (i = 0; i < tr.length; i++) {
                    var found = false;
                    for (var j = 0; j < tr[i].getElementsByTagName("td").length; j++) {
                        td = tr[i].getElementsByTagName("td")[j];
                        if (td) {
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                found = true;
                                break;
                            }
                        }
                    }

                    if (found) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }

            function limpiarBusqueda() {
                document.getElementById("search").value = "";
                var table = document.getElementsByTagName("table")[0];
                var tr = table.getElementsByTagName("tr");
                for (var i = 0; i < tr.length; i++) {
                    tr[i].style.display = "";
                }
            }
        </script>
        <script>
            function cargarDatos() {
                $.ajax({
                    url: "{{ route('manuales.index') }}", // Debes definir una ruta en tu archivo de rutas
                    type: "get",
                    dataType: "json",
                    success: function(data) {
                        // Actualiza la tabla con los nuevos datos
                        var tableBody = $("table tbody");
                        tableBody.empty();

                        data.forEach(function(item, index) {
                            var row = $("<tr></tr>");
                            row.append("<th scope='row'>" + (index + 1) + "</th>");
                            row.append("<td><button type='button' class='btn btn-info' onclick='showFile(" +
                                item.id + ")'>Ver</button></td>");
                            row.append("<td>" + item.title + "</td>");
                            row.append("<td>" + (item.state == 1 ? 'Disponible' : (item.state == 0 ?
                                'No disponible' : item.state)) + "</td>");
                            tableBody.append(row);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            }

            // Llama a la función para cargar datos actualizados cuando se carga la página.
            cargarDatos();
        </script>
    </body>
@endsection
