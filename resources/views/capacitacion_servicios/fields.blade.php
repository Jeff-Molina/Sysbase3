<!-- Cliente Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cliente_id','Cliente:') !!}
    {!!
        Form::select(
            'cliente_id',
            select(\App\Models\capacitacion_cliente::class,'nombre_completo')
            , null
            , ['id'=>'cliente','class' => 'form-control','style'=>'width: 100%']
        )
    !!}
</div>
<!-- Estado Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado_id','Estado:') !!}

    {!!
        Form::select(
            'estado_id',
            select(\App\Models\Capacitacion_estado::class)
            , null
            , ['id'=>'estado','class' => 'form-control','style'=>'width: 100%']
        )
    !!}
</div>
<!-- Equipo Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('equipo_id','Equipo:') !!}
    <a href="{{route('capacitacionEquipos.create')}}" style="color: red">Nuevo</a>
    {!!
        Form::select(
            'equipo_id',
            select(\App\Models\capacitacion_equipo::class,'nombre_equipo')
            , null
            , ['id'=>'equipos','class' => 'form-control','style'=>'width: 100%']
        )
    !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id','Nombre:') !!}
    {!!
        Form::select(
            'user_id',
            select(\App\Models\User::class,'name')
            , null
            , ['id'=>'users','class' => 'form-control','style'=>'width: 100%']
        )
    !!}
</div>

<!-- Precio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('precio', 'Precio:') !!}
    {!! Form::number('precio', null, ['class' => 'form-control','placeholder'=>'Q. 00.00']) !!}
</div>

<!-- Fecha Recepcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_recepcion', 'Fecha Recepcion:') !!}
        {!! Form::date('fecha_recepcion', null, ['class' => 'form-control','id'=>'fecha_recepcion']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#fecha_recepcion').datepicker()
    </script>
@endpush

<!-- Problema Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('problema', 'Problema:') !!}
    {!! Form::textarea('problema', null, ['class' => 'form-control', 'required', 'maxlength' => 65535, 'maxlength' => 65535]) !!}
</div>

<!-- Fecha Diagnostico Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_diagnostico', 'Fecha Diagnostico:') !!}
    {!! Form::date('fecha_diagnostico', null, ['class' => 'form-control','id'=>'fecha_diagnostico']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#fecha_diagnostico').datepicker()
    </script>
@endpush

<!-- Diagnostico Field -->
<div class="form-group col-sm-6">
    {!! Form::label('diagnostico', 'Diagnostico:') !!}
    {!! Form::text('diagnostico', null, ['class' => 'form-control', 'maxlength' => 45, 'maxlength' => 45]) !!}
</div>

<!-- Fecha Entrega Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_entrega', 'Fecha Entrega:') !!}
    {!! Form::date('fecha_entrega', null, ['class' => 'form-control','id'=>'fecha_entrega']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#fecha_entrega').datepicker()
    </script>
@endpush

<!-- Solucion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('solucion', 'Solucion:') !!}
    {!! Form::textarea('solucion', null, ['class' => 'form-control', 'maxlength' => 65535, 'maxlength' => 65535]) !!}
</div>
