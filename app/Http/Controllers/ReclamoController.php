<?php

namespace App\Http\Controllers;
use App\MotivoReclamo;
use App\Contingencia;
use App\Usuario;
use App\Reclamo;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CooperativaRequest;
use Illuminate\Database\Query\Builder;


class ReclamoController extends Controller
{
    public function index()
    {

      $reclamos = Reclamo::where('user_id', '=', Auth::user()->id)->get();
      $contingencias = Contingencia::where('user_id', '=', Auth::user()->id)->pluck('fecha_hora_apertura', 'id');
      //$contingencias = Contingencia::whereRaw('user_id > ? and  = 100', [25])->get();
      return view('reclamos.index', [
          'reclamos' => $reclamos,
          'contingencias'     => $contingencias
      ]);
    }

    public function create()
    {
        $motivosReclamos = MotivoReclamo::all()->pluck('nombre', 'id');
        $contingencias = Contingencia::where('user_id', '=', Auth::user()->id)->pluck('fecha_hora_apertura', 'id');
        $usuarios = Usuario::all()->pluck('nombre', 'id');
        return view('reclamos.create', [
             'usuarios'   => $usuarios,
             'motivosReclamos' => $motivosReclamos,
             'contingencias'    =>$contingencias

        ]);
    }

    public function store(request $request)
    {
          //dd($request);
          if ($request['contingencia_id'] == null)
                $request['contingencia_id'] = 1;
        $request['slug'] = rand(5,10);
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $data['fecha_hora'] = Carbon::parse($data['fecha_hora'])->format('Y-m-d H:m:s');
        $creada = Reclamo::create($data);
        if ($creada){
            Session::flash('message-success', 'Reclamo creado satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'El Reclamo no se ha podido guardar.');
        }
        return redirect()->route('reclamo.index');
    }

    public function show(reclamo $reclamo)
    {
        return view('reclamos.show', compact('reclamo'));
    }

    public function edit(reclamo $reclamo)
    {
      $motivosReclamos = MotivoReclamo::all()->pluck('nombre', 'id');
      $contingencias = Contingencia::all()->pluck('fecha_hora_apertura', 'id');
      $usuarios = Usuario::all()->pluck('nombre', 'id');
      return view('reclamos.edit', [
           'reclamo' => $reclamo,
           'usuarios'   => $usuarios,
           'motivosReclamos' => $motivosReclamos,
           'contingencias'    =>$contingencias
      ]);
    }

    public function updateContingencia(request $request)
    {
      //dd($request['id']);

      $reclamo = Reclamo::findOrFail($request->id);
      $reclamo->contingencia_id = $request['contingencia_id'];
      $actualizado = $reclamo->update();
      if ($actualizado)
      {
        Session::flash('message-success', 'Reclamo Actualizado satisfactoriamente.');
      }else{
        Session::flash('message-danger', 'El Reclamo no se ha podido Actualizar.');
      }
      return back();
    }

    public function update(request $request, reclamo $reclamo)
    {
          $request['slug'] = rand(5,10);
          $request['fecha_hora'] = Carbon::parse($request['fecha_hora'])->format('Y-m-d H:m:s');
      if ($reclamo->fill($request->all())->update())
      {
        Session::flash('message-success', 'Reclamo Actualizado satisfactoriamente.');
      }else{
        Session::flash('message-danger', 'El Reclamo no se ha podido Actualizar.');
      }
      return redirect()->route('reclamo.index');
    }

    public function destroy(reclamo $reclamo)
    {
      if (Reclamo::where('slug' , $reclamo->slug)->delete())
      {
           Session::flash('message-success', 'Reclamo Borrada satisfactoriamente.');
      }else{
           Session::flash('message-danger', 'El Reclamo no se ha podido Borrar.');
      }
      return redirect()->route('reclamo.index');
    }

}
