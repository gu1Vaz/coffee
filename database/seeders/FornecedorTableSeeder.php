<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fornecedor;
use Illuminate\Support\Facades\Hash;

class FornecedorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fornecedor::create(
            ['name'=>'Tupa','email'=>'g9@gmail.com','password'=>Hash::make("12345678")]
        );
    }
}
