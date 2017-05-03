<?php 

define('ROLE_ADMIN', 1);
define('ROLE_CALON',2);
define('ROLE_UMKM',3);
define('ROLE_PENDAMPING',4);

if(!function_exists('legalitas'))
{
    function legalitas()
    {
        return [
            'PT',
            'Koperasi',
            'Yayasan',
            'Perkumpulan',
            'Perguruan Tinggi',
            'Lainnya'
        ];
    }
}

if(!function_exists('pendidikan'))
{
    function pendidikan()
    {
        return [
            'Diploma','S1','S2','S3'
        ];
    }
}

