<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pegawai;
use yajra\Datatables\Datatables;
use Carbon\Carbon;

class PegawaiController extends Controller
{
    public function getIndex()
    {
    	return view('pages/pegawai/index');
    }

    public function getData()
    {
    	$pegawai = Pegawai::select('*');

        return Datatables::of($pegawai)
        	->editColumn('tgllahir', function ($pegawai) {
                return $pegawai->tgllahir ? with(new Carbon($pegawai->tgllahir))->format('d-m-Y') : '';
            })
        	->addColumn('action', function ($pegawai) {
                return view('pages.pegawai.action', compact('pegawai'))->render();
            })
        	->make(true);
    }

    public function edit(Pegawai $pegawai)
    {
        //dd($idpegawai);
        //$pegawai=pegawai::findOrFail($idpegawai);

        return view('pages/pegawai/edit', compact('pegawai'));
    }

    public function update(Pegawai $pegawai, Request $request)
    {
        $pegawai->update($request->all());

        $imageName = $pegawai->kodepegawai . '.' . 
            $request->file('foto')->getClientOriginalExtension();

        $request->file('foto')->move(
            base_path() . '/public/images/', $imageName
        );

        flash()->success('Pegawai berhasil diubah!');

        if(\Auth::user()->idpegawai==1)
        {
            return redirect('pegawai');
        }
        else
        {
            return redirect('dashboard');
        }
        
    }

    public function destroy(Pegawai $pegawai)
    {
        //$pegawai=pegawai::findOrFail($idpegawai);

        // delete
        $pegawai->delete();

        // redirect
        flash()->success('Pegawai berhasil dihapus!');
        return redirect('pegawai');
    }
}