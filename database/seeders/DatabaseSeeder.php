<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\AdminToken;
use App\Models\Merchant;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        AdminToken::create([
            'token' => 'admin'
        ]);
        User::create([
            'name' => 'raihan',
            'username'=> 'raihanputra',
            'email'=> 'raihanpd93@gmail.com',
            'password'=> bcrypt('1234567'),
            
        ]);
        // User::create([
        //     'name' => 'admin',
        //     'username'=> 'admin',
        //     'email'=> 'admin@gmail.com',
        //     'password'=> bcrypt('1234567'),
        //     'isadmin'=> true
        // ]);
    }
}
