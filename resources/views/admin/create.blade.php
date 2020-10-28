<!DOCTYPE html>
<html>

<head>
    <meta>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">

</head>

<body>
    <div class="container">
        <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="titulo">Titulo Do Banner</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo')}}">
                @if ($errors->has('titulo'))
                <span class="text-danger">{{ $errors->first('titulo') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="categoria">Categoria</label>
                <input type="text" class="form-control" id="categoria" name="categoria"  value="{{ old('categoria')}}">
                @if ($errors->has('categoria'))
                <span class="text-danger">{{ $errors->first('categoria') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="link">Link</label>
                <input type="url" class="form-control" id="link" name="link"  value="{{ old('link')}}">
                @if ($errors->has('link'))
                <span class="text-danger">{{ $errors->first('link') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="imagem">Imagem</label>
                <input type="file" class="form-control" id="imagem" name="imagem">
                @if ($errors->has('imagem'))
                <span class="text-danger">{{ $errors->first('imagem') }}</span>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Criar</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
