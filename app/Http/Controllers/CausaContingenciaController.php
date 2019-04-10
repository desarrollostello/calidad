<?php

namespace App\Http\Controllers;
use App\CausaContingencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Caffeinated\Shinobi\Models\Permission;
//use App\Http\Requests\TipoElementoRequest;

class CausaContingenciaController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:causacontingencia.index')->only('index');
        $this->middleware('permission:causacontingencia.create')->only(['create', 'store']);
        $this->middleware('permission:causacontingencia.show')->only('show');
        $this->middleware('permission:causacontingencia.edit')->only(['edit', 'update']);
        $this->middleware('permission:causacontingencia.destroy')->only('delete');
    }


     public function index()
     {
         $causasContingencias = CausaContingencia::all();
         return view('causasContingencias.index',compact('causasContingencias'));
     }


     public function store(Request $request)
     {
        if(CausaContingencia::create($request->all()))
        {
            Session::flash('message-success', 'Causa creada satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar crear una Causa');
        }
        return back();
     }

     public function update(Request $request)
     {
        $causasContingencias = CausaContingencia::findOrFail($request->id);
        if($causasContingencias->update($request->all()))
        {
            Session::flash('message-success', 'Causa actualizada satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar actualizar una Causa');
        }
        return back();
     }

     public function destroy(Request $request)
     {
        $causasContingencias = CausaContingencia::findOrFail($request->id);
        if($causasContingencias->delete())
        {
            Session::flash('message-success', 'Causa eliminada satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar eliminar una Causa');
        }
        return back();
     }
}
