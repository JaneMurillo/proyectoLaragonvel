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
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pagina</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Categorias</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Categorias</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
              <label class="form-label">Buscar...</label>
              <input type="text" class="form-control">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <form  method="POST"  action="{{ route('logout') }}">
                @csrf
                <button  class="nav-link text-body font-weight-bold px-0 border-0">
                  <i class="fa fa-user me-sm-1"></i>
                  <span class="d-sm-inline d-none">Salir</span>
                </button>
              </form>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="col-3 text-end">
        <a class="btn bg-gradient-dark mb-0" href="/categoria/create"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Agregar Categoria</a>
    </div>
     
    <div class="container-fluid py-4">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Categorias</h6>
                </div>
            </div>
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">ID</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Categoria</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Descripción</th>
                        <th class="text-secondary opacity-7"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorias as $cat)
                        <tr>
                            <td>
                                <div class="d-flex px-3 py-1 flex-column justify-content-center">
                                    <p class="text-xs text-secondary mb-0">{{ $cat->id }}</p>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <p class="text-xs font-weight-bold mb-0">{{ $cat->nombre}}</p>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex  flex-column justify-content-center">
                                    <p class="text-xs text-secondary mb-0">{{ $cat->description}}</p>
                                </div>
                            </td>
                            <td class="align-middle">
                                <a href="/categoria/{{ $cat->id }}/edit " class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                    Editar
                                </a>
                            </td>
                            <td class="align-middle">
                                <a href="/categoria/{{ $cat->id }} " class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
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