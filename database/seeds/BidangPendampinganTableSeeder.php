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
        for($a=1; $a<=10; $a++) {
            DB::table('bidang_pendampingan')->insert([
                'nama' => str_random(10),
            ]);
        }
    }
}
