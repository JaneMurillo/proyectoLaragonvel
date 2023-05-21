<x-aut-dash-layout>
    <x-slot name="title">Detalle del Autor</x-slot>
    <div class="container-fluid px-2 px-md-4">
        <div class="col-md-7">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0">Informacion del Autor</h6>
            </div>
            <div class="card-header pb-0 px-3">
                <h3> {{ $autor->nombre }} </h3>
            </div>
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0 ">Descripción</h6>
                <p class="mb-0"> {{ $autor->description }} </p>
            </div> 
            <div class="card-header pb-0 px-3">
                <p>
                    <form action="{{ route('autor.destroy', $autor) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn bg-gradient-dark mb-0" type="submit">Eliminar</button>
                    </form>
                </p>
            </div>
          </div>
        </div>
    </div>
</x-aut-dash-layout>