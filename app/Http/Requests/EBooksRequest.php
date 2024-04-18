<?php

namespace App\Http\Requests;

use App\Http\Traits\AppTrait;
use \Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class EBooksRequest extends FormRequest
{
    use AppTrait;

    public function authorize()
    {
        return true;
    }

    public function rules(Request $request)
    {
        return [
            'nome' => ['required'],
            'preco' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            '*.required' => 'Este campo é obrigatório.'
        ];
    }
}
