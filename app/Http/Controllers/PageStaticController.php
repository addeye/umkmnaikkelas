<?php

namespace App\Http\Controllers;

use App\PageStatic;
use Illuminate\Http\Request;

class PageStaticController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$data = array(
			'data' => PageStatic::all(),
		);
		return view('page_static.list', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('page_static.add');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		// return $request->all();
		$page = new PageStatic();
		$page->title = $request->title;
		$page->topic = $request->topic;
		$page->content = $request->content;
		$page->slug = str_slug($request->title);
		$page->save();

		if ($page) {
			\Alert::success('Data berhasil disimpan', 'Selamat !');
			return redirect()->route('page_static.index');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\PageStatic  $pageStatic
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$data = array(
			'data' => PageStatic::find($id),
		);
		return view('page_static.view', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\PageStatic  $pageStatic
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$data = array(
			'data' => PageStatic::find($id),
		);
		return view('page_static.edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\PageStatic  $pageStatic
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$page = PageStatic::find($id);
		$page->title = $request->title;
		$page->topic = $request->topic;
		$page->content = $request->content;
		$page->slug = str_slug($request->title);
		$page->save();

		if ($page) {
			\Alert::success('Data berhasil disimpan', 'Selamat !');
			return redirect()->route('page_static.show', ['id' => $id]);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\PageStatic  $pageStatic
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$page = PageStatic::find($id);

		$page->delete();

		if ($page) {
			\Alert::success('Data berhasil dihapus', 'Delete !');
			return redirect()->route('page_static.index');
		}
	}
}
