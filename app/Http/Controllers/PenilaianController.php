<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Penilaian;
use App\Http\Requests\PenilaianRequest;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $pegawai = \App\Pegawai::all();

        return view('pages/penilaian/index', compact('pegawai'));
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

        flash()->overlay('Penilaian telah terdaftar!');

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

        flash()->overlay('Penilaian berhasil diubah!');

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
        // delete
        $penilaian->delete();

        // redirect
        flash()->overlay('Penilaian berhasil dihapus!');
        return redirect('penilaian');
    }
}
