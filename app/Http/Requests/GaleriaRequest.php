<?php

namespace App\Http\Requests;

use App\Http\Traits\AppTrait;
use Illuminate\Foundation\Http\FormRequest;

class GaleriaRequest extends FormRequest
{
    use AppTrait;

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            
            'nome-da-galeria' => ['required'],

        ];
    }

    public function messages(): array
    {
        return [
           
            'nome-da-galeria.required' => 'Este campo é obrigatório.',

        ];
    }
}