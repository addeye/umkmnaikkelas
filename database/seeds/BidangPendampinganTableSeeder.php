<?php

use Illuminate\Database\Seeder;

class BidangPendampinganTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bidang_pendampingan')->insert([
            'nama' => 'Kelembagaan',
        ]);
        DB::table('bidang_pendampingan')->insert([
            'nama' => 'SDM',
        ]);
        DB::table('bidang_pendampingan')->insert([
            'nama' => 'Produksi',
        ]);
        DB::table('bidang_pendampingan')->insert([
            'nama' => 'Pembiayaan',
        ]);
        DB::table('bidang_pendampingan')->insert([
            'nama' => 'Pemasaran',
        ]);
        DB::table('bidang_pendampingan')->insert([
            'nama' => 'IT dan Kerjasama',
        ]);
        DB::table('bidang_pendampingan')->insert([
            'nama' => 'Bidang Pendampingan Lainnya',
        ]);
    }
}
