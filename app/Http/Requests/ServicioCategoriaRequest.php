<?php

namespace App\Http\Requests;

use App\Model\Digiturno\ServicioCategoria;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ServicioCategoriaRequest extends FormRequest
{
    /**
     * Determine if the categoria is authorized to make this request.
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
            'nombre' => [
                'required',
            ],
            'descripcion' => [
                'required',
            ],                      
        ];
    }
}
