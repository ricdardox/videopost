@extends('app')
@section('titulo')
<span class="glyphicon glyphicon-user"></span>  Información del usuario    
@endsection
@section('ruta')
<ol class="breadcrumb">
    <li><a href="{!!URL::to('/usuarios')!!}" >Usuarios</a></li>
    <li class="active">Mostrar usuario</li>
</ol>
@endsection
@section('content')
{!! Form::hidden('usuario', $usuarios->id, ['class' => 'form-control']) !!}

<!-- Diaplay Name,string Field -->
<div class="form-group">
    {!! Form::label('name', 'Nombre:') !!}
    <p>{!! $usuarios->name !!}</p>
</div>

<!-- Diaplay Name,string Field -->
<div class="form-group">
    {!! Form::label('username', 'Usuario:') !!}
    <p>{!! $usuarios->username !!}</p>
</div>

<!-- Diaplay Name,string Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $usuarios->email !!}</p>
</div>

<!-- Diaplay Name,string Field -->
<div class="form-group">
    {!! Form::label('roles', 'Roles:') !!}
    @foreach($usuarios->roles as $key=>$value)
    <span class="dropdown">
        <a title="{!!$value->description!!}" class="dropdown-toggle label label-primary" title="{!!$value->description!!}" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            {!!$value->display_name!!}
            <span class="caret"></span>
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li>
                <a href="{!! route('rols.show',$value->id)!!}"> 
                    <span class="glyphicon glyphicon-eye-open"></span>
                    <span  class="text-info">
                        Ver
                    </span>
                </a>
            </li> 
            <li>
                <a href="#" class="text-danger">
                    <span class="glyphicon glyphicon-trash"></span>
                    <span  class="text-danger eliminarRol" data-id='{!! $value->id !!}'>
                        Eliminar
                    </span>
                </a>
            </li> 
        </ul>
    </span>
    <span>&NonBreakingSpace;</span>
    @endforeach
    <a type="button" title="Agregar roles" class="btn btn-info btn-xs" data-token="{!! csrf_token() !!}" data-module="consultaRoles" data-toggle="modal" data-target="#consultaRoles">
        <span class="glyphicon glyphicon-plus-sign"></span>
    </a>
</div>

<div class="modal fade" id="consultaRoles">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Agregar roles al usuario</h4>
            </div>
            <div class="modal-body">
                <br>
                @include('rols/consulta')
                <span class="clearfix"></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary guardarRoles">Guardar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection
@section('script')
<script src="{!! URL::to('/bower_components/jquery-validation/dist/jquery.validate.min.js') !!}"></script>
<script src="{!! URL::to('/bower_components/jquery-validation/dist/additional-methods.min.js') !!}"></script>
<script src="{!!URL::to('/js/base.js') !!}"></script>
<script src="{!! URL::to('/js/roles/consultaRoles.js') !!}"/></script>
<script src="{!! URL::to('/js/usuarios/usuarios.js') !!}"/></script>
@endsection
