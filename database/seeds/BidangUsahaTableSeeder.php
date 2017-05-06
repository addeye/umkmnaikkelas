<?php

use Illuminate\Database\Seeder;

class BidangUsahaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bidang_usaha')->insert([
            'nama' => 'Pertanian, Peternakan, Kehutanan, Perikanan',
        ]);
        DB::table('bidang_usaha')->insert([
            'nama' => 'Perdagangan, Hotel dan Restoran',
        ]);
        DB::table('bidang_usaha')->insert([
            'nama' => 'Pengangkutan & Komunikasi',
        ]);
        DB::table('bidang_usaha')->insert([
            'nama' => 'Listrik, Gas, Air',
        ]);
        DB::table('bidang_usaha')->insert([
            'nama' => 'Indusri Pengolahan',
        ]);
        DB::table('bidang_usaha')->insert([
            'nama' => 'Bangunan',
        ]);
        DB::table('bidang_usaha')->insert([
            'nama' => 'Pertambangan',
        ]);
        DB::table('bidang_usaha')->insert([
            'nama' => 'Jasa Swasta',
        ]);
        DB::table('bidang_usaha')->insert([
            'nama' => 'Jasa Lainnya',
        ]);
    }
}
