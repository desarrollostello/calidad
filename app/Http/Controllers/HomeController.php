<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Cooperativa;
use App\Localidad;
use App\Adjunto;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
            $cooperativa = Cooperativa::where('user_id', '=', Auth::user()->id)->get();
            $count = Cooperativa::where('user_id', '=', Auth::user()->id)->count();

            if ($count > 0)
            {
                  $coop        = Cooperativa::where('user_id', '=', Auth::user()->id)->first();
                  $adjuntos_m  = Adjunto::where('cooperativa_id', '=', $coop->id)
                                          ->where('mensual', '=', '1')
                                          ->orderBy('created_at', 'desc')->get();

                  $adjuntos_s  = Adjunto::where('cooperativa_id', '=', $coop->id)
                                          ->where('mensual', '=', '0')
                                          ->orderBy('created_at', 'desc')->get();

                  $date =  \Carbon\Carbon::now();
                  return view('adminlte::home', [
                       'cooperativa'    => $cooperativa,
                       'codigo'         => $coop->codigo,
                       'adjuntos_m'       => $adjuntos_m,
                       'adjuntos_s'       => $adjuntos_s,
                  ]);
            }else{
                  $localidades = Localidad::all()->pluck('nombre', 'id');
                  return view('cooperativas.create', [
                      'localidades'    => $localidades
                  ]);
            }

    }
}
