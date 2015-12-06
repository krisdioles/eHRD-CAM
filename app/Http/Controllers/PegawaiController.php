<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pegawai;
use yajra\Datatables\Datatables;

class PegawaiController extends Controller
{
    public function getIndex()
    {
    	return view('pages/dashboard');
    }

    public function getData()
    {
        return Datatables::of(Pegawai::select('*'))->make(true);
    }
}