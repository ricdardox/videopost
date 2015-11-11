@extends('app')


@section('titulo')
<span class="glyphicon glyphicon-plus"></span> Agregar usuario
@endsection
@section('ruta')
<ol class="breadcrumb">
    <li><a href="{!!URL::to('/usuarios')!!}" >Usuario</a></li>
    <li class="active">Crear usuario</li>
</ol>
@endsection
@section('content')
<div>

    @include('common.errors')

    {!! Form::open(['route' => 'usuarios.store']) !!}

    @include('usuarios.fields')

    {!! Form::close() !!}
</div>
@endsection
