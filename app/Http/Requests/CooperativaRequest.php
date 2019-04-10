<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CooperativaRequest extends FormRequest
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
         $cooperativa = $this->route('cooperativa');

         switch ($this->method()) {
             case 'GET':
             case 'DELETE': {
                 return [];
             }
             case 'POST': {
                 return [
                     'nombre'         => 'required',
                     'codigo'             => 'required',
                     'localidad_id'        => 'nullable|exists:localidades,id',
                     'domicilio'          =>'nullable',
                     'email'             => 'email|nullable',
                     'slug'               =>'nullable|unique'


                 ];
             }
             case 'PUT':
             case 'PATCH': {
                 return [
                     'nombre'         => 'required',
                     'codigo'             => 'required',
                     'localidad_id'        => 'nullable|exists:localidades,id',
                     'domicilio'          =>'nullable',
                     'email'             => 'email|required',
                     'slug'               =>'nullable|unique'


                 ];
             }
             default:
                 break;
         }
     }
     public function messages()
     {
        return [
            'nombre.required' => 'Deberá completar el Nombre de la Cooperativa',
            'codigo.required' => 'Deberá completar el Código de la Cooperativa',
            'email.required' => 'Deberá completar el E-mail de la Cooperativa'
        ];
    }
}
