<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pelanggaran;
use App\Http\Requests\PelanggaranRequest;
use yajra\Datatables\Datatables;
use Carbon\Carbon;

class PelanggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        //$pelanggaran = Pelanggaran::latest('tglpelanggaran')->get();
        
        return view('pages/pelanggaran/index');
    }

    public function getData()
    {
        $pelanggaran = Pelanggaran::join('pegawai', 'pelanggaran.pegawai_id', '=', 'pegawai.idpegawai')
            ->select(['pelanggaran.idpelanggaran', 'pelanggaran.tglpelanggaran', 'pelanggaran.jenispelanggaran', 'pelanggaran.keterangan', 'pelanggaran.sanksi', 'pegawai.nama']);
        
        return Datatables::of($pelanggaran)
            ->editColumn('tglpelanggaran', function ($pelanggaran) {
                return $pelanggaran->tglpelanggaran ? with(new Carbon($pelanggaran->tglpelanggaran))->format('d-m-Y') : '';
            })
            ->addColumn('action', function ($pelanggaran) {
                return view('pages.pelanggaran.action', compact('pelanggaran'))->render();
            })
            ->make(true);
    }

    /**
     * Display the specified resource.
     *
     * @param  pelanggaran  $pelanggaran
     * @return Response
     */
    public function show($idpelanggaran)
    {
        $pelanggaran=Pelanggaran::findOrFail($idpelanggaran);
        
        return view('pages/pelanggaran/show', compact('pelanggaran'));
    }

    public function delete($idpelanggaran)
    {
        $pelanggaran=Pelanggaran::findOrFail($idpelanggaran);
        
        return view('pages/pelanggaran/delete', compact('pelanggaran'));
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

        flash()->overlay('Data pelanggaran berhasil ditambahkan!');

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

        flash()->overlay('Data pelanggaran berhasil diubah!');

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
        flash()->overlay('Data pelanggaran berhasil dihapus!');
        return redirect('pelanggaran');
    }
}
