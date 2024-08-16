<!-- Marca Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('marca_id', 'Marca Id:') !!}
    {!! Form::number('marca_id', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Modelo Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('modelo_id', 'Modelo Id:') !!}
    {!! Form::number('modelo_id', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Tipo Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_id', 'Tipo Id:') !!}
    {!! Form::number('tipo_id', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Numero Serie Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numero_serie', 'Numero Serie:') !!}
    {!! Form::text('numero_serie', null, ['class' => 'form-control', 'required', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Imei Field -->
<div class="form-group col-sm-6">
    {!! Form::label('imei', 'Imei:') !!}
    {!! Form::text('imei', null, ['class' => 'form-control', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Update At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('update_at', 'Update At:') !!}
    {!! Form::text('update_at', null, ['class' => 'form-control','id'=>'update_at']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#update_at').datepicker()
    </script>
@endpush