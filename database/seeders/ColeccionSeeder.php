<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ColeccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colecciones')->insert([
            'nombre' => 'Básicos',
            'slug' => str_replace(" ", "-", 'Básicos'),
            'imagen' => 'basicos.jpg',
            'descripcion_img' => Str::random(30),
            'fecha_lanzamiento' => date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('colecciones')->insert([
            'nombre' => 'Nuevos',
            'slug' => str_replace(" ", "-", 'Nuevos'),
            'imagen' => 'nuevos.jpg',
            'descripcion_img' => Str::random(30),
            'fecha_lanzamiento' => date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
