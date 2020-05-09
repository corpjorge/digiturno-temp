<?php

namespace App\Http\Requests;

use App\Model\Digiturno\Servicio;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ServicioRequest extends FormRequest
{
    /**
     * Determine if the servicio is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'categoria_id' => [
                'required',
            ],
            'prioridad_id' => [
                'required',
            ],  
            'nombre' => [
                'required',
            ],
            'sigla' => [
                'required',
            ],                    
        ];
    }
}
