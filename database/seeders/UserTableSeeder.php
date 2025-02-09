<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //admin
        $user = User::create([
              'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345678'),
                'role'=> 'admin'
            ]);
        //merchant
        $user = User::create([
            'name' => 'merchant',
            'email' => 'merchant@gmail.com',
            'password' => bcrypt('12345678'),
            'role'=> 'merchant'
        ]);
    }
}
