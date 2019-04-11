<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
	        'name' => 'Administracion NIPSA',
	        'email'=>'administrador@nipsa.es',
	        'password' => Hash::make('secret'),
	    ]);
        User::create([
            'name' => 'Endesa',
            'email'=>'endesa@nipsa.es',
            'password' => Hash::make('secret$password'),
        ]);
    }	
}
