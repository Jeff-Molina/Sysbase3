<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes;
 use Illuminate\Database\Eloquent\Factories\HasFactory;

class capacitacion_servicio extends Model
{

    use SoftDeletes;
    use HasFactory;

    public $table = 'capacitacion_servicios';

    public $fillable = [
        'cliente_id',
        'estado_id',
        'equipo_id',
        'user_id',
        'precio',
        'fecha_recepcion',
        'problema',
        'fecha_diagnostico',
        'diagnostico',
        'fecha_entrega',
        'solucion'
    ];

    protected $casts = [
        'precio' => 'decimal:2',
        'fecha_recepcion' => 'date:d/m/Y',
        'problema' => 'string',
        'fecha_diagnostico' => 'date:d/m/Y',
        'diagnostico' => 'string',
        'fecha_entrega' => 'date:d/m/Y',
        'solucion' => 'string'
    ];

    public static $rules = [
        'cliente_id' => 'required',
        'estado_id' => 'required',
        'equipo_id' => 'required',
        'user_id' => 'required',
        'precio' => 'nullable|numeric',
            'fecha_recepcion' => 'required',
        'problema' => 'required|string|max:65535',
        'fecha_diagnostico' => 'nullable',
        'diagnostico' => 'nullable|string|max:45',
        'fecha_entrega' => 'nullable',
        'solucion' => 'nullable|string|max:65535',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public static $messages = [

    ];

    public function cliente(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\capacitacion_cliente::class, 'cliente_id');
    }

    public function equipo(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\capacitacion_equipo::class, 'equipo_id');
    }

    public function estado(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\capacitacion_estado::class, 'estado_id');
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

}
