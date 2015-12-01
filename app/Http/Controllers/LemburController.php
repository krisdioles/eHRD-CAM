<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Lembur;
use App\Http\Requests\LemburRequest;

class LemburController extends Controller
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
            $lembur = Lembur::oldest('tgllembur')->get();  
        }
        else
        {
            $lembur = \Auth::user()->lembur;
        }

        return view('pages/lembur/index', compact('lembur'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $lembur
     * @return Response
     */
    public function show(Lembur $lembur)
    {
        return view('pages/lembur/show', compact('lembur'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('pages/lembur/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(LemburRequest $request)
    {
        \Auth::user()->lembur()->create($request->all());

        flash()->overlay('Lembur telah terdaftar!');

        return redirect('lembur');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Lembur $lembur)
    {
        return view('pages/lembur/edit', compact('lembur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(LemburRequest $request, Lembur $lembur)
    {
        $lembur->update($request->all());

        flash()->overlay('Lembur berhasil diubah!');

        return redirect('lembur');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Lembur $lembur)
    {
        // delete
        $lembur->delete();

        // redirect
        flash()->overlay('Lembur berhasil dihapus!');
        return redirect('lembur');
    }

    public function accept(Lembur $lembur)
    {
        $lembur->status = 'Accepted';
        $lembur->save();

        flash()->overlay('Lembur telah diberikan!');

        return redirect('lembur');
    }
}
