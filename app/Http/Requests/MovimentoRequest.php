<?php

namespace WeCash\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovimentoRequest extends FormRequest
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
            "conta" => "required",
            "categoria" => "required",
            "descricao" => "required",
            "previsao" => "required",
            "valor_previsto" => "required"
        ];
    }

    public function messages()
    {
        return [
            "conta.required" => "Por favor, informe a conta do movimento.",
            "categoria.required" => "Por favor, informe a categoria do movimento.",
            "descricao.required" => "Por favor, informe a descrição do movimento.",
            "previsao.required" => "Por favor, informe a data prevista do movimento.",
            "valor_previsto.required" => "Por favor, informe o valor previsto do movimento."
        ];
    }
}
