<?php

namespace App\Http\Controllers;
use App\CodigoElemento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Caffeinated\Shinobi\Models\Permission;
//use App\Http\Requests\TipoElementoRequest;

class CodigoElementoController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:codigoelemento.index')->only('index');
        $this->middleware('permission:codigoelemento.create')->only(['create', 'store']);
        $this->middleware('permission:codigoelemento.show')->only('show');
        $this->middleware('permission:codigoelemento.edit')->only(['edit', 'update']);
        $this->middleware('permission:codigoelemento.destroy')->only('delete');
    }


     public function index()
     {
         $codigosElementos = CodigoElemento::all();
         return view('codigosElementos.index',compact('codigosElementos'));
     }


     public function store(Request $request)
     {
        if(CodigoElemento::create($request->all()))
        {
            Session::flash('message-success', 'Código creado satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar crear un Código');
        }
        return back();
     }

     public function update(Request $request)
     {
        $codigosElementos = CodigoElemento::findOrFail($request->id);
        if($codigosElementos->update($request->all()))
        {
            Session::flash('message-success', 'Código actualizada satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar actualizar un Código');
        }
        return back();
     }

     public function destroy(Request $request)
     {
        $codigosElementos = CodigoElemento::findOrFail($request->id);
        if($codigosElementos->delete())
        {
            Session::flash('message-success', 'Código eliminado satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar eliminar un Código');
        }
        return back();
     }
}
