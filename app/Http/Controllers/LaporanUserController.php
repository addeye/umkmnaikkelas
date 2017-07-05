<?php

namespace App\Http\Controllers;
use App\User;
use App\Pendamping;
use App\Umkm;

use Illuminate\Http\Request;

class LaporanUserController extends Controller
{
	public function index(Request $request)
	{
		if($request->has('role_id'))
		{
			if($request->role_id==0)
			{
				$user = User::paginate();
			}
			else
			{
				$user = User::where('role_id',$request->role_id)->paginate();
			}			
		}
		else
		{
			$user = User::paginate();
		}

		
		$userow = User::all();

		$data = array(
			'data' => $user,
			'total_user' => $user->total(),
			'total_pendamping' => $userow->where('role_id',ROLE_PENDAMPING)->count(),
			'total_umkm' => $userow->where('role_id',ROLE_UMKM)->count(),
			'total_calon' => $userow->where('role_id',ROLE_CALON)->count(),
			'total_admin' => $userow->where('role_id',ROLE_ADMIN)->count()
			);		
		
		return view('laporan.user',$data);
	}

	public function getAjax()
	{
		return array("data" => User::with('role')->get());
	}

	/*Pendamping*/

	public function listPendamping()
	{
		$pendampingan = collect(Pendamping::all());
		$data = array(
			'total_pendamping' => $pendampingan->count(),
			);
		return view('laporan.pendamping',$data);
	}

	public function getAjaxPendamping()
	{
		return array("data" => Pendamping::with('lembaga')->get());
	}
	/*End*/

	/*UMKM*/
	public function listUmkm()
	{
		return view('laporan.umkm');
	}

	public function getAjaxUmkm()
	{
		return array("data" => Umkm::with('bidang_usaha')->get());
	}
	/*End*/
}
