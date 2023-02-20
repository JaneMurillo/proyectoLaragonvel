<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Crear Productos</h1>
    <form action="/producto/store" method="POST">

        <label for="name">Nombre</label><br>
        <input type="text" name="nombre" id="nombre" required><br>
        @error('nombre')
            <h5>{{ $message }}</h5>
        @enderror
        <br>
        <label for="descripcion">Descripción</label><br>
        <input type="text" name="codigo" id="codigo"><br>
        @error('descripcion')
            <h4>{{ $message }}</h4>
        @enderror
        <br>
        <input type="submit" value="Enviar">

    </form>
</body>
</html>