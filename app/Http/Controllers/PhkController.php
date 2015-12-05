<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Phk;
use App\Http\Requests\PhkRequest;

class PhkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $phk = phk::latest('tglphk')->get();
        
        return view('pages/phk/index', compact('phk'));
    }

    /**
     * Display the specified resource.
     *
     * @param  phk  $phk
     * @return Response
     */
    public function show(Phk $phk)
    {
        return view('pages/phk/show', compact('phk'));
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
