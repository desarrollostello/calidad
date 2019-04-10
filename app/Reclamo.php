<?php

namespace App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Reclamo extends Model
{
    protected $table = 'reclamo';
    protected $dates = ['created_at', 'updated_at', 'fecha_hora'];
    protected $fillable = [
        'fecha_hora',
        'motivo_reclamo_id',
        'usuario_id',
        'observaciones',
        'user_id',
        'contingencia_id',
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

    public function motivo()
    {
        return $this->belongsTo('App\MotivoReclamo', 'motivo_reclamo_id');

    }
    public function usuario()
    {
        return $this->belongsTo('App\Usuario', 'usuario_id');

    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');

    }
    public function contingencia()
    {
        return $this->belongsTo('App\Contingencia', 'contingencia_id');

    }
}
