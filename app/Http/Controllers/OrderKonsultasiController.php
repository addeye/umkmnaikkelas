<?php

namespace App\Http\Controllers;

use App\OrderKonsultasi;
use Illuminate\Http\Request;

class OrderKonsultasiController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view('konsultasi.list');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('konsultasi.add');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\OrderKonsultasi  $orderKonsultasi
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		return view('konsultasi.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\OrderKonsultasi  $orderKonsultasi
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		return view('konsultasi.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\OrderKonsultasi  $orderKonsultasi
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\OrderKonsultasi  $orderKonsultasi
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}
}
