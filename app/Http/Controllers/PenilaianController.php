<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Penilaian;
use App\Http\Requests\PenilaianRequest;
use yajra\Datatables\Datatables;
use Carbon\Carbon;
use DB;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        //$pegawais = \App\Pegawai::all();
        // $pegawais->setPath('penilaian');
        //dd(\App\Pegawai::first()->penilaian->last());

        return view('pages/penilaian/index');
    }

    public function getData()
    {
        $penilaian = DB::table('pegawai')->join('penilaian', 'penilaian.pegawai_id', '=', 'pegawai.idpegawai')
            ->selectRaw('*')
            ->where('penilaian.idpenilaian', '=', function($query){
                $query->selectRaw('max(penilaian.idpenilaian)')
                    ->from('penilaian')
                    ->whereRaw('penilaian.pegawai_id = pegawai.idpegawai');
                }
            );
    
        return Datatables::of($penilaian)
            ->editColumn('tglpenilaian', function ($penilaian) {
                return $penilaian->tglpenilaian ? with(new Carbon($penilaian->tglpenilaian))->format('d-m-Y') : '';
            })
            ->addColumn('action', function ($penilaian) {
                return view('pages.penilaian.action', compact('penilaian'))->render();
            })
            ->make(true);
    }

    /**
     * Display the specified resource.
     *
     * @param  Penilaian  $penilaian
     * @return Response
     */
    public function show(Penilaian $penilaian)
    {
        return view('pages/penilaian/show', compact('penilaian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Penilaian $penilaian, $idpegawai)
    {
        $pegawai=\App\Pegawai::all();
        //dd(\App\Pegawai::find($idpegawai)->idpegawai);

        return view('pages/penilaian/create', compact('penilaian', 'pegawai', 'idpegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(PenilaianRequest $request)
    {
        $penilaian=Penilaian::create($request->all());

        flash()->success('Penilaian telah terdaftar!');

        return redirect('penilaian');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Penilaian  $penilaian
     * @return Response
     */
    public function update(PenilaianRequest $request, Penilaian $penilaian)
    {
        $penilaian->update($request->all());

        flash()->success('Penilaian berhasil diubah!');

        return redirect('penilaian');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Penilaian  $penilaian
     * @return Response
     */
    public function destroy(Penilaian $penilaian)
    {

        $pegawai = \App\Pegawai::findOrFail($penilaian->pegawai_id);
        

        if($pegawai->penilaian->last()!=$pegawai->penilaian->first())
        {
            // delete
            $penilaian->delete();

            flash()->success('Penilaian berhasil dihapus!');
        }
        flash()->overlay('Penilaian tidak bisa dihapus!');

        // redirect
        return redirect('penilaian');
    }
}
