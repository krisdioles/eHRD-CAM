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
        if(\Auth::user()->idpegawai==1)
        {
            $penilaian = Penilaian::all();
            $pegawai = \App\Pegawai::all();
        }
        else
        {
            $penilaian = \Auth::user()->penilaian;
        }

        return view('pages/penilaian/index', compact('penilaian', 'pegawai'));
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
    public function create()
    {
        return view('pages/penilaian/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(PenilaianRequest $request)
    {
        \Auth::user()->penilaian()->create($request->all());

        flash()->overlay('Penilaian telah terdaftar!');

        return redirect('penilaian');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Penilaian  $penilaian
     * @return Response
     */
    public function edit(Penilaian $penilaian)
    {
        return view('pages/penilaian/edit', compact('penilaian'));
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
