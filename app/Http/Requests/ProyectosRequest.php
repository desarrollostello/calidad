<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProyectosRequest extends FormRequest
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
         $proyecto = $this->route('proyecto');

         switch ($this->method()) {
             case 'GET':
             case 'DELETE': {
                 return [];
             }
             case 'POST': {
                 return [
                     'fechaIngreso'             => 'required|date',
                     'nombre'                   => 'required',
                     'numeroInterno'            => 'nullable|unique:proyectos,numeroInterno',
                     'numeroCfi'                => 'nullable|unique:proyectos,numeroCfi',
                     'localidad_id'             => 'required',
                     'lineaCredito_id'          => 'required',
                     'estado_id'                => 'required',
                     'estadoInterno_id'         => 'required',
                     'sector_id'                => 'required',
                     'monto'                    => 'required',
                     'slug'                     => 'nullable',
                     'domicilioProyecto'        => 'nullable',
                     'domicilioLegal'           => 'nullable',
                     'telefono'                 => 'nullable',
                     'email'                    => 'nullable',
                     'web'                      => 'nullable',
                     'productos'                => 'nullable',
                     'ciuu'                     => 'nullable',
                     'mo'                       => 'nullable',
                     'enuep'                    => 'nullable',
                     'descripcion'              => 'nullable',
                     'inversionTotal'           => 'nullable',
                     'inversionRealizada'       => 'nullable',
                     'inversionARealizar_af'    => 'nullable',
                     'inversionARealizar_ct'    => 'nullable',
                     'figuraLegal_id'           => 'nullable',
                     'periodicidad_id'          => 'nullable',
                     'destinoCredito_id'        => 'nullable',
                     'plazoGracia'              => 'nullable',
                     'plazoAmortizacion'        => 'nullable',
                     'cantidadDesembolsos'      => 'nullable',
                     'tasas'                    => 'nullable',
                     'garantia_id'              => 'nullable',
                     'sucursal_id'              => 'nullable',
                     'descripcionGarantia'      => 'nullable',
                     'fechaCaducoBanco'         => 'date|nullable',
                     'fechaAprobadoUep'         => 'date|nullable',
                     'fechaEnviadoCfi'          => 'date|nullable',
                     'fechaAprobadoCfi'         => 'date|nullable',
                     'fechaTramdispo'           => 'date|nullable',
                     'fechaComunicaTran'        => 'date|nullable',
                     'fechaDesembolso'          => 'date|nullable',
                     'fechaEfectivizacion'      => 'date|nullable',
                     'fechaDesistido'           => 'date|nullable',
                     'fechaJudicial'            => 'date|nullable',
                     'fechaCancelado'           => 'date|nullable',
                     'fechaArchivado'           => 'date|nullable',
                     'fechaUltimoMovimiento'    => 'date|nullable',
                     'refinanciado'             => 'nullable',
                     'user_id'                  => 'nullable',
                     'titular'                  => 'nullable',
                     'observaciones'            => 'nullable'

                 ];
             }
             case 'PUT':
             case 'PATCH': {
                 return [
                     'fechaIngreso'             => 'required|date',
                     'nombre'                   => 'required',
                     'numeroInterno'            => 'nullable|unique:proyectos,numeroInterno',
                     'numeroCfi'                => 'nullable|unique:proyectos,numeroCfi',
                     'localidad_id'             => 'required|exists:localidades,id',
                     'lineaCredito_id'          => 'required|exists:lineas_creditos,id',
                     'estado_id'                => 'required|exists:estados,id',
                     'estadoInterno_id'         => 'required|exists:estados_internos,id',
                     'sector_id'                => 'required|exists:sectores,id',
                     'monto'                    => 'required',
                     'slug'                     => 'nullable',
                     'domicilioProyecto'        => 'nullable',
                     'domicilioLegal'           => 'nullable',
                     'telefono'                 => 'nullable',
                     'email'                    => 'nullable',
                     'web'                      => 'nullable',
                     'productos'                => 'nullable',
                     'ciuu'                     => 'nullable',
                     'mo'                       => 'nullable',
                     'enuep'                    => 'nullable',
                     'descripcion'              => 'nullable',
                     'inversionTotal'           => 'nullable',
                     'inversionRealizada'       => 'nullable',
                     'inversionARealizar_af'    => 'nullable',
                     'inversionARealizar_ct'    => 'nullable',
                     'figuraLegal_id'           => 'nullable',
                     'periodicidad_id'          => 'nullable',
                     'destinoCredito_id'        => 'nullable',
                     'plazoGracia'              => 'nullable',
                     'plazoAmortizacion'        => 'nullable',
                     'cantidadDesembolsos'      => 'nullable',
                     'tasas'                    => 'nullable',
                     'garantia_id'              => 'nullable|exists:garantias,id',
                     'sucursal_id'              => 'nullable|exists:provincias,id',
                     'descripcionGarantia'      => 'nullable',
                     'fechaCaducoBanco'         => 'date|nullable',
                     'fechaAprobadoUep'         => 'date|nullable',
                     'fechaEnviadoCfi'          => 'date|nullable',
                     'fechaAprobadoCfi'         => 'date|nullable',
                     'fechaTramdispo'           => 'date|nullable',
                     'fechaComunicaTran'        => 'date|nullable',
                     'fechaDesembolso'          => 'date|nullable',
                     'fechaEfectivizacion'      => 'date|nullable',
                     'fechaDesistido'           => 'date|nullable',
                     'fechaJudicial'            => 'date|nullable',
                     'fechaCancelado'           => 'date|nullable',
                     'fechaArchivado'           => 'date|nullable',
                     'fechaUltimoMovimiento'    => 'date|nullable',
                     'refinanciado'             => 'nullable',
                     'user_id'                  => 'nullable',
                     'titular'                  => 'nullable',
                     'observaciones'            => 'nullable',
                     'slug'                     => 'nullable|unique:proyectos,slug,' . $proyecto->id,
                 ];
             }
             default:
                 break;
         }
     }
     public function messages()
     {
        return [
            'nombre.required' => 'El Nombre del Proyecto es obligatorio',
            'fechaIngreso.required' => 'La Fecha de Ingreso del Proyecto es obligatorio',
            'localidad_id.required' => 'La Localidad del Proyecto es obligatoria',
            'lineaCredito_id.required' => 'La Línea de Crédito del Proyecto es obligatorio',
            'estado_id.required' => 'El Estado del Proyecto es obligatorio',
            'estadoInterno_id.required' => 'El Estado Interno del Proyecto es obligatorio',
            'sector_id.required' => 'El Sector del Proyecto es obligatorio',
            'monto.required' => 'ElMonto del Proyecto es obligatorio'
        ];
    }
}
