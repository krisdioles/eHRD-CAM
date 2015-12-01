<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Penggajian;
use App\Http\Requests\CutiRequest;

class PenggajianController extends Controller
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
            $penggajian = Penggajian::latest('tglpenggajian')->get();
        }
        else
        {
            $penggajian = \Auth::user()->penggajian;
        }

        return view('pages/penggajian/index', compact('penggajian'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $penggajian
     * @return Response
     */
    public function show(Penggajian $penggajian)
    {
        return view('pages/penggajian/show', compact('penggajian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('pages/penggajian/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(PenggajianRequest $request)
    {
        \Auth::user()->penggajian()->create($request->all());

        flash()->overlay('Penggajian telah terdaftar!');

        return redirect('penggajian');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Penggajian $penggajian)
    {
        return view('pages/penggajian/edit', compact('penggajian'));
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
        // delete
        $penggajian->delete();

        // redirect
        flash()->overlay('Penggajian berhasil dihapus!');
        return redirect('penggajian');
    }
}
