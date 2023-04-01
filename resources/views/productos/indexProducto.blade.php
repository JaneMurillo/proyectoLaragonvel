<!--
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    -->
<x-dash-layout>
    <div class="col-3 text-end">
        <a class="btn bg-gradient-dark mb-0" href="/producto/create"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Agregar Producto</a>
    </div>
    
    <div class="container-fluid py-4">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Productos</h6>
                </div>
            </div>
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">ID</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Producto</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Descripción</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Costo</th>
                        <th class="text-secondary opacity-7"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $prod)
                        <tr>
                            <td>
                                <div class="d-flex px-3 py-1 flex-column justify-content-center">
                                    <p class="text-xs text-secondary mb-0">{{ $prod->id }}</p>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <p class="text-xs font-weight-bold mb-0">{{ $prod->nombre}}</p>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex  flex-column justify-content-center">
                                    <p class="text-xs text-secondary mb-0">{{ $prod->description}}</p>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-column justify-content-center">
                                    <p class="text-xs text-secondary mb-0">{{ number_format($prod->costo, 2)}}</p>
                                </div>
                            </td>
                            <td class="align-middle">
                                <a href="/producto/{{ $prod->id }}/edit " class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                    Editar
                                </a>
                            </td>
                            <td class="align-middle">
                                <a href="/producto/{{ $prod->id }} " class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                    Detalle
                                </a>
                            </td>
                        </tr>
                        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-dash-layout>

<!--
</body>
</html>
-->