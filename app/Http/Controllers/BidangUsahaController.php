<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BidangUsahaController extends Controller
{
    public function index()
    {
    	return view('bidang_usaha.list');
    }

    public function create()
    {
    	
    }

    public function store(Request $request)
    {
    	# code...
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
    	# code...
    }

    public function update(Request $request,$id)
    {
    	# code...
    }

    public function destroy($id)
    {
    	# code...
    }
}
