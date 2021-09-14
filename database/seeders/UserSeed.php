<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::create([
            'name'=>'Bryan Ortiz',
            'email'=> 'bryan@gmail.com',
            'password'=>Hash::make('123456789'),
            'address'=>'Luis Antonio brizon y saquisili',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $user=User::create([
            'name'=>'Keneth Ortiz',
            'email'=> 'keneth@gmail.com',
            'password'=>Hash::make('ken199907'),
            'address'=>'Sangolqui el colobri',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $user=User::create([
            'name'=>'Issis Milena',
            'email'=> 'milena@gmail.com',
            'password'=>Hash::make('milena200307'),
            'address'=>'Altos de Guamaní, colectora F',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
