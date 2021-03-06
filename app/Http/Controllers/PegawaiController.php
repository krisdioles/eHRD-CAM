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

    /**
     * Display the specified resource.
     *
     * @param  pegawai  $pegawai
     * @return Response
     */
    public function show($idpegawai)
    {
        $pegawai=Pegawai::findOrFail($idpegawai);
        
        return view('pages/pegawai/show', compact('pegawai'));
    }

    public function delete($idpegawai)
    {
        $pegawai=Pegawai::findOrFail($idpegawai);
        
        return view('pages/pegawai/delete', compact('pegawai'));
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

        flash()->overlay('Data pegawai berhasil diubah!');

        if(\Auth::user()->idpegawai==1)
        {
            return redirect('pegawai');
        }
        else
        {
            if( $request->hasFile('foto'))
            {
                $imageName = $pegawai->kodepegawai . '.' . 
                    $request->file('foto')->getClientOriginalExtension();

                $request->file('foto')->move(
                    base_path() . '/public/images/', $imageName
                );
            }

            return redirect('dashboard');
        }
        
    }

    public function destroy(Pegawai $pegawai)
    {
        //$pegawai=pegawai::findOrFail($idpegawai);

        // delete
        $pegawai->delete();

        // redirect
        flash()->overlay('Data pegawai berhasil dihapus!');
        return redirect('pegawai');
    }
}