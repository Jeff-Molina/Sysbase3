<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes;
 use Illuminate\Database\Eloquent\Factories\HasFactory;

class capacitacion_cliente extends Model
{

    use SoftDeletes;
    use HasFactory;

    public $table = 'capacitacion_clientes';

    public $fillable = [
        'nombres',
        'apellidos',
        'telefono',
        'direccion',
        'cui'
    ];

    protected $casts = [
        'nombres' => 'string',
        'apellidos' => 'string',
        'telefono' => 'string',
        'direccion' => 'string',
        'cui' => 'string'
    ];

    public static $rules = [
        'nombres' => 'required|string|max:45',
        'apellidos' => 'required|string|max:45',
        'telefono' => 'nullable|string|max:8',
        'direccion' => 'nullable|string|max:255',
        'cui' => 'nullable|string|max:13',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public static $messages = [

    ];

    public function capacitacionServicios(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\CapacitacionServicio::class, 'cliente_id');
    }

    public function getNombreCompletoAttribute()
    {
        return $this->nombres." ".$this->apellidos;

    }
}
