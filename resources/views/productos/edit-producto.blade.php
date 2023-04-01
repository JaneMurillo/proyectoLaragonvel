<x-dash-layout>
    <x-slot name="title">Editar Productos</x-slot>
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
        <input type="text" name="description" id="description" value="{{ old('description') ?? $producto->description }}"><br>
        @error('description')
            <h4>{{ $message }}</h4>
        @enderror
        <br>
        <label for="costo">Costo</label><br>
        <input type="text" name="costo" id="costo" value="{{ old('costo') ?? $producto->costo }}"><br>
        @error('costo')
            <h4>{{ $message }}</h4>
        @enderror
        <br>
        <input type="submit" value="Enviar">

    </form>
</x-dash-layout>
