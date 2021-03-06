<?php

namespace App\Http\Controllers;

use App\BidangKeahlian;
use App\BidangPendampingan;
use App\BidangUsaha;
use App\JasaPendampingan;
use App\Lembaga;
use App\Pendamping;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class PendampingController extends Controller {
	public function index() {
		$data['data'] = Pendamping::all();
		return view('pendamping.list', $data);
	}

	public function create() {
		$data = [
			'BdPendampingan' => BidangPendampingan::all(),
			'BdKeahlian' => BidangKeahlian::all(),
			'BdUsaha' => BidangUsaha::all(),
			'lembaga' => Lembaga::orderBy('id_lembaga', 'ASC')->get(),
		];
		return view('pendamping.add', $data);
	}

	public function store(Request $request) {
		$rules = [
			'id_pendamping' => 'required|numeric|digits:9',
			'nama_pendamping' => 'required',
			'alamat_domisili' => 'required',
			'jenis_kelamin' => 'required',
			'telp' => 'required|numeric',
			'deskripsi' => 'required',
			'email' => 'required|email|unique:users',
			'pendidikan' => 'required',
			'tahun_mulai' => 'required',
			'pengalaman' => 'nullable',
			'sertifikat' => 'nullable',
			'bidang_pendampingan' => 'required',
			'bidang_keahlian' => 'required',
			'bidang_usaha' => 'required',
			'kabkota_id' => 'required',
			'kabkota_tambahan' => 'nullable',
			'lembaga_id' => 'required',
			'foto_ktp' => 'nullable|image|mimes:jpeg,jpg,png|max:300',
		];

		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
			\Alert::error('Tolong isi dengan benar', 'Kesalahan !');
			return redirect()->route('pendamping.create')
				->withErrors($validator)
				->withInput();
		}

		$user = new User();
		$user->name = $request->nama_pendamping;
		$user->email = $request->email;
		$user->password = bcrypt('password');
		$user->image = 'default.png';
		$user->telp = $request->telp;
		$user->role_id = ROLE_PENDAMPING;
		$user->save();

		$pendamping = new Pendamping();
		$pendamping->id_pendamping = $request->id_pendamping;
		$pendamping->nama_pendamping = $request->nama_pendamping;
		$pendamping->alamat_domisili = $request->alamat_domisili;
		$pendamping->lat = 0;
		$pendamping->lng = 0;
		$pendamping->jenis_kelamin = $request->jenis_kelamin;
		$pendamping->telp = $request->telp;
		$pendamping->email = $request->email;
		$pendamping->deskripsi = $request->deskripsi;
		$pendamping->pendidikan = $request->pendidikan;
		$pendamping->tahun_mulai = $request->tahun_mulai;
		$pendamping->pengalaman = $request->pengalaman;
		$pendamping->sertifikat = $request->sertifikat;
		if ($request->has('bidang_pendampingan')) {
			$pendamping->bidang_pendampingan = implode(", ", $request->bidang_pendampingan);
		}

		if ($request->has('bidang_keahlian')) {
			$pendamping->bidang_keahlian = implode(", ", $request->bidang_keahlian);
		}

		if ($request->has('bidang_usaha')) {
			$pendamping->bidang_usaha = implode(", ", $request->bidang_usaha);
		}

		$pendamping->kabkota_id = $request->kabkota_id;
		if ($request->has('kabkota_tambahan')) {
			$pendamping->kabkota_tambahan = implode(", ", $request->kabkota_tambahan);
		}

		$pendamping->lembaga_id = $request->lembaga_id;
		$pendamping->validasi = 0;
		$pendamping->user_id = $user->id;

		if ($request->hasFile('foto_ktp')) {
			$file = Input::file('foto_ktp');
			$name = $this->upload_image($file, 'uploads/pendamping/images');
			$pendamping->foto_ktp = $name;
		}

		$pendamping->save();

	}

	public function show($id) {
		$pendampingan = Pendamping::find($id);
		$kabkota_tambahan = explode(", ", $pendampingan->kabkota_tambahan);
		$data = [
			'data' => $pendampingan,
			'kabkota_tambahan_arr' => $kabkota_tambahan,
			'jasapendampingan' => JasaPendampingan::where('pendamping_id', $pendampingan->id)->get(),
		];
		return view('pendamping.show', $data);
	}

	public function edit($id) {
		$pendamping = Pendamping::find($id);
		$data = [
			'BdPendampingan' => BidangPendampingan::all(),
			'BdKeahlian' => BidangKeahlian::all(),
			'BdUsaha' => BidangUsaha::all(),
			'lembaga' => Lembaga::orderBy('id_lembaga', 'ASC')->get(),
			'data' => $pendamping,
			'bd_keahlian_arr' => explode(", ", $pendamping->bidang_keahlian),
			'bd_pendampingan_arr' => explode(", ", $pendamping->bidang_pendampingan),
			'bd_usaha_arr' => explode(", ", $pendamping->bidang_usaha),
			'kab_tambahan_arr' => explode(", ", $pendamping->kabkota_tambahan),
		];
		return view('pendamping.edit', $data);
	}

	public function update(Request $request, $id) {
		$rules = [
			'id_pendamping' => 'required|numeric',
			'nama_pendamping' => 'required',
			'alamat_domisili' => 'required',
			'jenis_kelamin' => 'required',
			'telp' => 'required|numeric',
			'email' => 'required|email',
			'pendidikan' => 'required',
			'tahun_mulai' => 'required',
			'pengalaman' => 'nullable',
			'sertifikat' => 'nullable',
			'bidang_pendampingan' => 'required',
			'bidang_keahlian' => 'required',
			'bidang_usaha' => 'nullable',
			'kabkota_id' => 'required',
			'kabkota_tambahan' => 'nullable',
			'lembaga_id' => 'required',
			'foto_ktp' => 'nullable|image|mimes:jpeg,jpg,png|max:300',
			'image' => 'nullable|image|mimes:jpeg,jpg,png|max:300',
		];

		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
			\Alert::error('Tolong isi dengan benar', 'Kesalahan !');
			return redirect()->route('pendamping.edit', ['id' => $id])
				->withErrors($validator)
				->withInput();
		}

		$pendamping = Pendamping::find($id);
		$pendamping->id_pendamping = $request->id_pendamping;
		$pendamping->nama_pendamping = $request->nama_pendamping;
		$pendamping->alamat_domisili = $request->alamat_domisili;
		$pendamping->lat = 0;
		$pendamping->lng = 0;
		$pendamping->jenis_kelamin = $request->jenis_kelamin;
		$pendamping->telp = $request->telp;
		$pendamping->email = $request->email;
		$pendamping->deskripsi = $request->deskripsi;
		$pendamping->pendidikan = $request->pendidikan;
		$pendamping->tahun_mulai = $request->tahun_mulai;
		$pendamping->pengalaman = $request->pengalaman;
		$pendamping->sertifikat = $request->sertifikat;
		if ($request->has('bidang_pendampingan')) {
			$pendamping->bidang_pendampingan = implode(", ", $request->bidang_pendampingan);
		}

		if ($request->has('bidang_keahlian')) {
			$pendamping->bidang_keahlian = implode(", ", $request->bidang_keahlian);
		}

		if ($request->has('bidang_usaha')) {
			$pendamping->bidang_usaha = implode(", ", $request->bidang_usaha);
		}

		$pendamping->kabkota_id = $request->kabkota_id;
		if ($request->has('kabkota_tambahan')) {
			$pendamping->kabkota_tambahan = implode(", ", $request->kabkota_tambahan);
		}
		$pendamping->lembaga_id = $request->lembaga_id;

		if ($request->hasFile('foto_ktp')) {
			$file = Input::file('foto_ktp');
			$name = $this->upload_image($file, 'uploads/pendamping/images', $pendamping->foto_ktp);
			$pendamping->foto_ktp = $name;
		}

		$pendamping->save();

		$user = User::find($pendamping->user_id);
		$user->email = $request->email;
		$user->save();

		if ($pendamping) {
			\Alert::success('Data berhasil diupdate', 'Selamat !');
			return redirect()->route('pendamping.index');
		}
	}

	public function destroy($id) {
		$pendamping = Pendamping::find($id);
		$this->delete_image('uploads/pendamping/images', $pendamping->foto_ktp);

		$pendamping->delete();

		if ($pendamping) {
			\Alert::success('Data berhasil dihapus', 'Delete !')->persistent("Tutup");
			return redirect()->route('pendamping.index');
		}
	}

	public function import(Request $request) {
		$insertuser = 0;
		$rules = [
			'file' => 'required',
		];

		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
			\Alert::error('Tolong isi dengan benar', 'Kesalahan !')->persistent("Tutup");
			return redirect()->route('pendamping.create')
				->withErrors($validator)
				->withInput();
		}

		if (Input::hasFile('file')) {
			$path = Input::file('file')->getRealPath();
			$data = Excel::load($path, function ($reader) {

			})->get();

			if (!empty($data) && $data->count()) {
				foreach ($data as $key => $value) {

					$user = new User();
					$user->name = $value->nama_pendamping;
					$user->email = $value->email;
					$user->telp = $value->telp;
					$user->role_id = ROLE_PENDAMPING;
					$user->password = bcrypt('password');
					$user->save();

					if ($user) {
						$insertuser++;
						$pendamping = new Pendamping();
						$pendamping->id_pendamping = $value->id_pendamping;
						$pendamping->nama_pendamping = $value->nama_pendamping;
						$pendamping->alamat_domisili = $value->alamat_domisili;
						$pendamping->lat = 0;
						$pendamping->lng = 0;
						$pendamping->jenis_kelamin = 'L';
						$pendamping->pendidikan = 'S1';
						$pendamping->telp = $value->telp;
						$pendamping->email = $value->email;
						$pendamping->pengalaman = $value->pengalaman;
						$pendamping->lembaga_id = $value->lembaga_id;
						$pendamping->user_id = $user->id;
						$pendamping->save();
					}

				}
			}

			\Alert::success('Data berhasil Masuk ' . $insertuser . ' Record', 'Selamat !')->persistent("Tutup");

		} else {
			\Alert::error('Tolong pastikan file sudah benar', 'Kesalahan !')->persistent("Tutup");
		}

		return redirect()->route('pendamping.index');

	}

	public function importExistData(Request $request) {
		$insertuser = 0;
		$rules = [
			'file' => 'required',
		];

		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
			\Alert::error('Tolong isi dengan benar', 'Kesalahan !')->persistent("Tutup");
			return redirect()->route('pendamping.create')
				->withErrors($validator)
				->withInput();
		}

		if (Input::hasFile('file')) {
			$path = Input::file('file')->getRealPath();
			$data = Excel::load($path, function ($reader) {

			})->get();

			if (!empty($data) && $data->count()) {
				foreach ($data as $key => $value) {

					$insertuser++;
					$pendamping = new Pendamping();
					$pendamping->id_pendamping = $value->id_pendamping;
					$pendamping->nama_pendamping = $value->nama_pendamping;
					$pendamping->alamat_domisili = $value->alamat_domisili;
					$pendamping->lat = 0;
					$pendamping->lng = 0;
					$pendamping->jenis_kelamin = 'L';
					$pendamping->pendidikan = 'S1';
					$pendamping->telp = $value->telp;
					$pendamping->email = $value->email;
					$pendamping->pengalaman = $value->pengalaman;
					$pendamping->lembaga_id = $value->lembaga_id;
					$pendamping->user_id = $value->user_id;
					$pendamping->save();

					$user = User::find($value->user_id);
					$user->role_id = 4;
					$user->save();

				}
			}

			\Alert::success('Data berhasil Masuk ' . $insertuser . ' Record', 'Selamat !')->persistent("Tutup");

		} else {
			\Alert::error('Tolong pastikan file sudah benar', 'Kesalahan !')->persistent("Tutup");
		}

		return redirect()->route('pendamping.index');

	}

	public function validasi(Request $request, $id) {
		$data = Pendamping::find($id);
		$data->validasi = $request->status;
		$data->save();
		if ($data) {
			echo "pendamping updated";
		}
	}
}
