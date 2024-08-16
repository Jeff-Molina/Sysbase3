<?php

namespace App\Http\Requests;

use App\Models\capacitacion_equipo;
use Illuminate\Foundation\Http\FormRequest;

class Createcapacitacion_equipoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return capacitacion_equipo::$rules;
    }

    public function messages()
    {
        return capacitacion_equipo::$messages;
    }
}
