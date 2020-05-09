<?php

namespace App\Http\Requests;

use App\Model\Digiturno\Modulo;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ModuloRequest extends FormRequest
{
    /**
     * Determine if the modulo is authorized to make this request.
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
            'user_id' => [
                'required',
            ],
            'nombre' => [
                'required',
            ],
        ];
    }
}
