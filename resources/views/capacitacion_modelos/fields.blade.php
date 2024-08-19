<!-- Marca Id Field -->
<div class="form-group col-sm-6">
        {!! Form::label('marca_id', 'Marca:') !!}
        <div class="col-sm-12">
            {!! Form::select(
                'marca_id',
                select(\App\Models\Capacitacion_marca::class, 'nombre'),
                ['id' => 'marca_id', 'class' => 'form-control']

            ) !!}
        </div>
</div>


<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>
