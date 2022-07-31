<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(FornecedorTableSeeder::class);
        //$this->call(ProdutosTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
