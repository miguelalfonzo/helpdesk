@extends('welcome')
@section('contenido')
<style type="text/css">
    .ajs-close{
        opacity: 0;
    }
</style>
<div class="title_left">
    <h3 style="color :#3ED8E9">Solicitud de Soporte</h3>
</div>
@if( Auth::user()->cayro == 1 )
    <div class="alert alert-primary" role="alert">
      <h5>Usted esta interactuando como: 
        <strong id="interactuando">
            <i class="far fa-bookmark"></i> 
            @if( Auth::user()->BaseDatosAux == 'cayro' )
                Usuario {{ Auth::user()->BaseDatosAux }} 
            @else
                {{ Auth::user()->rol }} {{ Auth::user()->BaseDatosAux }} 
            @endif
        </strong>
    </h5>
    </div>
@endif    
<div id="PantallaPrincipal">
    <div class="gruposTicket animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <a id="btnTicketsRegistrados" href="" class="botonResumen" titulo="Tickets Registrados" EstadoTickes="1">
            <div class="tile-stats">
                <div class="icon"><i class="far fa-folder-open" style="color:#47A2EF"></i>
                </div>
                <div class="count"><span id="TicketsAbiertos"> 0 </span></div>
                <h3 style="color :#3483C5">Registrados</h3>
                <p>Tickets registrados.</p>
            </div>
        </a>
    </div>
    <div class="gruposTicket animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <a href="" class="botonResumen" titulo="Tickets en Procesos" EstadoTickes="2">
            <div class="tile-stats">
                <div class="icon"><i class="fas fa-users-cog" style="color:#47A2EF"></i>
                </div>
                <div class="count"><span id="TicketsProcesos"> 0 </span></div>
                <h3 style="color :#3483C5">Proceso</h3>
                <p>Tickets en procesos.</p>
            </div>
        </a>
    </div>
    <div class="gruposTicket animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <a href="" class="botonResumen" titulo="Tickets Pausados" EstadoTickes="3">
            <div class="tile-stats">
                <div class="icon"><i class="far fa-pause-circle" style="color:#47A2EF"></i>
                </div>
                <div class="count"><span id="TicketsPausados"> 0 </span></div>
                <h3 style="color :#3483C5">Pausados</h3>
                <p>Tickets pausados.</p>
            </div>
        </a>
    </div>
    <div class="gruposTicket animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <a href="" class="botonResumen" titulo="Tickets Resueltos" EstadoTickes="4">
            <div class="tile-stats">
                <div class="icon"><i class="fas fa-hourglass-half" style="color:#47A2EF"></i>
                </div>
                <div class="count"><span id="TicketsTerminados"> 0 </span></div>
                <h3 style="color :#3483C5">Resueltos</h3>
                <p>Tickets resueltos.</p>
            </div>
        </a>
    </div>
    <div class="gruposTicket animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <a href="" class="botonResumen" titulo="Tickets Cerrados" EstadoTickes="5">
            <div class="tile-stats">
                <div class="icon"><i class="fas fa-ticket-alt" style="color:#47A2EF"></i>
                </div>
                <div class="count"><span id="TicketsTodos"> 0 </span></div>
                <h3 style="color :#3483C5">Cerrados</h3>
                <p>Tickets cerrados.</p>
            </div></a>
        </div>
        <div class="gruposTicket animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <a href="" class="botonResumen" titulo="Tickets Anulados" EstadoTickes="6">
                <div class="tile-stats">
                    <div class="icon"><i class="far fa-trash-alt" style="color:#47A2EF"></i>
                    </div>
                    <div class="count"><span id="TicketsAnulados"> 0 </span></div>
                    <h3 style="color :#3483C5">Anulados</h3>
                    <p>Tickets anulados.</p>
                </div>
            </a>
        </div>
    </div>
    <div id="listadoTickets" style="display: none;">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2 id="titleListadoTickets"> </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                                <a type="button" class="btn btn-success" id="btnRegresar"><i class="far fa-arrow-alt-circle-left"></i> Regresar</a>
                            </li>
                            <li>
                                <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                                class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a></li>
                                    <li><a href="#">Settings 2</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="close-link"><i class="fa fa-close"></i>
                                </a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="TableTickets" class="table table-striped table-bordered table-hover table-condensed" style="font-size:12px;" width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th style="text-align: center;"><i class="ace-icon fa fa-paperclip"></i></th>
                                    <th>Solicitante</th>
                                    <th>Ejecutor</th>
                                    <th>Asunto</th>
                                    <th>Categoría</th>
                                    <th>Estado</th>
                                    <th>Ultima Actualización</th>
                                    <th>Prio.</th>
                                    <th>Ver</th>
                                </tr>
                            </thead>
                        <tbody id="listaListadoTicketDetalleOK"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div  id="formDropZone" class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="display: none;" ></div>
@include('solicitudSoporte.modal-detalle-ticket')
@include('solicitudSoporte.modal-anular-ticket')
@include('solicitudSoporte.modal-archivos-adjuntos')
@include('solicitudSoporte.modal-detalle-imagen')
@include('solicitudSoporte.modal-encuesta-ticket')
@include('adminSoporte.modal-chat')
@endsection
@section('javascript')
<script src="{{ asset('jsApp/solicitudSoporte.js')}}"></script>
<link href="{{ asset('css/sweetalert2.css') }}" rel="stylesheet">
<script src="{{ asset('js/sweetalert2.all.min.js')}}"></script>
<script src="{{ asset('js/jquery.elevatezoom.js')}}"></script>
<script src="{{ asset('js/star-rating.js') }}"></script>
@stop