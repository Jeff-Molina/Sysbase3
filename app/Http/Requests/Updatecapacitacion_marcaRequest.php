<?php

namespace App\Http\Requests;

use App\Models\capacitacion_marca;
use Illuminate\Foundation\Http\FormRequest;

class Updatecapacitacion_marcaRequest extends FormRequest
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
        $rules = capacitacion_marca::$rules;
        
        return $rules;
    }

    public function messages()
    {
        return capacitacion_marca::$messages;
    }
}
