@extends('welcome')
@section('contenido')
<style>
    
    #divTableUsuarios table {
  border-collapse: collapse;
}

#divTableUsuarios table,th,td {
  border: 1px solid #AEF1F9;
}
</style>
<div class="title_left">
    <h3><i class="fas fa-users"></i> Mantenimiento de Usuarios</h3>
</div>
<div class="form-group row">
    <div class="col-lg-12 col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><i class="fa fa-align-left"></i> {{$empresa->NombreEmpresa }}&emsp;<span class="text-info">Ruc</span>&emsp;{{ $empresa->ruc }} <small></small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#"></a>
                        <a class="dropdown-item" href="#"></a>
                    </div>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">        
        <h4 class="col-form-label col-lg-3 col-md-3 col-sm-3 ">Usuarios Permitidos:&emsp;<strong class="text-primary">{{$empresa->usuariosPermitidos}}</strong></h4>

        <div class="progress col-lg-4 col-md-3 col-sm-3">
            <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: {{$empresa->porcUso}}%" aria-valuenow="{{$empresa->totalUsuario}}" aria-valuemin="0" aria-valuemax="{{$empresa->usuariosPermitidos}}">{{$empresa->porcUso}}%</div>
        </div>
        <div class="col-lg-5 col-md-3 col-sm-3">
            <button id="btnAgregarUsuario"  style="float: right;background:#3ED8E9;color:#fff" type="button" class="btn btn-round "><i class="fas fa-user-plus"></i> Agregar nuevo Usuario</button>
        </div>     
    </div>
</div>
</div>

</div>
<br>
<div id="divTableUsuarios" class="x_content">
<table id="datatable-usuarios" class="table table-striped" style="width:100%">
<thead>
    <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Correo</th>
        <th>Área</th>
        <th>Rol</th>
        <th>Status</th>
        <th>Cayro</th>
        <th>Opciones</th>
    </tr>
</thead>
<tbody id="body-usuarios">
    
</tbody>
</table>
</div>

@include('mantenimiento.modal-usuarios')
@endsection

@section('javascript')
<script src="{{ asset('jsApp/usuarios.js')}}"></script>
@stop