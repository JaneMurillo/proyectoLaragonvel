<x-aut-dash-layout>
    <x-slot name="title">Crear Autor</x-slot>
    <form action="/autor" method="POST">
        @csrf
 
        <h3>Crear Autor</h3>
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
        <select name="producto_ids[]" multiple>
            @foreach ($productos as $producto)
                <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
            @endforeach
        </select>

        <br>
        <br>

        <input type="submit" value="Crear">

    </form>
</x-aut-dash-layout>