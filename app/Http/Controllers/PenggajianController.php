<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Penggajian;
use App\Http\Requests\PenggajianRequest;
use yajra\Datatables\Datatables;
use Carbon\Carbon;
use DB;

class PenggajianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        //$pegawai = \App\Pegawai::all();

        return view('pages/penggajian/index');
    }

    public function getData()
    {
        $penggajian = DB::table('pegawai')->join('penggajian', 'penggajian.pegawai_id', '=', 'pegawai.idpegawai')
            ->selectRaw('*, pegawai.gajipokok + pegawai.tunjangantetap + penggajian.biayabonus - penggajian.biayapotongan AS jumlahpenggajian')
            ->where('penggajian.idpenggajian', '=', function($query){
                $query->selectRaw('max(penggajian.idpenggajian)')
                    ->from('penggajian')
                    ->whereRaw('penggajian.pegawai_id = pegawai.idpegawai');
                }
            );
    
        return Datatables::of($penggajian)
            ->editColumn('tglpenggajian', function ($penggajian) {
                return $penggajian->tglpenggajian ? with(new Carbon($penggajian->tglpenggajian))->format('d-m-Y') : '';
            })
            ->editColumn('periodepenggajian', function ($penggajian) {
                return $penggajian->periodepenggajian ? with(new Carbon($penggajian->periodepenggajian))->format('F Y') : '';
            })
            ->addColumn('action', function ($penggajian) {
                return view('pages.penggajian.action', compact('penggajian'))->render();
            })
            ->make(true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $penggajian
     * @return Response
     */
    public function show($idpenggajian)
    {
        $penggajian=Penggajian::findOrFail($idpenggajian);
        
        return view('pages/penggajian/show', compact('penggajian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Penggajian $penggajian, $idpegawai)
    {
        $pegawai=\App\Pegawai::lists('nama', 'idpegawai');

        return view('pages/penggajian/create', compact('pegawai', 'penggajian', 'idpegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(PenggajianRequest $request)
    {
        $penggajian=Penggajian::create($request->all());

        flash()->overlay('Penggajian telah terdaftar!');

        return redirect('penggajian');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(PenggajianRequest $request, Penggajian $penggajian)
    {
        $penggajian->update($request->all());

        flash()->overlay('Penggajian berhasil diubah!');

        return redirect('penggajian');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Penggajian $penggajian)
    {
        $pegawai = \App\Pegawai::findOrFail($penggajian->pegawai_id);
        

        if($pegawai->penggajian->last()!=$pegawai->penggajian->first())
        {
            // delete
            $penggajian->delete();

            flash()->overlay('Penggajian berhasil dihapus!');
        }
        else
        {
            flash()->overlay('Penggajian tidak bisa dihapus!');
        }

        // redirect
        return redirect('penggajian');
    }
}
