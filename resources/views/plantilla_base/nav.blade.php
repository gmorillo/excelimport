<div class="container-fluid navbar-light bg-light">
    <div class="">
        <nav class="navbar navbar-expand-lg ">
          <a class="navbar-brand" href="/">Ingeniería Estudios y Proyectos Nip S.A</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
          @auth
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Proyectos-Legalizaciones
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="{{route('viewAllData')}}">Seguimiento unificado Proyectos-Legalizaciones</a></li>
                  <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Seguimiento Proyectos</a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{route('viewDataProjects')}}"><i class="fas fa-table"></i> Datos Proyectos</a></li>
                      <li><a class="dropdown-item" href="{{route('viewGraphicProjects')}}"><i class="far fa-chart-bar"></i> CM Proyectos</a></li>
                      {{--<li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Subsubmenu</a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">Subsubmenu action</a></li>
                          <li><a class="dropdown-item" href="#">Another subsubmenu action</a></li>
                        </ul>
                      </li>
                      <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Second subsubmenu</a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">Subsubmenu action</a></li>
                          <li><a class="dropdown-item" href="#">Another subsubmenu action</a></li>
                        </ul>
                      </li>--}}
                    </ul>
                  </li>
                  <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Seguimiento Tramitación Legalizaciones</a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{route('viewDataLegalization')}}"><i class="fas fa-table"></i> Datos Expedientes Legalización Proyectos</a></li>
                      <li><a class="dropdown-item" href="{{route('viewGraphicLegalizations')}}"><i class="far fa-chart-bar"></i> CM Estado Legalización Proyectos</a></li>
                    </ul>
                  </li>
                  @auth
                    <li class="nav-item px-1 @if(Auth::id() == 1) d-block @else d-none @endif">
                      <a class="btn btn-outline-primary w-100 my-2" href="#" data-toggle="modal" data-target="#importCSV"><i class="fas fa-file-upload"></i> Importar Datos</a>
                    </li>
                  @endauth
                </ul>
              </li>
              <li class="nav-item dropdown @if(Auth::id() == 1) d-block @else d-none @endif">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Estudios Técnicos
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Global</a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{route('getallGlobalData')}}"><i class="fas fa-table"></i> Datos E.T. Global</a></li>
                      <li><a class="dropdown-item" href="{{route('CMCalidadET')}}"><i class="far fa-chart-bar"></i> Calidad E.T.</a></li>
                      <li><a class="dropdown-item" href="{{route('CMGlobalET')}}"><i class="far fa-chart-bar"></i> CM E.T. Global</a></li>
                    </ul>
                  </li>
                  <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">GCC</a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{route('getDataGCC')}}"><i class="fas fa-table"></i> Datos E.T. GCC</a></li>
                      <li><a class="dropdown-item" href="{{route('CMGCC')}}"><i class="far fa-chart-bar"></i> CM E.T. GCC</a></li>
                    </ul>
                  </li>
                  <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">GTC</a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{route('getDataGTC')}}"><i class="fas fa-table"></i> Datos E.T. GTC</a></li>
                      <li><a class="dropdown-item" href="{{route('CMGTC')}}"><i class="far fa-chart-bar"></i> CM E.T. GTC</a></li>
                    </ul>
                  </li>
                  <li class="px-1">
                    <a class="btn btn-outline-primary w-100 my-2" href="#" data-toggle="modal" data-target="#importETGLOBAL" >
                      <i class="fas fa-file-upload"></i> Importar E.T.
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item dropdown @if(Auth::id() == 1) d-block @else d-none @endif">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Réplicas
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Global</a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{route('getReplicasGlobal')}}"><i class="fas fa-table"></i> Datos Réplicas Global</a></li>
                      <li><a class="dropdown-item" href="{{route('getCMGlobalReplicas')}}"><i class="far fa-chart-bar"></i> CM Réplicas Global</a></li>
                     <li><a class="dropdown-item" href="{{route('CMGlobalReplicasDetallado')}}"><i class="far fa-chart-bar"></i> CM Detallado Réplicas Global</a></li>
                    </ul>
                  </li>
                  {{--<li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">EETT</a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{route('viewDataLegalization')}}"><i class="fas fa-table"></i> Datos Réplicas EETT</a></li>
                      <li><a class="dropdown-item" href="{{route('viewDataLegalization')}}"><i class="far fa-chart-bar"></i> CM Réplicas EETT</a></li>
                    </ul>
                  </li>
                  <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">EXTRACAPEX</a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{route('viewDataLegalization')}}"><i class="fas fa-table"></i> Datos Réplicas EXTRACAPEX</a></li>
                      <li><a class="dropdown-item" href="{{route('viewDataLegalization')}}"><i class="far fa-chart-bar"></i> CM Réplicas EXTRACAPEX</a></li>
                    </ul>
                  </li>
                  <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Otros</a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{route('viewDataLegalization')}}"><i class="fas fa-table"></i> Datos Réplicas Otros</a></li>
                      <li><a class="dropdown-item" href="{{route('viewDataLegalization')}}"><i class="far fa-chart-bar"></i> CM Réplicas Otros</a></li>
                    </ul>
                  </li>--}}
                  @auth
                    <li class="nav-item px-1 @if(Auth::id() == 1) d-block @else d-none @endif">
                      <a class="btn btn-outline-primary w-100 my-2" href="#" data-toggle="modal" data-target="#importReplicasGlobalesModal"><i class="fas fa-file-upload"></i> Importar Replicas Globales</a>
                    </li>
                  @endauth
                </ul>
              </li>
            </ul>
            @endauth
            <ul class="navbar-nav ml-auto">
              <!-- Authentication Links -->
              @guest
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
                  {{--@if (Route::has('register'))
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                      </li>
                  @endif--}}
              @else
                  <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name }} <span class="caret"></span>
                      </a>

                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          <a  class="dropdown-item" 
                            href="{{ route('logout') }}" 
                            onclick="event.preventDefault(); 
                            document.getElementById('logout-form').submit();
                          ">
                              {{ __('Logout') }}
                          </a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                      </div>
                      
                  </li>

              @endguest
            </ul>
          </div>

        </nav>
    </div>
</div>


<script>
        $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
          if (!$(this).next().hasClass('show')) {
            $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
          }
          var $subMenu = $(this).next(".dropdown-menu");
          $subMenu.toggleClass('show');


          $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
            $('.dropdown-submenu .show').removeClass("show");
          });


          return false;
        });
    </script>