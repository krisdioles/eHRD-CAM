<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pelanggaran;
use App\Http\Requests\PelanggaranRequest;

class PelanggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $pelanggaran = Pelanggaran::latest('tglpelanggaran')->get();
        

        return view('pages/pelanggaran/index', compact('pelanggaran'));
    }

    /**
     * Display the specified resource.
     *
     * @param  pelanggaran  $pelanggaran
     * @return Response
     */
    public function show(Pelanggaran $pelanggaran)
    {
        return view('pages/pelanggaran/show', compact('pelanggaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $pegawai=\App\Pegawai::lists('nama', 'idpegawai');

        return view('pages/pelanggaran/create', compact('pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(PelanggaranRequest $request)
    {
        $pelanggaran=Pelanggaran::create($request->all());

        flash()->success('Pelanggaran telah terdaftar!');

        return redirect('pelanggaran');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  pelanggaran  $pelanggaran
     * @return Response
     */
    public function edit(Pelanggaran $pelanggaran)
    {
        $pegawai=\App\Pegawai::lists('nama', 'idpegawai');

        return view('pages/pelanggaran/edit', compact('pelanggaran', 'pegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  pelanggaran  $pelanggaran
     * @return Response
     */
    public function update(PelanggaranRequest $request, Pelanggaran $pelanggaran)
    {
        $pelanggaran->update($request->all());

        flash()->success('Pelanggaran berhasil diubah!');

        return redirect('pelanggaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  pelanggaran  $pelanggaran
     * @return Response
     */
    public function destroy(Pelanggaran $pelanggaran)
    {
        // delete
        $pelanggaran->delete();

        // redirect
        flash()->success('Pelanggaran berhasil dihapus!');
        return redirect('pelanggaran');
    }
}
