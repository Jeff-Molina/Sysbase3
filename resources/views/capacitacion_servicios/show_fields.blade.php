@dump(config('jefferson.name'))
@php
    config(['jefferson.name'=>'Alejandro'])
@endphp
@dump(config('jefferson.name'))
<!-- Cliente Id Field -->
<div class="col-sm-12">
    {!! Form::label('cliente_id', 'Cliente:') !!}
    <p>{{ $capacitacionServicio->cliente->nombre_completo  }}</p>
</div>

<!-- Estado Id Field -->
<div class="col-sm-12">
    {!! Form::label('estado_id', 'Estado:') !!}
    <p>{{ $capacitacionServicio->estado->nombre }}</p>
</div>

<!-- Equipo Id Field -->
<div class="col-sm-12">
    {!! Form::label('equipo_id', 'Equipo:') !!}
    <p>{{ $capacitacionServicio->equipo->nombre_equipo }}</p>
</div>

<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'User:') !!}
    <p>{{ $capacitacionServicio->user->username }}</p>
</div>

<!-- Precio Field -->
<div class="col-sm-12">
    {!! Form::label('precio', 'Precio:') !!}
    <p> {{dvs().'. '. $capacitacionServicio->precio }}</p>
</div>

<!-- Fecha Recepcion Field -->
<div class="col-sm-12">
    {!! Form::label('fecha_recepcion', 'Fecha Recepcion:') !!}
    <p>{{ $capacitacionServicio->fecha_recepcion }}</p>
</div>

<!-- Problema Field -->
<div class="col-sm-12">
    {!! Form::label('problema', 'Problema:') !!}
    <p>{{ $capacitacionServicio->problema }}</p>
</div>

<!-- Fecha Diagnostico Field -->
<div class="col-sm-12">
    {!! Form::label('fecha_diagnostico', 'Fecha Diagnostico:') !!}
    <p>{{ $capacitacionServicio->fecha_diagnostico }}</p>
</div>

<!-- Diagnostico Field -->
<div class="col-sm-12">
    {!! Form::label('diagnostico', 'Diagnostico:') !!}
    <p>{{ $capacitacionServicio->diagnostico }}</p>
</div>

<!-- Fecha Entrega Field -->
<div class="col-sm-12">
    {!! Form::label('fecha_entrega', 'Fecha Entrega:') !!}
    <p>{{ $capacitacionServicio->fecha_entrega}}</p>
</div>

<!-- Solucion Field -->
<div class="col-sm-12">
    {!! Form::label('solucion', 'Solucion:') !!}
    <p>{{ $capacitacionServicio->solucion }}</p>
</div>

