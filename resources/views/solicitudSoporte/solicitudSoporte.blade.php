@extends('welcome')
@section('contenido')
<div class="clearfix"></div>

@include('solicitudSoporte.botones')

<style>
    
    #PantallaPrincipal table {
  border-collapse: collapse;
}

#PantallaPrincipal table,th,td {
  border: 1px solid #AEF1F9;
}
</style>

<div class="row" id="PantallaPrincipal" >

    <div class="col-md-12 col-sm-12  " >
        <div class="x_panel" style="background: #C8E9F8;">
            <div class="x_title" >
                <h2 style="color:#167dab"> Solicitud de Soporte Técnico</h2>
                <ul class="nav navbar-right panel_toolbox">
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
                    <div id="app"></div>
                @include('solicitudSoporte.wizards')
            </div>
        </div>
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
                            <a type="button" class="btn" id="btnRegresar" style="background:#3ED8E9;color:#fff"><i class="far fa-arrow-alt-circle-left"></i> Regresar</a>
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
                    <table id="TableTickets" class="table table-striped table-hover table-condensed" style="font-size:12px;" width="100%">
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

