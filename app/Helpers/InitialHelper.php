<?php

define('ROLE_ADMIN', 1);
define('ROLE_CALON', 2);
define('ROLE_UMKM', 3);
define('ROLE_PENDAMPING', 4);

define('SUKSES', 'sukses');
define('GAGAL', 'gagal');

if (!function_exists('legalitas')) {
	function legalitas() {
		return [
			'PT',
			'Koperasi',
			'Yayasan',
			'Perkumpulan',
			'Perguruan Tinggi',
			'Lainnya',
		];
	}
}

if (!function_exists('pendidikan')) {
	function pendidikan() {
		return [
			'Diploma', 'S1', 'S2', 'S3',
		];
	}
}

if (!function_exists('skala_usaha')) {
	function skala_usaha() {
		return [
			'Mikro', 'Kecil', 'Menengah',
		];
	}
}

if (!function_exists('jangkauan_pemasaran')) {
	function jangkauan_pemasaran() {
		return [
			'Lokal Provinsi', 'Nasional', 'Ekspor',
		];
	}
}

if (!function_exists('rating')) {
	function rating($value) {
		$rating = 0;
		if ($value > 0 && $value <= 10) {
			$rating = 1;
		} elseif ($value > 10 && $value <= 30) {
			$rating = 2;
		} elseif ($value > 30 && $value <= 60) {
			$rating = 3;

		} elseif ($value > 60 && $value <= 100) {
			$rating = 4;
		} elseif ($value > 100) {
			$rating = 5;
		}
		return $rating;
	}
}
