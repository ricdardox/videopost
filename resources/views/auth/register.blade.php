@extends('app')

@section('content')
<br>
<br>
<br>
<div class="login-form padding20 block-shadow" style="width: 600px;">
    <form class="form-horizontal form" role="form" method="POST" action="{{route('register')}}" >

        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Algunos campos contienen errores.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <h1 class="text-light">Registro de usuario</h1>
        <hr class="thin">
        <br>
        <div class="input-control text full-size" data-role="input">
            <label for="user_login">Nombre:</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
            <button class="button helper-button clear" tabindex="-1" type="button"><span class="mif-cross"></span></button>
        </div>
        <br>
        <br>
        <div class="input-control text full-size" data-role="input">
            <label for="username">Usuario:</label>
            <input type="text" class="form-control" name="username" value="{{ old('username') }}">
            <button class="button helper-button clear" tabindex="-1" type="button"><span class="mif-cross"></span></button>
        </div>
        <br>
        <br>
        <div class="input-control text full-size" data-role="input">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
            <button class="button helper-button clear" tabindex="-1" type="button"><span class="mif-cross"></span></button>
        </div>

        <br>
        <br>
        <div class="input-control password full-size" data-role="input">
            <label for="password">Contraseña:</label>
            <input type="password" class="form-control" name="password">
            <button class="button helper-button reveal" tabindex="-1" type="button"><span class="mif-looks"></span></button>
        </div>
        <br>
        <br>
        <div class="input-control password full-size" data-role="input">
            <label for="password">Contraseña:</label>
            <input type="password" class="form-control" name="password_confirmation">

            <button class="button helper-button reveal" tabindex="-1" type="button"><span class="mif-looks"></span></button>
        </div>
        <br>
        <br>
        <div class="form-actions">
            <button type="submit" class="button primary">Registrar</button>
        </div>
    </form>
</div>

@endsection
