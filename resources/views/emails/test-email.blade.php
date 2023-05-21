<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmacion de producto</title>
</head>
<body>
    <h1>Producto Creado</h1>
    <br>
    <p>Se ha creado tu producto {{ $producto->nombre }} exitosamente: {{ now() }}</p>
</body>
</html>