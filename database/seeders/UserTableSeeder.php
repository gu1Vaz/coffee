<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            ['name'=>'Giu do Graaul','email'=>'c@gmail.com','password'=>Hash::make("12345678"),'cidade'=>'Belem','rua'=>'baianos','nrua'=>55,'cep'=>33000]
        );
    }
}
