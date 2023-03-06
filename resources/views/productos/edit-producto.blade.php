<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Editar Productos</h1>
    <form action="{{ route('producto.update', $producto ) }}" method="POST">
        @csrf
        @method('PATCH')
        <label for="name">Nombre</label><br>
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre') ?? $producto->nombre }}"><br>
        @error('nombre')
            <h4>{{ $message }}</h4>
        @enderror
        <br>
        <label for="description">Descripción</label><br>
        <input type="text" name="description" id="description" value="{{ old('nombre') ?? $producto->description }}"><br>
        @error('description')
            <h4>{{ $message }}</h4>
        @enderror
        <br>
        <label for="costo">Costo</label><br>
        <input type="text" name="costo" id="costo" value="{{ old('nombre') ?? $producto->costo }}"><br>
        @error('costo')
            <h4>{{ $message }}</h4>
        @enderror
        <br>
        <input type="submit" value="Enviar">

    </form>
</body>
</html>