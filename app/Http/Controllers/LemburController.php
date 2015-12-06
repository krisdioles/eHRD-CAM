<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Lembur;
use App\Http\Requests\LemburRequest;
use yajra\Datatables\Datatables;
use Carbon\Carbon;

class LemburController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        // if(\Auth::user()->idpegawai==1)
        // {
        //     $lembur = Lembur::latest('tgllembur')->get();
        // }
        // else
        // {
        //     $lembur = \Auth::user()->lembur;
        // }

        return view('pages/lembur/index', compact('lembur'));
    }

    public function getData()
    {
        if(\Auth::user()->idpegawai==1)
        {
            $lembur = Lembur::join('pegawai', 'lembur.pegawai_id', '=', 'pegawai.idpegawai')
                ->select(['lembur.idlembur', 'lembur.tgllembur', 'lembur.jangkawaktu', 'lembur.keterangan', 'lembur.status', 'pegawai.nama'])
                ->future()->get();

            return Datatables::of($lembur)
            ->editColumn('tgllembur', function ($lembur) {
                return $lembur->tgllembur ? with(new Carbon($lembur->tgllembur))->format('d-m-Y') : '';
            })
            ->make(true);
    
        }
        else
        {
            $lembur = \Auth::user()->lembur;

            return Datatables::of($lembur)
            ->editColumn('tgllembur', function ($lembur) {
                return $lembur->tgllembur ? with(new Carbon($lembur->tgllembur))->format('d-m-Y') : '';
            })
            ->addColumn('action', function ($lembur) {
                return view('pages.lembur.action', compact('lembur'))->render();
            })
            ->make(true);
        }
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

        flash()->success('Lembur telah terdaftar!');

        return redirect('lembur');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Lembur  $lembur
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
     * @param  Lembur  $lembur
     * @return Response
     */
    public function update(LemburRequest $request, Lembur $lembur)
    {
        $lembur->update($request->all());

        flash()->success('Lembur berhasil diubah!');

        return redirect('lembur');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Lembur  $lembur
     * @return Response
     */
    public function destroy(Lembur $lembur)
    {
        // delete
        $lembur->delete();

        // redirect
        flash()->success('Lembur berhasil dihapus!');
        return redirect('lembur');
    }

    public function accept($idlembur)
    {
        $lembur=Lembur::findOrFail($idlembur);
        $lembur->status = 'Accepted';
        $lembur->save();

        flash()->success('Lembur telah diberikan!');

        return redirect('lembur');
    }

    public function decline($idlembur)
    {
        $lembur=Lembur::findOrFail($idlembur);
        $lembur->status = 'Declined';
        $lembur->save();

        flash()->success('Lembur telah ditolak!');

        return redirect('lembur');
    }
}
