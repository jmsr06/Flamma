<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use SoftDeletes;
    protected $table = 'productos';
    protected $primaryKey = 'referencia';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $with = ['imagenProductos','tallas'];
    //valores por defecto
    // protected $attributes = [
    //     'delayed' => false,
    // ];
    use HasFactory;

    public function imagenProductos(){
        return $this->hasMany('App\Models\ImagenProducto','referencia')
                    ->orderBy('prioridad','asc');
    }

    public function categoria(){
        return $this->belongsTo('App\Models\Categoria','id_categoria');
    }

    public function coleccion(){
        return $this->belongsTo('App\Models\Coleccion','id_coleccion');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function tallas(){
        return $this->belongsToMany('App\Models\Talla','talla_productos','referencia_producto','id_talla')
                    ->using('App\Models\TallaProducto')
                    ->as('tallaProducto')
                    ->withPivot('stock','estado')
                    ->withTimestamps();
    }
}
