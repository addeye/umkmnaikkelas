<?php

use Illuminate\Database\Seeder;

class BidangKeahlianTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($a=1; $a<=10; $a++) {
            DB::table('bidang_keahlian')->insert([
                'nama' => str_random(10),
            ]);
        }
    }
}
