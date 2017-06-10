<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([        
            'name' => 'Super Umkm',
            'email' => 'super@umkmnaikkelas.com',
            'password' => bcrypt('umkm1234'),            
            'role_id' => 1,
        ]);
    }
}
