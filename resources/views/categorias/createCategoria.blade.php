<x-dash-layout>
    <x-slot name="title">Crear Categoria</x-slot>
    <form action="/categoria" method="POST">
        @csrf
 
        <h3>Crear Categoria</h3>
        <label for="name">Nombre</label><br>
        <input type="text" name="nombre" id="nombre" required value="{{ old('nombre')}}" ><br>
        @error('nombre')
            <h4>{{ $message }}</h4>
        @enderror
        <br>
        <label for="description">Descripción</label><br>
        <input type="text" name="description" id="description"><br>
        @error('description')
            <h4>{{ $message }}</h4>
        @enderror
        <br>
        <input type="submit" value="Crear">

    </form>
</x-dash-layout>