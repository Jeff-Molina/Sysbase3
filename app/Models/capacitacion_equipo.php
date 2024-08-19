<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes;
 use Illuminate\Database\Eloquent\Factories\HasFactory;

class capacitacion_equipo extends Model
{

    use SoftDeletes;
    use HasFactory;

    public $table = 'capacitacion_equipos';

    public $fillable = [
        'marca_id',
        'modelo_id',
        'tipo_id',
        'numero_serie',
        'imei'
    ];

    protected $casts = [
        'numero_serie' => 'string',
        'imei' => 'string'
    ];

    public static $rules = [
        'marca_id' => 'required',
        'modelo_id' => 'required',
        'tipo_id' => 'required',
        'numero_serie' => 'required|string|max:100',
        'imei' => 'nullable|string|max:100',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public static $messages = [

    ];

    public function marca(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\capacitacion_marca::class, 'marca_id');
    }

    public function modelo(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\capacitacion_modelo::class, 'modelo_id');
    }

    public function tipo(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\capacitacion_tipo::class, 'tipo_id');
    }

    public function capacitacionServicios(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\CapacitacionServicio::class, 'equipo_id');
    }
}
