<?php

namespace App\Http\Controllers;
use App\Localidad;
use App\Cooperativa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CooperativaRequest;
use Illuminate\Database\Query\Builder;


class CooperativaController extends Controller
{
    public function index()
    {
      $cooperativas = Cooperativa::all();
      return view('cooperativas.index', [
          'cooperativas' => $cooperativas
      ]);
    }

    public function create()
    {
        $localidades = Localidad::all()->pluck('nombre', 'id');
        return view('cooperativas.create', [
            'localidades'    => $localidades
        ]);
    }

    public function store(CooperativaRequest $cooperativaRequest)
    {
        $data = $cooperativaRequest->all();
        $data['user_id'] = Auth::user()->id;
        $creada = Cooperativa::create($data);
        if ($creada){
            Session::flash('message-success', 'Cooperativa creada satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'La Cooperativa no se ha podido guardar.');
        }
        return redirect()->route('cooperativa.index');
    }

    public function show(cooperativa $cooperativa)
    {
        return view('cooperativas.show', compact('cooperativa'));
    }

    public function edit(cooperativa $cooperativa)
    {
      $localidades = Localidad::all()->pluck('nombre', 'id');;

      return view('cooperativas.edit', [
           'localidades' => $localidades,
           'cooperativa' => $cooperativa
      ]);
    }

    public function update(CooperativaRequest $cooperativaRequest, cooperativa $cooperativa)
    {
      if ($cooperativa->fill($cooperativaRequest->all())->update())
      {
        Session::flash('message-success', 'Cooperativa Actualizada satisfactoriamente.');
      }else{
        Session::flash('message-danger', 'La Cooperativa no se ha podido Actualizar.');
      }
      return redirect()->route('cooperativa.index');
    }

    public function destroy(cooperativa $cooperativa)
    {
      if (Cooperativa::where('slug' , $cooperativa->slug)->delete())
      {
           Session::flash('message-success', 'Coopereativa Borrada satisfactoriamente.');
      }else{
           Session::flash('message-danger', 'La Cooperativa no se ha podido Borrar.');
      }
      return redirect()->route('cooperativa.index');
    }

}
