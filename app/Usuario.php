<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
  /**
   * Setea la Tabla a la que pertenece el modelo
   *
   * @var string
   */
    protected $table = 'usuario';
    protected $dates = ['deleted_at'];

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
          'nombre',
          'domicilio_calle',
          'domicilio_altura',
          'cooperativa_id',
          'ubicacion',
          'telefono',
          'observaciones',
          'slug'
    ];
    /**
   * Normaliza y setea el nombre y el slug del Archivo
   *
   * @param $val
   */
    public function setNombreAttribute($val)
    {
        $this->attributes['nombre'] = trim($val);
        $this->attributes['slug'] = str_slug($val). "-" . rand(5,10);
    }

    public function getNombreAttribute()
    {
        return strtoupper($this->attributes['nombre']);
    }

    /**
     * Retorna la Provincia a la que pertenece la Localidad
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cooperativa()
    {
        return $this->belongsTo('App\Cooperativa', 'cooperativa_id');
    }
}
