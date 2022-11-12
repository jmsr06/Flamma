<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTables(['categorias','colecciones']);
        $this->call(CategoriaSeeder::class);
        $this->call(ColeccionSeeder::class);
        // \App\Models\User::factory(10)->create();
    }

    protected function truncateTables(array $tables){
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        foreach($tables as $table){
            DB::table($table)->truncate();
        }
    }
}
