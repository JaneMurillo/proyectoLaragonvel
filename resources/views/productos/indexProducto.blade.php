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
    <ul>
    @foreach ($productos as $prod)
        <li>{{ $prod->id }} - {{ $prod->nombre}} - {{ $prod->description}}- {{ number_format($prod->costo, 2)}} </li>
    @endforeach
    </ul>
</body>
</html>