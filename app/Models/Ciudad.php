<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = 'ciudades';
    protected $primaryKey = 'id';
    use HasFactory;

    public function departamento(){
        return $this->belongsTo('App\Models\Departamento','id_departamento');
    }
}
