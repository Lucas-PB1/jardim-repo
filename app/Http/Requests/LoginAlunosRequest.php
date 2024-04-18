<?php

namespace App\Http\Requests;

use App\Http\Traits\AppTrait;
use \Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class LoginAlunosRequest extends FormRequest
{
    use AppTrait;

    public function authorize()
    {
        return true;
    }

    public function rules(Request $request): array
    {
        return [
            'email' => 'required',
            'password' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            '*.required' => 'Este campo é obrigatório.',
        ];
    }
}
