<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cupon extends Model
{
    protected $table = 'cupones';
    protected $primaryKey = 'id';
    use HasFactory;
}
