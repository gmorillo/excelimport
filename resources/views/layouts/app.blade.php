<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{asset('js/app.js')}}" defer></script>
    <script src="{{asset('js/datepicker.js')}}" defer></script>
    <script src="{{asset('js/datepicker.es.js')}}" defer></script> 
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.js"></script>
    @yield('scripts')   

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">


    <!-- Styles -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="{{asset('css/datepicker.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.8/dist/css/bootstrap-select.min.css">
    <!--<link href="{{asset('css/excel-bootstrap-table-filter-style.css')}}" rel="stylesheet">-->
    <link rel="stylesheet" href="{{asset('css/handsontable.css')}}">
    @yield('stylesheet')
</head>
<body>
    <body>
    <div id="app">
        
        <header>
            @include('plantilla_base.nav')
        </header>

        <main class="">
            @yield('content')
            @yield('graficos')
        </main>
        
        <footer>
            @include('plantilla_base.footer')
        </footer>
    </div>
</body>
</body>
</html>
<!-- Modal IMPORTAR DATOS PROYeCTOS-LEGALIZACIONES-->
<div class="modal fade" id="importCSV" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Importar Archivo CSV</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('importAllData') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="input-group mb-3">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="file" name="file">
                <label class="custom-file-label" for="inputGroupFile02" required>Agregar archivo Excel/CSV</label>
            </div>
        </div>
        <input type="submit" class="btn btn-primary btn-lg loaddataspin" style="margin-top: 3%" >
    </form>
    <div class="text-center">
        <i class="fa fa-spinner d-none text-primary loadingspin"></i>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal IMPORTAR DATOS Estudios Técnicos-->
<div class="modal fade" id="importETGLOBAL" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Importar Estudios Técnicos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('importAllDataET') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="input-group mb-3">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="file" name="file">
                <label class="custom-file-label" for="inputGroupFile02" required>Agregar archivo Excel/CSV</label>
            </div>
        </div>
        <input type="submit" class="btn btn-primary btn-lg loaddataspin" style="margin-top: 3%">
    </form>
    <div class="text-center">
        <i class="fa fa-spinner d-none text-primary loadingspin"></i>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal IMPORTAR DATOS Estudios Técnicos-->
<div class="modal fade" id="importGraphicCalidadET" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Importar Datos Gráfico Calidad ET</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('importGlobalCalidadETData') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="input-group mb-3">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="file" name="file">
                <label class="custom-file-label" for="inputGroupFile02" required>Agregar archivo Excel/CSV</label>
            </div>
        </div>
        <input type="submit" class="btn btn-primary btn-lg loaddataspin" style="margin-top: 3%">
    </form>
    <div class="text-center">
        <i class="fa fa-spinner d-none text-primary loadingspin"></i>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal CM ET GLOBAL-->
<div class="modal fade" id="importCMetGlobal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Importar Datos Gráfico ET Global</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('importCmetglobal') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="input-group mb-3">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="file" name="file">
                <label class="custom-file-label" for="inputGroupFile02" required>Agregar archivo Excel/CSV</label>
            </div>
        </div>
        <input type="submit" class="btn btn-primary btn-lg loaddataspin" style="margin-top: 3%">
    </form>
    <div class="text-center">
        <i class="fa fa-spinner d-none text-primary loadingspin"></i>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal CM ET GCC-->
<div class="modal fade" id="importCMetGCC" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Importar Datos Gráfico ET GCC</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('importCmetGccData') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="input-group mb-3">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="file" name="file">
                <label class="custom-file-label" for="inputGroupFile02" required>Agregar archivo Excel/CSV</label>
            </div>
        </div>
        <input type="submit" class="btn btn-primary btn-lg loaddataspin" style="margin-top: 3%">
    </form>
    <div class="text-center">
        <i class="fa fa-spinner d-none text-primary loadingspin"></i>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal CM ET GTC-->
<div class="modal fade" id="importCMetGTC" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Importar Datos Gráfico ET GCC</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('importCmetGtcData') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="input-group mb-3">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="file" name="file">
                <label class="custom-file-label" for="inputGroupFile02" required>Agregar archivo Excel/CSV</label>
            </div>
        </div>
        <input type="submit" class="btn btn-primary btn-lg loaddataspin" style="margin-top: 3%">
    </form>
    <div class="text-center">
        <i class="fa fa-spinner d-none text-primary loadingspin"></i>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
