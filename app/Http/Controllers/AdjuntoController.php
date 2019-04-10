<?php

namespace App\Http\Controllers;
use App\User;
use App\Cooperativa;
use App\Adjunto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdjuntoController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$cooperativas = Cooperativa::where('user_id', '=', Auth::user()->id)->get();
        $adjuntos = Adjunto::where('user_id', '=', Auth::user()->id)->get();
        return view('adjuntos.index', [
            'adjuntos' => $adjuntos
        ]);
    }

     public function create()
     {
         $cooperativas = Cooperativa::where('user_id', '=', Auth::user()->id)->get()->pluck('nombre', 'id');
         return view('adjuntos.create', [
             'cooperativas'  => $cooperativas
         ]);
     }


     public function store(request $request)
     {
            $data = $request->all();
            //dd($data);
            $coope = Cooperativa::where('user_id', '=', Auth::user()->id)->get();
            $data['user_id'] = Auth::user()->id;
            $data['cooperativa_id'] = $coope[0]['id'];

            if($request->tipo_archivo_s)
            $data['tipo_archivo'] = $data['tipo_archivo_s'];
            $codigo = $coope[0]['codigo'];

            if(!($request->anio)){
                  $dt = Carbon::now();
                  $data['anio'] = $dt->year;
            }
            $now = new \DateTime();
            $allowedfileExtension=['xls','xlsx','XLS','XLSX','ZIP','zip','jpeg','JPEG', 'pdf','jpg','png','docx','JPG','PDF','PNG','DOCX', 'txt', 'TXT', 'gif', 'GIF'];
             if ($request->hasfile('file'))
             {
                 foreach ($request->file('file') as $key => $value)
                 {
                    
                    $fullName = $value->getClientOriginalName(); 
                    $extension = $value->getClientOriginalExtension(); 
                    $onlyName = explode('.'.$extension,$fullName); 

                  //  dd($onlyName[0]);

                    $filename = rand(1,10000) . "-" . $data['mes'] .  "-" . str_slug($data['tipo_archivo']) . "-" . str_slug($now->format('d-m-Y H:i:s')) . "." . $extension;
                   // $extension = $value->getClientOriginalExtension();
                  
                    //dd($extension);
                    $check=in_array($extension,$allowedfileExtension);
                    if($check)
                    {
                        $value->move('upload/' . $codigo . '/', $filename);
                        $data['file'] = $filename;
                        $data['mensual'] = 1;
                        $data['semestre'] = 0;
                        $data['slug'] = $filename;
                        $creado =  Adjunto::create($data);
                        if ($creado)
                        {
                          //  dd($creado);
                            $this->enviar($creado, Auth::user()->email);
                            Session::flash('message-success', 'Anexo creado satisfactoriamente.');
                        }else{
                            Session::flash('message-danger', 'Error al intentar guardar el Anexo');
                        }
                    }else{
                        Session::flash('message-danger', 'Tipo de Archivo no permitido');
                    }
                      
                 }

             }

             if ($request->hasfile('file_semestral'))
             {
                 
                 foreach ($request->file('file_semestral') as $key => $value)
                 {

                    $fullName = $value->getClientOriginalName(); 
                    $extension = $value->getClientOriginalExtension(); 
                    $onlyName = explode('.'.$extension,$fullName); 

                    $filename = rand(1,10000) . "-" . $data['semestre'] .  "-" . str_slug($data['tipo_archivo']) . "-" . str_slug($now->format('d-m-Y H:i:s')) . "." . $extension;
                    $check=in_array($extension,$allowedfileExtension);
                    if($check)
                    {
                        $value->move('upload/' . $codigo . '/', $filename);
                        $data['file'] = $filename;
                        $data['mensual'] = 0;
                        $data['semestre'] = 1;
                        $data['slug'] = $filename;
                        $creado =  Adjunto::create($data);
                        if ($creado)
                        {
                       
                        	$this->enviar($creado, Auth::user()->email);
                            Session::flash('message-success', 'Anexo creado satisfactoriamente.');
                        }else{
                            Session::flash('message-danger', 'Error al intentar guardar el Anexo');
                        }
                    }else{
                        Session::flash('message-danger', 'Tipo de Archivo no permitido');
                    }
                }
         
            }
        return redirect()->to('/');
    }


     public function edit(Adjunto $adjunto)
     {
          return view('adjunto.edit', ['adjunto' => $adjunto]);
     }

     public function update(request $request, Adjunto $adjunto)
     {
        if($adjunto->fill($request->all())->update())
        {
            if ($request->hasfile('file'))
            {
                $now = new \DateTime();
                foreach ($request->file('file') as $key => $value)
                {

                    $fullName = $value->getClientOriginalName(); 
                    $extension = $value->getClientOriginalExtension(); 
                    $onlyName = explode('.'.$extension,$fullName); 
                    $filename = str_slug($onlyName[0]) . "-" . $data['mes'] .  "-" . str_slug($data['tipo_archivo']) . "-" . str_slug($now->format('d-m-Y H:i:s')) . "." . $extension;
                    $value->move(public_path('upload/' . $data->cooperativa->codigo . '/'), $filename);
                    $data['file'] = "upload/" . $data->cooperativa->codigo . "/" . $filename;
                }

            }
            Session::flash('message-success', 'Anexo actualizado satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar actualizar el Anexo');
        }


        return redirect()->route('home');
     }

    public function destroy(Adjunto $adjunto)
    {
        
        if (Adjunto::where('slug' , $adjunto->slug)->delete())
        {
            if(file_exists('upload/' . $adjunto->cooperativa->codigo . '/' . $adjunto->file))
            {
                unlink('upload/' . $adjunto->cooperativa->codigo . '/' . $adjunto->file);
            }else{
                dd('El archivo no existe.');
            }
            Session::flash('message-success', 'Anexo Eliminado satisfactoriamente.');
        }else{
            Session::flash('message-danger', 'Error al intentar eliminar el Anexo');
        }
        return redirect()->route('home');
    }

    

    private function enviar($data, $email)
    {
        \Mail::Send('emails.nuevoArchivo',['nombre'=>'Carga de nuevo Archivo', 'data'=>$data],function($message) use ($email){
            $message->from('desarrollostello@gmail.com', 'Nuevo archivo subido a Calidad');
            $message->to('desarrollostello@gmail.com')->subject('Sistema Calidad - Archivo subido');
        });
    }
    

}
