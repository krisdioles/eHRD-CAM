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
        if(\Auth::user()->idpegawai==1)
        {
            $cuti = \App\Cuti::where('status', 'Pending')->count();

            $lembur = \App\Lembur::where('status', 'Pending')->count();
        }
        else
        {
            $cuti = \App\Cuti::where('tglawal', '>', Carbon::now())
                ->where('status', 'Accepted')
                ->where('pegawai_id', \Auth::user()->idpegawai)
                ->count();

            $lembur = \App\Lembur::where('tgllembur', '>', Carbon::now()->subWeek())
                ->where('tgllembur', '<', Carbon::now())
                ->whereRaw('status = "Accepted" OR status = "Declined"')
                ->where('pegawai_id', \Auth::user()->idpegawai)
                ->count();

            $training = \Auth::user()->training()->future()->count();
        }
        
        return view('pages/dashboard/dashboard', compact('cuti', 'lembur', 'training'));
    }

    public function detail()
    {
        $pegawai=\Auth::user();

        return view('pages/dashboard/detailprofil', compact('pegawai'));
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