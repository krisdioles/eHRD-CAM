<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Pegawai;
use yajra\Datatables\Datatables;
use Carbon\Carbon;

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
     * Datatables Detail Profile
     */
    public function getIndex()
    {
        return view('pages/dashboard/detailprofil');
    }

    public function getLembur()
    {
        $cuti = \Auth::user()->cuti;

        $lembur = \Auth::user()->lembur;

        $training = \Auth::user()->training;

        return Datatables::of($lembur)
            ->editColumn('tgllembur', function ($lembur) {
                return $lembur->tgllembur ? with(new Carbon($lembur->tgllembur))->format('d-m-Y') : '';
            })
            ->make(true);
    }

    public function getCuti()
    {
        $cuti = \Auth::user()->cuti;

        return Datatables::of($cuti)
            ->editColumn('tglawal', function ($cuti) {
                return $cuti->tglawal ? with(new Carbon($cuti->tglawal))->format('d-m-Y') : '';
            })
            ->editColumn('tglakhir', function ($cuti) {
                return $cuti->tglakhir ? with(new Carbon($cuti->tglakhir))->format('d-m-Y') : '';
            })
            ->make(true);
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