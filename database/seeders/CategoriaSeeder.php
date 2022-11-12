<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            'nombre' => 'T-shirt & tops',
            'slug' => str_replace(" ", "-", 'T-shirt & tops'),
            'imagen' => 't-shirt.jpg',
            'descripcion_img' => Str::random(30),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('categorias')->insert([
            'nombre' => 'Pants & shorts',
            'slug' => str_replace(" ", "-", 'Pants & shorts'),
            'imagen' => 'pants.jpg',
            'descripcion_img' => Str::random(30),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('categorias')->insert([
            'nombre' => 'Accesories',
            'slug' => str_replace(" ", "-", 'Accesories'),
            'imagen' => 'accesories.jpg',
            'descripcion_img' => Str::random(30),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('categorias')->insert([
            'nombre' => 'Bucket hats & balaclava',
            'slug' => str_replace(" ", "-", 'Bucket hats & balaclava'),
            'imagen' => 'bucket.jpg',
            'descripcion_img' => Str::random(30),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('categorias')->insert([
            'nombre' => 'Hoodies',
            'slug' => str_replace(" ", "-", 'Hoodies'),
            'imagen' => 'hoodies.jpg',
            'descripcion_img' => Str::random(30),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
