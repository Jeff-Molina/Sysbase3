<?php

namespace App\Http\Requests;

use App\Models\capacitacion_estado;
use Illuminate\Foundation\Http\FormRequest;

class Createcapacitacion_estadoRequest extends FormRequest
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
        return capacitacion_estado::$rules;
    }

    public function messages()
    {
        return capacitacion_estado::$messages;
    }
}
