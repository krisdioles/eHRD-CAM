<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Phk;
use App\Http\Requests\PhkRequest;
use yajra\Datatables\Datatables;
use Carbon\Carbon;

class PhkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        //$phk = phk::latest('tglphk')->get();
        
        return view('pages/phk/index');
    }

    public function getData()
    {
        $phk = Phk::join('pegawai', 'phk.pegawai_id', '=', 'pegawai.idpegawai')
            ->select(['phk.idphk', 'phk.nomorsurat', 'phk.tglphk', 'phk.jenisphk', 'phk.keterangan', 'pegawai.nama']);
        
        return Datatables::of($phk)
            ->editColumn('tglphk', function ($phk) {
                return $phk->tglphk ? with(new Carbon($phk->tglphk))->format('d-m-Y') : '';
            })
            ->addColumn('action', function ($phk) {
                return view('pages.phk.action', compact('phk'))->render();
            })
            ->make(true);
    }

    /**
     * Display the specified resource.
     *
     * @param  phk  $phk
     * @return Response
     */
    public function show($idphk)
    {
        $phk=Phk::findOrFail($idphk);

        return view('pages/phk/show', compact('phk'));
    }

    public function delete($idphk)
    {
        $phk=Phk::findOrFail($idphk);
        
        return view('pages/phk/delete', compact('phk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $pegawai=\App\Pegawai::lists('nama', 'idpegawai');

        return view('pages/phk/create', compact('pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(PhkRequest $request)
    {
        $phk=Phk::create($request->all());

        flash()->success('Phk telah terdaftar!');

        return redirect('phk');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  phk  $phk
     * @return Response
     */
    public function edit(Phk $phk)
    {
        $pegawai=\App\Pegawai::lists('nama', 'idpegawai');

        return view('pages/phk/edit', compact('phk', 'pegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  phk  $phk
     * @return Response
     */
    public function update(PhkRequest $request, Phk $phk)
    {
        $phk->update($request->all());

        flash()->success('Phk berhasil diubah!');

        return redirect('phk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  phk  $phk
     * @return Response
     */
    public function destroy(Phk $phk)
    {
        // delete
        $phk->delete();

        // redirect
        flash()->success('Phk berhasil dihapus!');
        return redirect('phk');
    }
}
