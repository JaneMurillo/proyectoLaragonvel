<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Crear Productos</h1> -->
<x-prod-dash-layout>
    <x-slot name="title">Crear Productos</x-slot>
    <form action="/producto" method="POST"  enctype="multipart/form-data">
        @csrf
 
        <h3>Crear Productos</h3>
        <label for="name">Nombre</label><br>
        <input type="text" name="nombre" id="nombre" required value="{{ old('nombre')}}" ><br>
        @error('nombre')
            <h4>{{ $message }}</h4>
        @enderror
        <br>
        <label for="description">Descripción</label><br>
        <input type="text" name="description" id="descritcion"><br>
        @error('descripcion')
            <h4>{{ $message }}</h4>
        @enderror
        <br>
        <label for="costo">Costo</label><br>
        <input type="text" name="costo" id="costo"><br>
        @error('costo')
            <h4>{{ $message }}</h4>
        @enderror
        <br>
            <label>Selecciona archivo</label>
            <input type="file" name="archivo" id="archivo">
        </div>
        <br>
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary btn-lg btn-block">
            <i class="mdi mdi-content-save-all"></i>
                Guardar
            </button>
        </div>


    </form>
</x-prod-dash-layout>
<!-- </body>
</html> -->