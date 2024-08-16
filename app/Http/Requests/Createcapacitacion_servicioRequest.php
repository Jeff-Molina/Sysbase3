<?php

namespace App\Http\Requests;

use App\Models\capacitacion_servicio;
use Illuminate\Foundation\Http\FormRequest;

class Createcapacitacion_servicioRequest extends FormRequest
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
        return capacitacion_servicio::$rules;
    }

    public function messages()
    {
        return capacitacion_servicio::$messages;
    }
}
