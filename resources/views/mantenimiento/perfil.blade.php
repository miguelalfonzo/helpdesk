@extends('welcome')
@section('contenido')
<div class="title_left">
    <h3><i class="far fa-user-circle"></i> Perfil del Usuario.</h3>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_content">
                <div class="">
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                                
                                <div class="x_content">
                                    <div class="col-md-3 col-sm-3  profile_left">
                                        <div class="profile_img">
                                            <div id="crop-avatar" style="text-align: center;">
                                                {{-- <img class="img-responsive avatar-view" src="images/picture.jpg" alt="Avatar" title="Change the avatar"> --}}
                                                    <div  id="formDropZone"></div>
                                            </div>
                                        </div>
                                        <h5>{{$usuario->name }} {{$usuario->lastName }}</h5>
                                        <ul class="list-unstyled user_data">
                                            <li>
                                                <i class="fa fa-briefcase user-profile-icon"></i> {{$usuario->nomCargo }}
                                            </li>
                                            <li class="m-top-xs">
                                                <i class="fas fa-medal"></i>
                                                {{$usuario->nomArea }}
                                            </li>
                                        </ul>
                                        
                                    </div>
                                    <div class="col-md-9 col-sm-9 ">
                                        <div class="profile_title">
                                            <div class="col-md-6">
                                                <h2>Solicitudes de Soporte</h2>
                                            </div>
                                            <div class="col-md-6">
                                            </div>
                                        </div>
                                        <div id="graph_tickec" style="width:100%; height:280px;"></div>
                                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Solicitudes enviadas</a>
                                            </li>
                                            @if(Auth::user()->rol=='adm' or Auth::user()->rol=='age')
                                                <li role="presentation" class="">
                                                    <a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">
                                                    Solicitudes atendidas
                                                    </a>
                                                </li>
                                            @endif
                                    </ul>
                                    <div id="myTabContent" class="tab-content">
                                        <div role="tabpanel" class="tab-pane active " id="tab_content1" aria-labelledby="home-tab">
                                            <table id="TableTickets" class="table table-striped table-bordered table-hover table-condensed" style="font-size:12px;" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Ejecutor</th>
                                                        <th>Asunto</th>
                                                        <th>Categoría</th>
                                                        <th>Prio.</th>
                                                    </tr>
                                                </thead>
                                            <tbody id="listaListadoTicketDetalleOK"></tbody>
                                        </table>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br />
</div>
</div>
</div>
</div>
<br>
@endsection
@section('javascript')
<script src="{{ asset('vendors/raphael/raphael.min.js')}}"></script>
<script src="{{ asset('vendors/morris.js/morris.min.js')}}"></script>
<script src="{{ asset('jsApp/perfil.js')}}"></script>
@stop