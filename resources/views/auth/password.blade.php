@extends('app')

@section('content')
<div class="padding20">

    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <h3>
        Cambio de contraseña
    </h3>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <br>
        <strong>Whoops!</strong> Algunos campos tienen errores.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form class="form-horizontal " role="form" method="POST" action="{{route('forgotpassword')}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label class="col-md-4 control-label">E-Mail</label>
        <div class="input-control text">
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" required="">
        </div>

        <button class="button primary">Restaurar contraseña</button>
    </form>
</div>
@endsection
