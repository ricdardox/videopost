@extends('app')

@section('content')
<br>
<br>
<br>
<div class="login-form padding20 block-shadow" style="opacity: 1; transform: scale(1); transition: 0.5s;">
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        Por favor corrige los siguientes errores:<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form class="" role="form" method="POST" action="{{ route('login')}}">
        <h3 class="panel-title">Entrar a {!! config('info.nombreApp') !!}</h3>
        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
        <div class="input-control text"   data-role="input">
            <span class="mif-user prepend-icon"></span>
            <input type="text" placeholder="Usuario" name="username">
        </div>
        <div class="input-control text">
            <span class="mif-lock prepend-icon"></span>
            <input type="password" placeholder="Contraseña" name="password" type="password" value="" required="">
        </div>
        <br>
        <label class="input-control checkbox small-check">
            <input type="checkbox">
            <span class="check"></span>
            <span class="caption">Remember me</span>
        </label>
        <div class="form-actions">
            <button class="button">Login</button>
            <a href="{{ route('register')}}">Registrarme</a>
        </div>
        <br>
        <a href="{{route('forgotpassword')}}">¿Olvidaste tu contraseña?</a>

    </form>

</div>
@endsection