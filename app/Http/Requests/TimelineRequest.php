<?php

namespace App\Http\Requests;

use App\Http\Traits\AppTrait;
use Illuminate\Foundation\Http\FormRequest;

class TimelineRequest extends FormRequest
{
    use AppTrait;

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            
            'nome-do-evento' => ['required'],
            'data' => ['required'],
            'texto' => ['required'],

        ];
    }

    public function messages(): array
    {
        return [
           
            'nome-do-evento.required' => 'Este campo é obrigatório.',
            'data.required' => 'Este campo é obrigatório.',
            'texto.required' => 'Este campo é obrigatório.',

        ];
    }
}