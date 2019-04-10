<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Cooperativa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $usuarios = Usuario::all();
         return view('usuarios.index', [
             'usuarios' => $usuarios
         ]);
    }

    public function create()
    {
        $cooperativas = Cooperativa::all()->pluck('nombre', 'id');
        return view('usuarios.create', [
            'cooperativas'    => $cooperativas
        ]);
    }


    public function store(request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $creada = Usuario::create($data);
        if ($creada){
            Session::flash('message-success', 'Usuario creado satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'El Usuario no se ha podido guardar.');
        }
        return redirect()->route('usuario.index');
    }



    public function show(usuario $usuario)
    {
        return view('usuarios.show', compact('usuario'));
    }

    public function edit(usuario $usuario)
    {
      $cooperativas = Cooperativa::all()->pluck('nombre', 'id');
      return view('usuarios.edit', [
           'usuario' => $usuario,
           'cooperativa' => $cooperativa
      ]);
    }


    public function update(requestt $request, usuario $usuario)
    {
      if ($usuario->fill($request->all())->update())
      {
        Session::flash('message-success', 'Usuario Actualizado satisfactoriamente.');
      }else{
        Session::flash('message-danger', 'El usuario no se ha podido Actualizar.');
      }
      return redirect()->route('usuario.index');
    }

    public function destroy(usuario $usuario)
    {
      if (Usuario::where('slug' , $usuario->slug)->delete())
      {
           Session::flash('message-success', 'Usuario Borrado satisfactoriamente.');
      }else{
           Session::flash('message-danger', 'El Usuario no se ha podido Borrar.');
      }
      return redirect()->route('usuario.index');
    }
}
