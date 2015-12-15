<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Absensi;
use yajra\Datatables\Datatables;
use Carbon\Carbon;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        return view('pages/absensi/index');
    }

    public function getData()
    {
        $absensi = Absensi::select('*')
            ->join('pegawai', 'absensi.pegawai_id', '=', 'pegawai.idpegawai');

        return Datatables::of($absensi)
            ->editColumn('waktupulang', function ($pegawai) {
                return $pegawai->waktupulang ? with(new Carbon($pegawai->waktupulang)) : '';
            })
            ->make(true);
    }

    public function masuk()
    {
        $absensi=new Absensi;
        //$absensi->waktumasuk=Carbon::now();
        $absensi->pegawai_id=\Auth::user()->idpegawai;
        $absensi->waktumasuk=Carbon::now();

        if(Carbon::now()->hour>8)
        {
            $absensi->statusmasuk='Terlambat';
        }
        else
        {
            $absensi->statusmasuk='Tepat Waktu';
        }

        $absensi->save();

        flash()->overlay('Absen Sukses!');

        return redirect('absensi');
    }

    public function pulang()
    {
        $absensi=\Auth::user()->absensi->first();
        //dd(\Auth::user()->absensi->first()->waktumasuk->hour);
        $absensi->waktupulang=Carbon::now();

        if(Carbon::now()->hour>17)
        {
            $absensi->statuspulang='Tepat Waktu';
        }
        else
        {
            $absensi->statuspulang='Pulang Cepat';
        }

        $absensi->save();

        flash()->overlay('Absen Sukses!');

        return redirect('absensi');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
