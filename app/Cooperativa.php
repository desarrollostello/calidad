<?php

namespace App;

use App\Localidad;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Cooperativa extends Model
{
    protected $table = 'cooperativa';

    protected $fillable = [
        'codigo',
        'nombre',
        'domicilio',
        'email',
        'user_id',
        'localidad_id',
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

    /**
     * Normaliza y setea el nombre y el slug del Articulo
     *
     * @param $val
     */
    public function setNombreAttribute($val)
    {
    //	setlocale(LC_TIME, 'es_ES.UTF-8');
        $this->attributes['nombre'] = trim($val);
        $this->attributes['slug'] = str_slug($val) . "-" . rand(5,10);

    }


    public function localidad()
    {
        return $this->belongsTo('App\Localidad', 'localidad_id');

    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');

    }
}
