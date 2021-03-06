<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(RolesTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(BidangUsahaTableSeeder::class);
        $this->call(BidangPendampinganTableSeeder::class);
        $this->call(BidangKeahlianTableSeeder::class);
        $this->call(LembagaTableSeeder::class);
    }
}
