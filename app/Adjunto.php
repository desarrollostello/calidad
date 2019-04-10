<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adjunto extends Model
{
  /**
   * Setea la Tabla a la que pertenece el modelo
   *
   * @var string
   */
    protected $table = 'adjunto';
    protected $dates = ['created_at','updated_at'];

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
   * Asignación masiva de atributos para la insecion
   *
   * @var array
   */
    protected $fillable = [
        'cooperativa_id',
        'user_id',
        'mes',
        'anio',
        'tipo_archivo',
        'file',
        'slug',
        'mensual',
        'semestre'
    ];

    // Tipo Archivo puede ser Reclamo Energia o el otro que no se como se llama de los 3
    /**
   * Normaliza y setea el nombre y el slug del Archivo
   *
   * @param $val
   */
    public function setFileAttribute($val)
    {
        $this->attributes['file'] = trim($val);
        $this->attributes['slug'] = str_slug($val) . "-" . rand(0,10000);
    }


    public function cooperativa()
    {
        return $this->belongsTo('App\Cooperativa', 'cooperativa_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
