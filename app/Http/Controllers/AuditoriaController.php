<?php

namespace App\Http\Controllers;
use App\Auditoria;
use Illuminate\Http\Request;
use App\Http\Requests\AuditoriaRequest;

class AuditoriaController extends Controller
{

    protected $auditoria;

    public function __construct()
    {
        $this->auditoria = $this->getAuditoria();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auditorias.index', ['auditoria' => $this->auditoria]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auditorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuditoriaRequest $auditoriaRequest)
    {
        Auditoria::create($auditoriaRequest->all());
        return redirect()->route('auditoria.index')->with('message', 'Auditoria ingresada.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show(auditoria $auditoria)
     {
         return view('auditorias.show', compact('auditoria'));
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit(auditoria $auditoria)
     {
          return view('auditorias.edit', ['auditoria' => $auditoria]);
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(AuditoriaRequest $auditoriaRequest, auditoria $auditoria)
     {
         $auditoria->fill($auditoriaRequest->all())->update();
         Session::flash('message', 'Auditoria actualizado satisfactoriamente.');
         return redirect()->route('auditoria.index');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(auditoria $auditoria)
     {
         Auditoria::where('slug' , $slug)->delete();
         $this->auditoria = $this->getAuditoria();
         Session::flash('message-danger', 'Auditoria eliminado satisfactoriamente.');
         return redirect()->route('auditoria.index');
     }
     private function getAuditoria()
    {
        return Auditoria::all();
    }
}
