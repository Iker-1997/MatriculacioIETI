<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
  		DB::table('users')->truncate();

  		DB::table('users')->insert([
    		'name' => 'admin',
    		'email' => 'admin@gmail.com',
    		'email_verified_at'=> 'admin@gmail.com',
    		'role' => 'admin',
    		'password' => Hash::make('password'),
  		]);
  		DB::table('users')->insert([
    		'name' => 'alumne',
    		'email' => 'alumne@gmail.com',
    		'email_verified_at' => 'alumne@gmail.com',
    		'role' => 'seller',
    		'password' => Hash::make('password'),
    	]);
}

}
