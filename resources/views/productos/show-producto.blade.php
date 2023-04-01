<x-dash-layout>
    <x-slot name="title">Detalle del Producto</x-slot>
    <div class="container-fluid px-2 px-md-4">
        <div class="col-md-7">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0">Informacion del Producto</h6>
            </div>
            <div class="card-header pb-0 px-3">
                <h3> {{ $producto->nombre }} </h3>
            </div>
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0 ">Descripción</h6>
                <p class="mb-0"> {{ $producto->description }} </p>
            </div>
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0 ">Costo</h6>
                <p class="mb-0"> {{ $producto->costo }} </p>
            </div>
            <div class="card-header pb-0 px-3">
                <p>
                    <form action="{{ route('producto.destroy', $producto) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn bg-gradient-dark mb-0" type="submit">Eliminar</button>
                    </form>
                </p>
            </div>
          </div>
        </div>
    </div>
</x-dash-layout>