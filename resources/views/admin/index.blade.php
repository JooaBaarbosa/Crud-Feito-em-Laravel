<!DOCTYPE html>
<html>

<head>
    <meta>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">

</head>

<body>
    <div class="container">
        <a class="btn btn-primary btn-sm" href="{{ route('create') }}">Criar Slider</a>
    @if(Session::has('success'))
        <div class="alert alert-success">
        {{ Session::get('success') }}
    @php
        Session::forget('success');
    @endphp
    </div>
    @endif
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">titulo</th>
                    <th scope="col">categoria</th>
                    <th scope="col">link</th>
                    <th scope="col">imagem</th>
                    <th scope="col">acao</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ( $slides as $slide ) : ?>
                <tr>
                    <th scope="row">{{ $slide->id }}</th>
                    <td>{{ $slide->titulo }}</td>
                    <td>{{ $slide->categoria}}</td>
                    <td>{{ $slide->link}}</td>
                    <td>{{ $slide->imagem}}</td>
                    <td>
                        <a class="btn btn-warning btn-sm"href="{{ route('editar', ['slide' => $slide->id])  }}">Editar</a>
                        <a class="btn btn-danger btn-sm"href="{{ route('deletar', ['slide' => $slide->id])  }}">deletar</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
