<?php

namespace App\Http\Controllers;
use App\CausaContingencia;
use App\CodigoElemento;
use App\TipoElemento;
use App\Contingencia;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ContingenciaRequest;
use Illuminate\Database\Query\Builder;


class ContingenciaController extends Controller
{

    public function index()
    {

      $contingencias = Contingencia::where('user_id', '=', Auth::user()->id)->get();
      return view('contingencias.index',compact('contingencias'));
    }

    public function create()
    {
        $causaContingencia = CausaContingencia::all()->pluck('nombre', 'id');
        $tipoElemento      = TipoElemento::all()->pluck('nombre', 'id');
        $codigoElemento    = CodigoElemento::all()->pluck('nombre', 'id');

        return view('contingencias.create', [
            'causaContingencia' => $causaContingencia,
            'tipoElemento'      => $tipoElemento,
            'codigoElemento'    => $codigoElemento
        ]);
    }

    public function store(Request $request)
    {
          if ($request['nombre'] == null)
              $request['nombre'] = 'A DEFINIR';
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        if ($data['fecha_apertura'])
            $data['fecha_apertura'] = Carbon::parse($data['fecha_apertura'])->format('Y-m-d');

        if ($data['fecha_cierre'])
            $data['fecha_cierre'] = Carbon::parse($data['fecha_cierre'])->format('Y-m-d');



        if (Contingencia::create($data))
        {
            Session::flash('message-success', 'Contingencia creada satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'La Contingencia no se ha podido guardar.');
        }
        return redirect()->route('contingencia.index');
    }

     public function show(Contingencia $contingencia)
     {
         return view('contingencias.show', compact('contingencia'));
     }


     public function edit(Contingencia $contingencia)
     {
        $causaContingencia = CausaContingencia::all()->pluck('nombre', 'id');
        $tipoElemento      = TipoElemento::all()->pluck('nombre', 'id');
        $codigoElemento    = CodigoElemento::all()->pluck('nombre', 'id');
        return view('contingencias.edit', [
            'contingencia'      => $contingencia,
            'causaContingencia' => $causaContingencia,
            'tipoElemento'      => $tipoElemento,
            'codigoElemento'    => $codigoElemento
        ]);
     }

     public function update(request $request, Contingencia $contingencia)
     {
           if ($request['nombre'] == null)
               $request['nombre'] = 'A DEFINIR';

           if ($request['fecha_apertura'])
               $request['fecha_apertura'] = Carbon::parse($request['fecha_apertura'])->format('Y-m-d');

           if ($request['fecha_cierre'])
               $request['fecha_cierre'] = Carbon::parse($request['fecha_cierre'])->format('Y-m-d');

         $contingencia->fill($request->all())->update();
         Session::flash('message', 'Contingencia actualizada satisfactoriamente.');
         return redirect()->route('contingencia.index');
     }

     public function destroy(Contingencia $contingencia)
     {
        Contingencia::where('slug' , $contingencia->slug)->delete();
        Session::flash('message-danger', 'Contingencia eliminada satisfactoriamente.');
        return redirect()->route('contingencia.index');
     }

}
