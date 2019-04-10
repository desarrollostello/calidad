<?php

namespace App\Http\Controllers;
use App\TipoElemento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Caffeinated\Shinobi\Models\Permission;
//use App\Http\Requests\TipoElementoRequest;

class TipoElementoController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:tipoelemento.index')->only('index');
        $this->middleware('permission:tipoelemento.create')->only(['create', 'store']);
        $this->middleware('permission:tipoelemento.show')->only('show');
        $this->middleware('permission:tipoelemento.edit')->only(['edit', 'update']);
        $this->middleware('permission:tipoelemento.destroy')->only('delete');
    }


     public function index()
     {
         $tiposElementos = TipoElemento::all();
         return view('tiposElementos.index',compact('tiposElementos'));
     }


     public function store(Request $request)
     {
        if(TipoElemento::create($request->all()))
        {
            Session::flash('message-success', 'Tipo creado satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar crear un Tipo de Elemento');
        }
        return back();
     }

     public function update(Request $request)
     {
        $tipoElemento = TipoElemento::findOrFail($request->id);
        if($tipoElemento->update($request->all()))
        {
            Session::flash('message-success', 'Tipo actualizado satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar actualizar un Tipo');
        }
        return back();
     }

     public function destroy(Request $request)
     {
        $tipoElemento = TipoElemento::findOrFail($request->id);
        if($tipoElemento->delete())
        {
            Session::flash('message-success', 'Tipo eliminado satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar eliminar un Tipo');
        }
        return back();
     }
}
