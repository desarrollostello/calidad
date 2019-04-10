<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class CodigoElemento extends Model
{
    protected $table = 'codigoelemento';

    protected $fillable = [
        'nombre',
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

}
