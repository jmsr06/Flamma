<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderCliente extends Model
{
    protected $table = 'slider_clientes';
    protected $primaryKey = 'nombre_img';
    public $incrementing = false;
    protected $keyType = 'string';
    use HasFactory;
}
