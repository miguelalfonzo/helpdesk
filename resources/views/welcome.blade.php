<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" type="image/x-icon" href="img/help_desk.ico" />
        <title>Help Desk V1.0.0</title>
        <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/all.css') }}" rel="stylesheet">
        <link href="{{ asset('vendors/nprogress/nprogress.css') }}" rel="stylesheet">
        <link href="{{ asset('vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
        <link href="{{ asset('vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
        <link href="{{ asset('vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet"/>
        <link href="{{ asset('vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
        <link href="{{ asset('build/css/custom.css') }}" rel="stylesheet">
        <link href="{{ asset('css/stylos.css') }}" rel="stylesheet">
        <link href="{{ asset('css/component-chosen.css') }}" rel="stylesheet" />
        <link href="{{ asset('vendors/switchery/dist/switchery.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('vendors/datatables.net-bs/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
        <link href="{{ asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('vendors/pnotify/dist/pnotify.css') }}" rel="stylesheet">
        <link href="{{ asset('vendors/pnotify/dist/pnotify.buttons.css') }}" rel="stylesheet">
        <link href="{{ asset('vendors/pnotify/dist/pnotify.nonblock.css') }}" rel="stylesheet">
        <link href="{{ asset('vendors/google-code-prettify/bin/prettify.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('js/css/alertify.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('js/css/themes/default.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('js/css/themes/semantic.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('js/css/themes/bootstrap.min.css') }}"/>
        <link href="{{ asset('vendors/dropzone/dist/min/dropzone.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/star-rating.min.css') }}" rel="stylesheet">
       
    </head>
    <body class="nav-md">
        <input type="text" name="userCayro" id="userCayro" value="{{ Auth::user()->cayro }}" style="display: none;">
        <input type="text" name="userEmpresa" id="userEmpresa" value="{{ Auth::user()->rol }} {{ Auth::user()->BaseDatos }}" style="display: none;">
        <input type="text" name="baseDatosEmpresa" id="baseDatosEmpresa" value="{{ Auth::user()->BaseDatos }}" style="display: none;">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">

                            <a href="{{URL::to('/')}}" class="site_title"><img src="{{ asset('img/logoCayroPeq.png') }}" height="50" width="50"> <span>Help Desk v1.0</span></a>
                        </div>
                        <div class="clearfix"></div>
                        <!-- menu profile quick info -->
                        <div class="profile clearfix">
                            <div class="profile_pic">
                                @if( Auth::user()->photo == '' )

                                    <img src="{{ asset('img/user-icon.png') }}" alt="..." class="img-circle profile_img">                                    
                                @else
                                    <img class="img-circle profile_img" src='{{ asset(Auth::user()->photo) }}' >
                                @endif
                            </div>
                            <div class="profile_info">
                                <span>Bienvenido,</span>
                                <h2>{{ Auth::user()->name }}</h2>
                            </div>
                        </div>
                        <!-- /menu profile quick info -->
                        <br />
                        <!-- sidebar menu -->
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            <div class="menu_section">
                                <h3>General</h3>
                                <ul class="nav side-menu">
                                    
                                    @can('dashboard')
                                    <li>
                                        <a href="{{URL::to('/')}}">
                                            <i style="font-size: 20px;" class="fa fa-home"></i> Inicio </a>
                                    </li>
                                    @endcan

                                    @can('solicitudSoporte')
                                    <li>
                                        <a href="{{URL::to('solicitudSoporte')}}">
                                            <i style="font-size: 20px;" class="fas fa-ticket-alt"></i>
                                            &emsp;Solicitud de Soporte 
                                        </a>
                                    </li>
                                    @endcan

                                    @can('admin-Soporte')
                                        <li >
                                            <a href="{{URL::to('admin-Soporte')}}">
                                                <i style="font-size: 20px;" class="fas fa-user-shield"></i>
                                                &emsp;Administrador de Soporte 
                                            </a>
                                        </li>
                                    @endcan

                                    @can('menu.reportes')
                                        <li>
                                            <a>
                                                <i style="font-size: 20px;" class="fas fa-print"></i>&emsp;Reportes <span class="fa fa-chevron-down"></span>
                                            </a>
                                            <ul class="nav child_menu">
                                                @can('report-ticket-enviados')
                                                <li>
                                                    <a href="{{URL::to('report-ticket-enviados')}}">Reporte Tickets recibidos
                                                    </a>
                                                </li>
                                                @endcan
                                                @can('report-estadisticas')
                                                <li>
                                                    <a href="{{URL::to('report-estadisticas')}}">Estadísticas</a>
                                                </li>
                                                @endcan
                                            </ul>
                                        </li>
                                    @endcan
                                @can('menu.administracion')
                                    <li>
                                        <a><i style="font-size: 20px;" class="fas fa-cogs"></i>&emsp;Administración <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            @can('mantEmpresa')
                                            <li>
                                                <a href="{{URL::to('mantEmpresa')}}">Empresa
                                                </a>
                                            </li>
                                            @endcan
                                            @can('mantUsuarios')
                                            <li>
                                                <a href="{{URL::to('mantUsuarios')}}">Usuarios
                                                </a>
                                            </li>
                                            @endcan
                                            @can('mantTickets')
                                            <li>
                                                <a href="{{URL::to('mantTickets')}}">Mantenimiento Tipo Ticket
                                                </a>
                                            </li>
                                            @endcan
                                            @can('mantCategorias')
                                            <li>
                                                <a href="{{URL::to('mantCategorias')}}">Categoría / SubCategoría
                                                </a>
                                            </li>
                                            @endcan
                                            @can('mantAreas')
                                            <li>
                                                <a href="{{URL::to('mantAreas')}}">
                                                Área / Sub Área
                                                </a>
                                            </li>
                                            @endcan
                                            @can('mantCargos')
                                            <li>
                                                <a href="{{URL::to('mantCargos')}}">
                                                Cargos
                                                </a>
                                            </li>
                                            @endcan
                                            @can('config-correo')
                                            <li>
                                                <a href="{{URL::to('config-correo')}}">Correo
                                                </a>
                                            </li>
                                            @endcan
                                        </ul>
                                    </li>
                                @endcan
                                @if( (Auth::user()->superUser==1))  
                                    <li>
                                        <a><i style="font-size: 20px;" class="fas fa-user-cog"></i>&emsp;Configuración <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li>
                                                <a href="{{URL::to('maestro-empresa')}}">
                                                    <i style="font-size: 20px;" class="far fa-building"></i>
                                                    &emsp;Maestro de Empresas 
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{URL::to('roles')}}">
                                                    <i style="font-size: 20px;" class="fab fa-r-project"></i>
                                                    &emsp;Mantenimiento de Roles 
                                                </a>
                                            </li>
                                        </ul>
                                    </li>  
                                @endif                                          
                        </ul>
                    </div>

                </div>
                <!-- <button id="pruebaCorreo">Prueba Correo</button> -->
                <!-- /sidebar menu -->
                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>
        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                    <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                    <ul class=" navbar-right">
                        <li class="nav-item dropdown open" style="padding-left: 15px;">
                            <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                @if( Auth::user()->photo == '' )


                                    <img src="{{ asset('img/user-icon.png') }}" alt="">
                                @else
                                    <img src="{{ asset(Auth::user()->photo) }}" alt="">
                                @endif
                                
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item"  href="{{URL::to('perfil-usuario')}}"><i class="far fa-user"></i> Perfil</a>
                                @if( Auth::user()->cayro == 1 )
                                    <a class="dropdown-item" id="modoUsuario" href=""><i class="fas fa-exchange-alt"></i> Cambiar Modo Usuario </a>
                                @endif
                                <a class="dropdown-item"  href="javascript:;"><i class="far fa-question-circle"></i> Ayuda</a>
                                <a class="dropdown-item"  href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> Log Out</a>
                            </div>
                        </li>
                        @if(Auth::user()->rol=='adm' or Auth::user()->rol=='age')
                            <li role="presentation" class="nav-item dropdown open">
                                <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="badge bg-green">1</span>
                                </a>
                                <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                                    <li class="nav-item">
                                        <a class="dropdown-item">
                                            <span class="image"><i class="far fa-user-circle"></i></span>
                                            <span>
                                                <span>Usuario Administrador</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                En Desarrollo
                                            </span>
                                        </a>
                                    </li>                       
                                    <li class="nav-item">
                                        <div class="text-center">
                                            <a class="dropdown-item">
                                                <strong>Ver todas las alertas</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        @endif

                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->
        <!-- page content -->
        <div class="right_col" role="main">
            @yield('contenido') 
        </div>
        <!-- /page content -->
        <!-- footer content -->
        <footer>
            <div class="pull-right">
                <a href="">Cayro Soluciones SAC </a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>
<!-- jQuery -->
<script src="{{ asset('vendors/jquery/dist/jquery.js') }}"></script>

<!-- Bootstrap -->
<script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<!-- FastClick -->

<script src="{{ asset('vendors/fastclick/lib/fastclick.js') }}"></script>
<!-- NProgress -->
<script src="{{ asset('vendors/nprogress/nprogress.js') }}"></script>
<!-- Chart.js -->
<script src="{{ asset('vendors/Chart.js/dist/Chart.min.js') }}"></script>
<!-- gauge.js -->
<script src="{{ asset('vendors/gauge.js/dist/gauge.min.js') }}"></script>
<!-- bootstrap-progressbar -->
<script src="{{ asset('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('vendors/iCheck/icheck.min.js') }}"></script>
<!-- Skycons -->
<script src="{{ asset('vendors/skycons/skycons.js') }}"></script>
<!-- Flot -->
<script src="{{ asset('vendors/Flot/jquery.flot.js') }}"></script>
<script src="{{ asset('vendors/Flot/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('vendors/Flot/jquery.flot.time.js') }}"></script>
<script src="{{ asset('vendors/Flot/jquery.flot.stack.js') }}"></script>
<script src="{{ asset('vendors/Flot/jquery.flot.resize.js') }}"></script>
<!-- Flot plugins -->
<!-- <script src="{{ asset('vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
<script src="{{ asset('vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
<script src="{{ asset('vendors/flot.curvedlines/curvedLines.js') }}"></script> -->
<!-- DateJS -->
<script src="{{ asset('vendors/DateJS/build/date.js') }}"></script>
<!-- JQVMap -->
<!-- <script src="{{ asset('vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
<script src="{{ asset('vendors/jqvmap/dist/maps/jquery.vmap.world.j') }}s"></script>
<script src="{{ asset('vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script> -->
<!-- bootstrap-daterangepicker -->
<script src="{{ asset('vendors/moment/min/moment-with-locales.min.js') }}"></script>
<script src="{{ asset('vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- Custom Theme Scripts -->
<!-- Datatables -->
<script src="{{ asset('vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-bs/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
<script src="{{ asset('vendors/jszip/dist/jszip.min.js') }}"></script>
<script src="{{ asset('vendors/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('vendors/pdfmake/build/vfs_fonts.js') }}"></script>
<script src="{{ asset('js/jquery.blockUI.js') }}"></script>
<script src="{{ asset('js/typeahead.bundle.js') }}"></script>
<script src="{{ asset('js/chosen.jquery.min.js') }}"></script>
<script src="{{ asset('vendors/switchery/dist/switchery.min.js') }}"></script>
<script src="{{ asset('js/jquery.validate.js') }}"></script>
<script src="{{ asset('js/alertify.min.js') }}"></script>
<script src="{{ asset('vendors/pnotify/dist/pnotify.js') }}"></script>
<script src="{{ asset('vendors/pnotify/dist/pnotify.buttons.js') }}"></script>
<script src="{{ asset('vendors/pnotify/dist/pnotify.nonblock.js') }}"></script>
<script src="{{ asset('vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js') }}"></script>
<script src="{{ asset('js/jquery.hotkeys.js') }}"></script>
<script src="{{ asset('js/bootstrap-wysiwyg.js') }}"></script>
<script src="{{ asset('vendors/google-code-prettify/src/prettify.js') }}"></script>
<script src="{{ asset('js/smartresize.js') }}"></script>
<script src="{{ asset('build/js/custom.js') }}"></script>
<script src="{{ asset('jsApp/funcGral.js') }}"></script>
<script src="{{ asset('vendors/dropzone/dist/dropzone.js') }}"></script>
<script src="{{ asset('js/readmore.min.js') }}"></script>


@yield('javascript')


</body>
</html>