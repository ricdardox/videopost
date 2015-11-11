@extends('app')

@section('titulo')
<span class="glyphicon glyphicon-edit"></span> Editar usuario
@endsection
@section('ruta')
<ol class="breadcrumb">
    <li><a href="{!!URL::to('/usuarios')!!}" >Usuarios</a></li>
    <li class="active">Editar usuario</li>
</ol>
@endsection
@section('content')
<div>
    @include('common.errors')

    {!! Form::model($usuarios, ['route' => ['usuarios.update', $usuarios->id], 'method' => 'patch']) !!}

    @include('usuarios.fields')

    {!! Form::close() !!}
</div>
@endsection
