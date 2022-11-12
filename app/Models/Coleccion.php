<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coleccion extends Model
{
    use SoftDeletes;
    protected $table = 'colecciones';
    protected $primaryKey = 'id';
    // protected $with = ['productos'];
    use HasFactory;

    public function productos(){
        return $this->hasMany('App\Models\Producto','id_coleccion');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
