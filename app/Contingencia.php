<?php

namespace App;

use App\CausaContingencia;
use App\CodigoElemento;
use App\TipoElemento;
use App\Cooperativa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Contingencia extends Model
{
    protected $table = 'contingencia';

    protected $dates = ['created_at', 'updated_at'];
    

    protected $fillable = [
        'nombre',
        'tipoElemento_id',
        'codigoElemento_id',
        'fecha_apertura',
        'fecha_cierre',
        'codigo_elemento',
        'hora_apertura',
        'hora_cierre',
        'causaContingencia_id',
        'observaciones',
        'user_id',
        'slug'
    ];



    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function setFechaApertura($val)
    {
        $this->attributes['fecha_apertura'] = \Carbon\Carbon::parse($val)->format('d-m-Y');
    }

    /**
     * Normaliza y setea el nombre y el slug del Articulo
     *
     * @param $val
     */
    public function setNombreAttribute($val)
    {
    //	setlocale(LC_TIME, 'es_ES.UTF-8');
        $this->attributes['nombre'] = trim($val);
        $this->attributes['slug'] = str_slug($val) . "-" . rand(0,10000);

    }


    public function causa()
    {
        return $this->belongsTo('App\CausaContingencia','causaContingencia_id');

    }
    public function codigo()
    {
        return $this->belongsTo('App\CodigoElemento', 'codigoElemento_id');

    }
    public function tipo()
    {
        return $this->belongsTo('App\TipoElemento', 'tipoElemento_id');

    }

    public function usuario()
    {
        return $this->belongsTo('App\User', 'user_id');

    }
}
