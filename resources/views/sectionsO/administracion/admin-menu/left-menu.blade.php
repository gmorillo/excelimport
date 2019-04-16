<div class="user-profile-box">
    <div class="header clearfix">
        <h2>Bienvenido, </h2>
        <h4 class="ng-binding">{{ Auth::user()->name}}</h4>
        <img src="https://media.licdn.com/dms/image/C4D0BAQHU9FejlTMSLg/company-logo_200_200/0?e=2159024400&v=beta&t=TJLFDSbOyB-zqKyOwJE-_ogUouIr1Epca5spAkKrgcI" alt="avatar" class="img-fluid profile-img">
    </div>
    <div class="detail clearfix">
        <div class="list-group py-2" id="list-tab" role="tablist">
            {{--<a href="{{ route('identifiers') }}" class="list-group-item list-group-item-action">
            	<i class="fas fa-circle-notch"></i> Identificadores
            </a>
            <a href="{{ route('getCompanies') }}" class="list-group-item list-group-item-action">
            	<i class="fas fa-industry"></i> Empresas
            </a>
            <a href="{{ route('getTechnicians') }}" class="list-group-item list-group-item-action">
            	<i class="fas fa-users"></i> Técnicos
            </a>
            <a href="{{ route('getSolicitudes') }}" class="list-group-item list-group-item-action">
            	<i class="fas fa-angle-double-right"></i> Tipo de Solicitud
            </a>
            <a href="{{ route('getIncidentTypes') }}" class="list-group-item list-group-item-action">
                <i class="fas fa-exclamation-circle"></i> Tipo de incidencias
            </a>
            <a href="{{ route('getMegaWorksTypes') }}" class="list-group-item list-group-item-action">
                <i class="fas fa-indent"></i> Tipo de trabajo
            </a>
            <a href="{{ route('getMegaworksList') }}" class="list-group-item list-group-item-action">
                <i class="fas fa-dot-circle"></i> Listado de trabajos  <br><small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Códigos ING)</small> 
            </a>
            <a href="{{ route('getClients') }}" class="list-group-item list-group-item-action">
                <i class="fas fa-angle-double-right"></i> Clientes
            </a>
            <a href="{{ route('getUtds') }}" class="list-group-item list-group-item-action">
                <i class="fas fa-angle-double-right"></i> UTD
            </a>
            <a href="{{ route('getOrdersStatus') }}" class="list-group-item list-group-item-action">
                <i class="fas fa-clock"></i> Estado de pedido
            </a>
            <a href="{{ route('getMegaWorksStatuses') }}" class="list-group-item list-group-item-action">
                <i class="fas fa-clock"></i> Estado de trabajos Nipsa
            </a>
            <a href="{{ route('getWorks') }}" class="list-group-item list-group-item-action">
                <i class="fas fa-network-wired"></i> Obras
            </a>--}}
        </div>

    </div>
</div>
@section('stylesheet')
    <style>
        .user-profile-box {
            background: #fff;
            box-shadow: 0 0 20px rgba(38,38,38,.2);
            margin: 0 auto 50px;
        }
        .user-profile-box .header {
            padding: 30px 20px 120px;
            text-align: center;
            position: relative;
            background-repeat: no-repeat;
            border: none;
            margin: 0;
            background:linear-gradient( to bottom, rgba(239, 6, 6, 0), rgba(0, 0, 0, 0.67) ), url('http://metal.graphics/wp-content/uploads/2016/07/light-blue-texture.jpg') top left repeat;
            background-size: cover;
            color: #fff;
        }
        .user-profile-box .header h2 {
            margin: 0 0 8px;
            color: #fff;
            font-size: 24px;
        }
        .user-profile-box .header h4 {
            font-size: 16px;
            color: #fff;
            font-weight: 400;
        }
        .user-profile-box .profile-img {
            border-radius: 4%;
            background-clip: padding-box;
            border: 5px solid #fff;
            bottom: -75px;
            float: left;
            height: 160px;
            width: 160px;
            left: 50%;
            margin-left: -75px;
            position: absolute;
            box-shadow: 0 0 0 0 rgba(0,0,0,.1), 0 3px 3px 0 rgba(0,0,0,.1);
            object-fit: cover;
        }
        .user-profile-box .detail {
            padding-top: 100px;
        }
        ul, ol {
            list-style: outside none none;
            margin: 0;
            padding: 0;
        }
        ul li, ol li {
            list-style: none;
        }
        .user-profile-box .detail ul li .active, .user-profile-box .detail ul li a:hover {
            color: #3490DD;
        }
        .user-profile-box .detail ul li .active {
            background: #fafafa;
            color: #3490DD;
            font-weight: 500;
        }
        .user-profile-box .detail ul li a:hover {
            background: #fafafa;
            color: #3490DD;
        }
        .user-profile-box .detail ul li a {
            color: #727272;
            border-bottom: 1px solid #f5f5f5;
            padding: 12px 20px;
            display: block;
            font-size: 14px;
            font-weight: 500;
        }
        .user-profile-box .detail ul li a i {
            margin-right: 10px;
        }
        .lni-files:before {
            content: "\e972";
        }
        a:hover {
            text-decoration: none;
            cursor: pointer;
        }
        .list-group-item.active {
            z-index: 2;
            color: #3490dc;
            background-color: #fafafa;
            border-color: transparent;
            box-shadow: 0 0 15px transparent;
        }

        .list-group-item {
            position: relative;
            display: block;
            padding: 0.75rem 1.25rem;
            margin-bottom: 0px;
            background-color: #fff;
            border-bottom: 0.5px solid rgba(0, 0, 0, 0.125) !important;
            border: none;
        }

        #page-wrap { 
          width: auto; 
          margin: 15px auto; 
          position: relative; 
        }

        #sidebar { 
          width: auto; 
          position: fixed; 
          margin-left: 410px; 
        }
    </style>
@endsection