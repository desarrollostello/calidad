<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContingenciaRequest extends FormRequest
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
         $contingencia = $this->route('contingencia');

         switch ($this->method()) {
             case 'GET':
             case 'DELETE': {
                 return [];
             }
             case 'POST': {
                 return [

                     'codigo'             => 'required',
                     'causaContingencia_id'        => 'nullable|exists:causaContingencia,id',
                     'tipoElemento_id'        => 'nullable|exists:tipoElemento,id',
                     'codigoElemento_id'        => 'nullable|exists:codigoElemento,id',
                     'codigo_elemento'            => 'nullable',
                     'fecha_apertura'          =>'nullable',
                     'fecha_cierre'             => 'nullable',
                     'hora_apertura'            => 'nullable',
                     'hora_cierre'            => 'nullable',
                     'observaciones'            =>'nullable',
                     'slug'               =>'nullable|unique'


                 ];
             }
             case 'PUT':
             case 'PATCH': {
                 return [

                       'codigo'             => 'required',
                       'causaContingencia_id'        => 'nullable|exists:causaContingencia,id',
                       'tipoElemento_id'        => 'nullable|exists:tipoElemento,id',
                       'codigoElemento_id'        => 'nullable|exists:codigoElemento,id',
                       'codigo_elemento'            => 'nullable',
                       'fecha_apertura'          =>'nullable',
                       'fecha_cierre'             => 'nullable',
                       'hora_apertura'            => 'nullable',
                       'hora_cierre'            => 'nullable',
                       'observaciones'            =>'nullable',
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

        ];
    }
}
