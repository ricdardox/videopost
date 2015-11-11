{!! Form::hidden('id', null, ['class' => 'form-control']) !!}

<!--- Name Field --->
<div class="form-group col-sm-12 col-lg-12>
     {!! Form::label('name', 'Nombre:') !!}
     {!! Form::text('name', null, ['class' => 'form-control']) !!}
     </div>

     <!--- Username Field --->
     <div class="form-group col-sm-6 col-lg-4">
     {!! Form::label('username', 'Usuario:') !!}
     {!! Form::text('username', null, ['class' => 'form-control']) !!}
</div>

<!--- Email Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!--- Password Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password',  ['class' => 'form-control']) !!}
</div>

<!--- Active Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('active', 'Activo:') !!}
    {!!Form::select('active',['A'=>'Activo',''=>'Inactivo'],null,['class'=>'form-control'])!!}

</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
</div>
