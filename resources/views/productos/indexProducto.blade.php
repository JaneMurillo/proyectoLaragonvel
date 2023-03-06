<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Productos</h1>
    <a href="/producto/create">Agregar Producto</a><br>
    <ul>
    @foreach ($productos as $prod)
        <li>
            {{ $prod->id }} - {{ $prod->nombre}} - {{ $prod->description}}- {{ number_format($prod->costo, 2)}} 
            <br><br><a href="/producto/{{ $prod->id }} ">Ver Detalle</a><br><br>
            <a href="/producto/{{ $prod->id }}/edit ">Editar Producto</a><br><br>
        </li>
    @endforeach
    </ul>
</body>
</html>