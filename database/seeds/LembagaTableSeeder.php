<?php

use Illuminate\Database\Seeder;

class LembagaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lembaga')->insert([
            'id_lembaga' => '123456789',
            'nama_lembaga' => 'Peac Bromo',
            'legalitas' => 'PT',
            'alamat' => '-',
            'kab_id' => '1101',
            'telp' => '0',
            'email' => 'pp@gmail.com',
            'website' => 'peacbromo.co.id',
            'pimpinan' => '-',
            'layanan' => '-',
            'foto_kantor' => 'default.png',
            'profil_doc' => 'default.docx',
            'status' => 'Anggota ABDSI'
        ]);

        DB::table('lembaga')->insert([
            'id_lembaga' => '123456781',
            'nama_lembaga' => 'ABDSI',
            'legalitas' => 'PT',
            'alamat' => '-',
            'kab_id' => '1101',
            'telp' => '0',
            'email' => 'abdsi@gmail.com',
            'website' => 'abdsi.id',
            'pimpinan' => '-',
            'layanan' => '-',
            'foto_kantor' => 'default.png',
            'profil_doc' => 'default.docx',
            'status' => 'Anggota ABDSI'
        ]);

        DB::table('lembaga')->insert([
            'id_lembaga' => '123456782',
            'nama_lembaga' => 'CIS SMESCO',
            'legalitas' => 'PT',
            'alamat' => '-',
            'kab_id' => '1101',
            'telp' => '0',
            'email' => 'cis@gmail.com',
            'website' => 'cis-nasional.id',
            'pimpinan' => '-',
            'layanan' => '-',
            'foto_kantor' => 'default.png',
            'profil_doc' => 'default.docx',
            'status' => 'Anggota ABDSI'
        ]);
    }
}
