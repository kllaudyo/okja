<?php

namespace WeCash\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaRequest extends FormRequest
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
        return [
            "descricao" => "required",
            "tipo" => "required"
        ];
    }

    public function messages()
    {
        return [
            "descricao.required" => "Por favor, informe a descrição da categoria.",
            "tipo.required" => "Por favor, informe o tipo da categoria"
        ];
    }
}
