<!-- Marca Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('marca_id', 'Marca Id:') !!}
    {!! Form::number('marca_id', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>