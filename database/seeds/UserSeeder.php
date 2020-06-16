<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Johnny Doe',
            'email' => 'admin@admin.com',
            'age' => 24,
            'password' => Hash::make('123456789'),
        ]);
    }
}
