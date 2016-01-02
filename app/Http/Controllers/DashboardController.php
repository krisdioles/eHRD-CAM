<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Pegawai;
use Input;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $cuti = \Auth::user()->cuti->where('status', 'Accepted')->where('pegawai_id', \Auth::user()->idpegawai)->count();

        $lembur = \Auth::user()->lembur->where('status', 'Accepted')->where('pegawai_id', \Auth::user()->idpegawai)->count();

        $training = \Auth::user()->training->count();

        //dd($training);
        return view('pages/dashboard/dashboard', compact('cuti', 'lembur', 'training'));
    }

    /**
     * Show the form for uploading a new photo.
     *
     * @return Response
     */
    public function upload()
    {
        $pegawai = \Auth::user();

        return view('pages/dashboard/upload', compact('pegawai'));
    }
}