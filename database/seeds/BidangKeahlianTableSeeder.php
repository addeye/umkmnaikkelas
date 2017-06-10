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
        DB::table('bidang_keahlian')->insert([
            'nama' => 'Konsultan',
        ]);
        DB::table('bidang_keahlian')->insert([
            'nama' => 'Fasilisator',
        ]);
        DB::table('bidang_keahlian')->insert([
            'nama' => 'Coach',
        ]);
        DB::table('bidang_keahlian')->insert([
            'nama' => 'Mentor',
        ]);
        DB::table('bidang_keahlian')->insert([
            'nama' => 'Trainer',
        ]);
        DB::table('bidang_keahlian')->insert([
            'nama' => 'Bidang Keahlian Lainnya',
        ]);
    }
}
