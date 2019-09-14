<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientEditFormRequest extends FormRequest
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
            'name'          =>'required|min:5|max:50',
            'cpf'           =>'required|min:100000000|numeric',
            'id_number'     =>'required|min:5|max:15',
            'adress'        =>'nullable|min:5|max:50',
            'neighborhood'  =>'nullable|min:3|max:50',
            'city'          =>'nullable|min:3|max:50',
            'state_id'      =>'nullable|numeric',
            'postal'        =>'nullable|min:10000000|numeric',
            'phone'         =>'required|min:1000000000|numeric',
            'biometric_hash'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'O campo Nome é obrigatório.',
            'cpf.required'=>'O campo CPF é obrigatório.',
            'id_number.required'=>'O campo indentidade é obrigatório.',
            'biometric_hash.required'=>'O cadastro da biometría é obrigatório.',
            'phone.required'=>'O telefone da biometría é obrigatório.',

            'cpf.min'=>'CPF inválido.',
            'postal.min'=>'CEP inválido.',
            'phone.min'=>'Telefone inválido.',
            'id_number.min'=>'Numero de identidade inválido.',
            'name.min'=>'O campo Nome deve conter no mínimo 5 caracteres.',


        ];
    }
}
