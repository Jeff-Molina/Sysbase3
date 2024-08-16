<!-- Nombres Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombres', 'Nombres:') !!}
    {!! Form::text('nombres', null, ['class' => 'form-control', 'required', 'maxlength' => 45, 'maxlength' => 45]) !!}
</div>

<!-- Apellidos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('apellidos', 'Apellidos:') !!}
    {!! Form::text('apellidos', null, ['class' => 'form-control', 'required', 'maxlength' => 45, 'maxlength' => 45]) !!}
</div>

<!-- Telefono Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefono', 'Telefono:') !!}
    {!! Form::text('telefono', null, ['class' => 'form-control', 'maxlength' => 8, 'maxlength' => 8]) !!}
</div>

<!-- Direccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('direccion', 'Direccion:') !!}
    {!! Form::text('direccion', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Cui Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cui', 'Cui:') !!}
    {!! Form::text('cui', null, ['class' => 'form-control', 'maxlength' => 13, 'maxlength' => 13]) !!}
</div>