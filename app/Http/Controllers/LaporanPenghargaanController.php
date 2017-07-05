<?php

namespace App\Http\Controllers;
use App\PengajuanUmkm;
use App\PengajuanPendamping;

use Illuminate\Http\Request;

class LaporanPenghargaanController extends Controller
{
    /*UMKM*/
	public function getUmkm()
	{
		return view('laporan.penghargaan_umkm');
	}

	public function getAjaxUmkm()
	{
		return array("data" => PengajuanUmkm::with('umkm')->get());
	}
	/*End*/

	/*Pendamping*/
	public function getPendamping()
	{
		return view('laporan.penghargaan_pendamping');
	}

	public function getAjaxPendamping()
	{
		return array("data" => PengajuanPendamping::with('pendamping')->get());
	}
	/*End*/
}
