<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Detalle producto</h1>
    <h3> {{ $producto->nombre }} </h3>
    <h4> {{ $producto->description }} </h4>
    <h5> {{ $producto->costo }} </h5>

    <p>
        <form action="{{ route('producto.destroy', $producto) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Eliminar</button>
        </form>
    </p>
</body>
</html>