<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AbsensiRequest;
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
        if(\Auth::user()->idpegawai==1)
        {
            $absensi = Absensi::select('*')
                ->join('pegawai', 'absensi.pegawai_id', '=', 'pegawai.idpegawai')
                ;
        }
        else
        {
            $absensi = \Auth::user()->absensi;
        }

        return Datatables::of($absensi)
            ->editColumn('waktupulang', function ($absensi) {
                return $absensi->waktupulang ? with(new Carbon($absensi->waktupulang)) : '';
            })
            ->editColumn('waktumasuk', function ($absensi) {
                return $absensi->waktumasuk ? with(new Carbon($absensi->waktumasuk)) : '';
            })
            ->addColumn('action', function ($absensi) {
                return view('pages.absensi.action', compact('absensi'))->render();
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
        $absensi=\Auth::user()->absensi->last();
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($idabsensi)
    {
        $absensi=Absensi::findOrFail($idabsensi);
        
        return view('pages/absensi/show', compact('absensi'));
    }

    public function delete($idabsensi)
    {
        $absensi=Absensi::findOrFail($idabsensi);
        
        return view('pages/absensi/delete', compact('absensi'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Absensi $absensi)
    {
        // delete
        $absensi->delete();

        // redirect
        flash()->overlay('Absensi berhasil dihapus!');
        return redirect('absensi');
    }

    public function edit(Absensi $absensi)
    {
        return view('pages/absensi/edit', compact('absensi'));
    }

    public function update(Absensi $absensi, AbsensiRequest $request)
    {
        $absensi->update($request->all());

        flash()->overlay('Absensi berhasil diubah!');

        return redirect('absensi');
    }
}
