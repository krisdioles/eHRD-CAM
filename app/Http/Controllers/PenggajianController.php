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

        return view('pages/penggajian/index', compact('penggajian'));
    }

    public function getData()
    {
        // $penggajian = DB::table('pegawai')->join('penggajian', 'penggajian.pegawai_id', '=', 'pegawai.idpegawai')
        //     ->selectRaw('*, pegawai.gajipokok + pegawai.tunjangantetap + penggajian.biayabonus - penggajian.biayapotongan AS jumlahpenggajian')
        //     ->where('penggajian.idpenggajian', '=', function($query){
        //         $query->selectRaw('max(penggajian.idpenggajian)')
        //             ->from('penggajian')
        //             ->whereRaw('penggajian.pegawai_id = pegawai.idpegawai');
        //         }
        //     );

        if(\Auth::user()->idpegawai==1)
        {
            $penggajian=Penggajian::select('*')
                        ->join('pegawai', 'penggajian.pegawai_id', '=', 'pegawai.idpegawai');
        }
        else
        {
            $penggajian = \Auth::user()->penggajian;
        }
    
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

    public function delete($idpenggajian)
    {
        $penggajian=Penggajian::findOrFail($idpenggajian);
        
        return view('pages/penggajian/delete', compact('penggajian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Penggajian $penggajian)
    {
        $pegawai=\App\Pegawai::active()->lists('nama', 'idpegawai');

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

        $pegawai=$penggajian->pegawai;

        $penggajian->jumlahpenggajian=$pegawai->gajipokok + $pegawai->tunjangantetap + $penggajian->biayabonus - $penggajian->biayapotongan;
        $penggajian->save();
        //dd($penggajian->jumlahpenggajian);
        flash()->overlay('Data penggajian berhasil ditambahkan!');

        return redirect('penggajian');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  penggajian  $penggajian
     * @return Response
     */
    public function edit(Penggajian $penggajian)
    {
        $pegawai=\App\Pegawai::active()->lists('nama', 'idpegawai');
        
        return view('pages/penggajian/edit', compact('penggajian', 'pegawai'));
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

        flash()->overlay('Data penggajian berhasil diubah!');

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
        //dd($penggajian);

        if($pegawai->penggajian->last()!=$pegawai->penggajian->first())
        {
            // delete
            $penggajian->delete();

            flash()->overlay('Data penggajian berhasil dihapus!');
        }
        else
        {
            flash()->overlay('Data penggajian tidak bisa dihapus!');
        }

        // redirect
        return redirect('penggajian');
    }
}
