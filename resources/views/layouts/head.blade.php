<!-- BEGIN: Body-->
@extends('layouts.header-link')

@section('menu')


<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
        <div class="navbar-container d-flex content">
            
            <ul class="nav navbar-nav align-items-center ms-auto">
                
                <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none"><span class="user-name fw-bolder">{{Auth::user()->email}}</span>
                       @if (Auth::user()->tipo==1)
                       <span class="user-status">Administrador</span>
                       @elseif (Auth::user()->tipo==2)
                       <span class="user-status">Operario</span>
                       @elseif (Auth::user()->tipo==3)
                       <span class="user-status">Gestión</span>
                       @elseif (Auth::user()->tipo==4)
                       <span class="user-status">Contabilidad</span>
                       @endif
                    </div>
                        {{-- <span class="avatar">
                            <img class="round" 
                            src="{{asset('app-assets/images/portrait/small/avatar-s-11.jpg')}}" 
                            alt="avatar" height="40" width="40"><span class="avatar-status-online"></span>
                        </span> --}}
                        @if (Auth::user()->tipo==1)
                        <div class="avatar bg-light-success avatar-lg">
                            <span class="avatar-content">AD</span>
                        </div>
                        @elseif (Auth::user()->tipo==2)
                        <div class="avatar bg-light-warning avatar-lg">
                            <span class="avatar-content">OP</span>
                        </div>
                        @elseif (Auth::user()->tipo==3)
                        <div class="avatar bg-light-info avatar-lg">
                            <span class="avatar-content">GS</span>
                        </div>
                        @elseif (Auth::user()->tipo==4)
                        <div class="avatar bg-light-primary avatar-lg">
                            <span class="avatar-content">CT</span>
                        </div>
                        @endif
                       
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                                <a class="dropdown-item" href="{{route('logout')}}">
                                    <i class="me-50" data-feather="power"></i> Salir</a>
                </div>
            </li>
            </ul>
        </div>
    </nav>
    <ul class="main-search-list-defaultlist-other-list d-none">
        <li class="auto-suggestion justify-content-between"><a class="d-flex align-items-center justify-content-between w-100 py-50">
                <div class="d-flex justify-content-start"><span class="me-75" data-feather="alert-circle"></span><span>No results found.</span></div>
            </a></li>
    </ul>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header expanded">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item me-auto">
                    <a class="navbar-brand" href="{{route('admin.solicitudes.index')}}"><span class="brand-logo">
                            
                        <h6 class="text-danger">Transporte 
                            <br> GONZALES</h6>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x d-block d-xl-none text-primary toggle-icon font-medium-4"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-disc d-none d-xl-block collapse-toggle-icon primary font-medium-4"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="3"></circle></svg></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                
                @if (Auth::user()->tipo==1)
                <!--<li class=" nav-item"><a class="d-flex align-items-center" href="index.html"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Estadisticas</span><span class="badge badge-light-warning rounded-pill ms-auto me-1">2</span></a>-->
                <!--    <ul class="menu-content">-->
                <!--        <li><a class="d-flex align-items-center" href="{{route('admin.estadisticas')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Analytics">Analytics</span></a>-->
                <!--        </li>-->
                <!--        {{-- <li><a class="d-flex align-items-center" href="{{route('admin.usuarios.index')}}">-->
                <!--            <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Analytics">Usuarios</span></a>-->
                <!--        </li> --}}-->
                <!--        {{-- <li><a class="d-flex align-items-center" href="dashboard-ecommerce.html"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="eCommerce">eCommerce</span></a> --}}-->
                <!--        </li>-->
                <!--    </ul>-->
                <!--</li>-->
                
                {{-- RECURSOS --}}
                <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Modulos</span><i data-feather="more-horizontal"></i>
                </li>
                <li class=" nav-item"><a class="d-flex align-items-center" href="#">
                    <i data-feather="home"></i>
                    <span class="menu-title text-truncate" data-i18n="Dashboards">RECURSOS</span>
                    <span class="badge badge-light-success rounded-pill ms-auto me-1">3</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="{{route('admin.vehiculos.index')}}">
                            <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Analytics">VEHICULOS</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="{{route('admin.usuarios.index')}}">
                            <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Analytics">USUARIOS</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="{{route('admin.choferes.index')}}">
                            <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Analytics">PERSONAL </br> DE TRABAJO</span></a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item"><a class="d-flex align-items-center" href="#">
                    <i data-feather="home"></i>
                    <span class="menu-title text-truncate" data-i18n="Dashboards">CLIENTES</span>
                      <span class="badge badge-light-success rounded-pill ms-auto me-1">4</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="{{route('admin.clientes.index')}}">
                            <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Analytics">CLIENTES</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="{{route('admin.destinos.index')}}">
                            <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Analytics">DESTINATARIOS </br> ( CAMALES)</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="{{route('admin.rutas.index')}}">
                            <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Analytics">RUTAS</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="{{route('admin.tarifas.index')}}">
                            <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Analytics">TARIFA</span></a>
                        </li>
                        
                        
                    </ul>
                </li>
                <li class=" nav-item"><a class="d-flex align-items-center" href="#">
                    <i data-feather="home"></i>
                    <span class="menu-title text-truncate" data-i18n="Dashboards">OPERACIONES</span>
                      <span class="badge badge-light-success rounded-pill ms-auto me-1">2</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="{{route('admin.solicitudes.index')}}">
                            <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Analytics">SOLICITUDES</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="{{route('admin.costos.index')}}">
                            <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Analytics">COSTOS</span></a>
                        </li>
                    </ul>
                </li>  
                @elseif (Auth::user()->tipo==2)
                <li class=" nav-item"><a class="d-flex align-items-center" href="#">
                    <i data-feather="home"></i>
                    <span class="menu-title text-truncate" data-i18n="Dashboards">OPERACIONES</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="{{route('admin.solicitudes.index')}}">
                            <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Analytics">SOLICITUDES</span></a>
                        </li>
                        {{-- <li><a class="d-flex align-items-center" href="{{route('admin.costos.index')}}">
                            <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Analytics">COSTOS</span></a>
                        </li> --}}
                    </ul>
                </li>   
                @elseif (Auth::user()->tipo==3)
                <li class=" nav-item"><a class="d-flex align-items-center" href="#">
                    <i data-feather="home"></i>
                    <span class="menu-title text-truncate" data-i18n="Dashboards">GESTION DOCUMENTARIA</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="{{route('admin.solicitudes.index')}}">
                            <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Analytics">SOLICITUDES</span></a>
                        </li>
                        {{-- <li><a class="d-flex align-items-center" href="{{route('admin.costos.index')}}">
                            <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Analytics">COSTOS</span></a>
                        </li> --}}
                    </ul>
                </li>  
                @elseif (Auth::user()->tipo==4)
                <li class=" nav-item"><a class="d-flex align-items-center" href="#">
                    <i data-feather="home"></i>
                    <span class="menu-title text-truncate" data-i18n="Dashboards">MODULO DE FACTURACIÓN</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="{{route('admin.solicitudes.index')}}">
                            <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Analytics">SOLICITUDES</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="{{route('admin.costos.index')}}">
                            <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Analytics">COSTOS</span></a>
                        </li>
                    </ul>
                </li>  
                @endif


                {{-- <li class=" nav-item"><a class="d-flex align-items-center" href="#">
                    <i data-feather="home"></i>
                    <span class="menu-title text-truncate" data-i18n="Dashboards">REPORTE  OPERACIÓN</span>
                    <span class="badge badge-light-success rounded-pill ms-auto me-1">2</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="{{route('admin.solicitudes.index')}}">
                            <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Analytics">ORDEN DE SERVICIO</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="">
                            <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Analytics">GASTOS OPERATIVOS  ( CAJA) </span></a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item"><a class="d-flex align-items-center" href="#">
                    <i data-feather="home"></i>
                    <span class="menu-title text-truncate" data-i18n="Dashboards">REPORTES  GRÁFICOS</span>
                    <span class="badge badge-light-success rounded-pill ms-auto me-1">2</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="{{route('admin.solicitudes.index')}}">
                            <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Analytics">
                                GRÁFICA DE COSTOS DE COMBUSTIBLE</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="">
                            <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Analytics">
                                GRAFICA DE COSTOS PEAJE </span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="">
                            <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Analytics">
                                GRAFICA DE COSTOS BALANZA </span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="">
                            <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Analytics">
                                GRAFICO DE COSTO DE VIATICOS </span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="">
                            <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Analytics">
                                GRAFICO DE COSTO DE VIATICOS </span></a>
                        </li>
                    </ul>
                </li> --}}
                
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
           @yield('content')
        </div>
    </div>
    <!-- END: Content-->

    @endsection