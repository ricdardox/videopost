@extends('app')

@section('titulo')
<span class="glyphicon glyphicon-th-list"></span>  Usuarios  <span class="label label-default">{!! $usuarios->total() !!}</span> 
@endsection

@section('content')

<div>

    @include('flash::message')
    {!! Form::model(Request::all(),['route'=>'usuarios.index','method'=>"GET"])!!}
    {!!Form::token()!!}
    <div class="form-group col-xs-11 form-inline">
        {!!Form::text('username',null,['class'=>'form-control input-sm','placeholder'=>'Buscar por usuario'])!!}
        {!!Form::text('email',null,['class'=>'form-control input-sm','placeholder'=>'Buscar por email'])!!}
        <button class="btn btn-default btn-sm">
            <span class="glyphicon glyphicon-search"></span>
            Buscar
        </button>
    </div>
    {!! Form::close() !!}


    <a class="btn btn-info btn-sm pull-right" href="{!! route('usuarios.create') !!}">Agregar</a>
    <br> 


    @if($usuarios->isEmpty())
    <br>
    <div class="well text-center">No se ha encontrado información para mostrar..</div>
    @else
    <table class="table">
        <thead>
        <th>Nombre</th>
        <th>Usuario</th>
        <th>Email</th>
        <th>Estado</th>
        <th width="50px">Acciones</th>
        </thead>
        <tbody>

            @foreach($usuarios as $usuario)
            <tr>
                <td>{!! $usuario->name !!}</td>
                <td>{!! $usuario->username !!}</td>
                <td>{!! $usuario->email !!}</td>
                <td>
                    @if($usuario->active)
                    <span class="label label-success">Activo</span> 
                    @elseif(!$usuario->active)
                    <span class="label label-danger">Inactivo</span> 
                    @else
                    <span class="label label-warning">Indefinido</span> 
                    @endif
                </td>
                <td>
                    <a href="{!! route('usuarios.edit', [$usuario->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                    <a href="{!! route('usuarios.show', [$usuario->id]) !!}"><i class="glyphicon glyphicon-modal-window"></i></a>
                    <a href="{!! route('usuarios.delete', [$usuario->id]) !!}" onclick="return confirm('¿ Esta seguro que quiere desactivar el usuario?')"><i class="glyphicon glyphicon-remove"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!!$usuarios->render()!!}

    @endif
</div>

@endsection