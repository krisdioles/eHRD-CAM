<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cuti;
use App\Http\Requests\CutiRequest;

class CutiController extends Controller
{
    public function index()
    {
        if(\Auth::user()->idpegawai==1)
        {
            $cuti = Cuti::oldest('tglawal')->future()->get();  
        }
        else
        {
            $cuti = \Auth::user()->cuti;
        }

        return view('pages/cuti/index', compact('cuti'));
    	
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
