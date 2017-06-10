<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
        	'id'	=> 1,
            'nama' => 'Super Admin'
        ]);

        DB::table('roles')->insert([
        	'id'	=> 2,
            'nama' => 'Calon'
        ]);
        DB::table('roles')->insert([
        	'id'	=> 3,
            'nama' => 'Umkm'
        ]);
        DB::table('roles')->insert([
        	'id'	=> 4,
            'nama' => 'Pendamping'
        ]);
    }
}
