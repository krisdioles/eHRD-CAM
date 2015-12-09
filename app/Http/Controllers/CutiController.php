<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cuti;
use App\Http\Requests\CutiRequest;
use yajra\Datatables\Datatables;
use Carbon\Carbon;

class CutiController extends Controller
{
    public function getIndex()
    {
        // if(\Auth::user()->idpegawai==1)
        // {
        //     $cuti = Cuti::oldest('tglawal')->future()->get();  
        // }
        // else
        // {
        //     $cuti = \Auth::user()->cuti;
        // }

        return view('pages/cuti/index');
    	
    }

    public function getData()
    {
        if(\Auth::user()->idpegawai==1)
        {
            $cuti = Cuti::join('pegawai', 'cuti.pegawai_id', '=', 'pegawai.idpegawai')
                ->select(['cuti.idcuti', 'cuti.jeniscuti', 'cuti.tglawal', 'cuti.tglakhir', 'cuti.status', 'pegawai.nama'])
                ->future()->get();    
        }
        else
        {
            $cuti = \Auth::user()->cuti;
        }

        return Datatables::of($cuti)
            ->editColumn('tglawal', function ($cuti) {
                return $cuti->tglawal ? with(new Carbon($cuti->tglawal))->format('d-m-Y') : '';
            })
            ->editColumn('tglakhir', function ($cuti) {
                return $cuti->tglakhir ? with(new Carbon($cuti->tglakhir))->format('d-m-Y') : '';
            })
            ->addColumn('action', function ($cuti) {
                return view('pages.cuti.action', compact('cuti'))->render();
            })
            ->make(true);
    }

        

    public function show(Cuti $cuti)
    {
        return view('pages/cuti/show', compact('cuti'));
    }

    public function create()
    {
    	return view('pages/cuti/create');
    }

    public function store(CutiRequest $request)
    {
    	\Auth::user()->cuti()->create($request->all());

        flash()->success('Cuti telah terdaftar!');

    	return redirect('cuti');
    }

    public function edit(Cuti $cuti)
    {
        //dd($cuti);
        //$cuti=Cuti::findOrFail($idcuti);

        return view('pages/cuti/edit', compact('cuti'));
    }

    public function update(Cuti $cuti, CutiRequest $request)
    {
        $cuti->update($request->all());

        flash()->success('Cuti berhasil diubah!');

        return redirect('cuti');
    }

    public function destroy(Cuti $cuti)
    {
        //$cuti=Cuti::findOrFail($idcuti);

        // delete
        $cuti->delete();

        // redirect
        flash()->success('Cuti berhasil dihapus!');
        return redirect('cuti');
    }

    public function accept($idcuti)
    {
        $cuti=Cuti::findOrFail($idcuti);
        $cuti->status = 'Accepted';
        $cuti->save();

        flash()->success('Cuti berhasil diberikan!');

        return redirect('cuti');
    }

    public function decline($idcuti)
    {
        $cuti=Cuti::findOrFail($idcuti);
        $cuti->status = 'Declined';
        $cuti->save();

        flash()->success('Cuti telah ditolak!');

        return redirect('cuti');
    }
}
