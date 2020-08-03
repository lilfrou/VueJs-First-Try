<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 30; $i++) {
            User::create([
                'name' => Str::random(10),
                'email' =>  Str::random(10) . '@gmail.com',
                'password' =>Hash::make('password'),
                'image' => 'http://via.placeholder.com/150x150'
            ]);
        }
    }
}
