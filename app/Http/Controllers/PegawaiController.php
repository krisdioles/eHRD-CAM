<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pegawai;

class PegawaiController extends Controller
{
    public function index()
    {
    	$peg = Pegawai::all();

    	return view('pages/dashboard', compact('peg'));
    }
}