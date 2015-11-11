@extends('app')
@section('titulo')
<span class="glyphicon glyphicon-user"></span>  Información del usuario    
@endsection

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



@endsection
@section('script')
<script src="{!! URL::to('/bower_components/jquery-validation/dist/jquery.validate.min.js') !!}"></script>
<script src="{!! URL::to('/bower_components/jquery-validation/dist/additional-methods.min.js') !!}"></script>
<script src="{!!URL::to('/js/base.js') !!}"></script>
<script src="{!! URL::to('/js/roles/consultaRoles.js') !!}"/></script>
<script src="{!! URL::to('/js/usuarios/usuarios.js') !!}"/></script>
@endsection
