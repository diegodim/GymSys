<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientCreateFormRequest extends FormRequest
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
            'name'          =>'required|min:1|max:50',
            'cpf'           =>'required|min:11|unique:people|numeric',
            'id_number'     =>'required|min:5|max:15|unique:people',
            'adress'        =>'nullable|min:3|max:50',
            'neighborhood'  =>'nullable|min:3|max:50',
            'city'          =>'nullable|min:3|max:50',
            'state_id'      =>'nullable|numeric',
            'cep'           =>'nullable|min:8|max:8|numeric',
            'phone'         =>'nullable|min:10|numeric',
            'biometric_hash'=>'required|unique:client'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'O campo Nome é obrigatório!',
            'cpf.required'=>'O campo CPF é obrigatório!',
            'id_number.required'=>'O campo indentidade é obrigatório!',
            'biometric_hash'=>'O cadastro dao biometría é obrigatório!',
        ];
    }
}
