<?php

namespace App\Http\Controllers;
use App\MotivoReclamo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Caffeinated\Shinobi\Models\Permission;
//use App\Http\Requests\TipoElementoRequest;

class MotivoReclamoController extends Controller
{


    public function __construct()
    {

        $this->middleware('permission:motivoreclamo.index')->only('index');
        $this->middleware('permission:motivoreclamo.create')->only(['create', 'store']);
        $this->middleware('permission:motivoreclamo.show')->only('show');
        $this->middleware('permission:motivoreclamo.edit')->only(['edit', 'update']);
        $this->middleware('permission:motivoreclamo.destroy')->only('delete');

    }



     public function index()
     {
         $motivosReclamos = MotivoReclamo::all();
         return view('motivosReclamos.index',compact('motivosReclamos'));
     }


     public function store(Request $request)
     {
        if(MotivoReclamo::create($request->all()))
        {
            Session::flash('message-success', 'Motivo creado satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar crear un Motivo para el Reclamo');
        }
        return back();
     }

     public function update(Request $request)
     {
        $motivosReclamos = MotivoReclamo::findOrFail($request->id);
        if($motivosReclamos->update($request->all()))
        {
            Session::flash('message-success', 'Motivo actualizado satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar actualizar un Motivo');
        }
        return back();
     }

     public function destroy(Request $request)
     {
        $motivosReclamos = MotivoReclamo::findOrFail($request->id);
        if($motivosReclamos->delete())
        {
            Session::flash('message-success', 'Motivo eliminado satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar eliminar un Motivo');
        }
        return back();
     }
}
