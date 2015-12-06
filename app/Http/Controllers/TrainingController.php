<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Training;
use App\Pegawai;
use Carbon\Carbon;
use App\Http\Requests\TrainingRequest;
use yajra\Datatables\Datatables;

class TrainingController extends Controller
{
    public function getIndex()
    {
    	//$training = Training::oldest('tgltraining')->future()->get();

    	return view('pages/training/index', compact('training'));
    }

    public function getData()
    {
        $training = Training::oldest('tgltraining')->future()->get();
        
        return Datatables::of($training)
            ->editColumn('tgltraining', function ($training) {
                return $training->tgltraining ? with(new Carbon($training->tgltraining))->format('d-m-Y') : '';
            })
            ->addColumn('action', function ($training) {
                return view('pages.training.action', compact('training'))->render();
            })
            ->make(true);
    }

    public function show($idtraining)
    {
        $training=Training::findOrFail($idtraining);

        return view('pages/training/show', compact('training'));
    }

    public function create()
    {
        $peg=Pegawai::lists('nama', 'idpegawai');

    	return view('pages/training/create', compact('peg'));
    }

    public function store(TrainingRequest $request)
    {
     	$training=Training::create($request->all());
        $training->pegawai()->attach($request->input('pegawai_list'));

        flash()->info('Training berhasil disimpan!');

    	return redirect('training');
    }

    public function edit(Training $training)
    {
        $peg=Pegawai::lists('nama', 'idpegawai');

        return view('pages/training/edit', compact('training', 'peg'));
    }

    public function update(Training $training, TrainingRequest $request)
    {
        $training->update($request->all());
        $training->pegawai()->sync($request->input('pegawai_list'));

        flash()->info('Training berhasil diubah!');

        return redirect('training');
    }

    public function destroy(Training $training)
    {
        // delete
        $training->delete();

        // redirect
        flash()->info('Training berhasil dihapus!');
        return redirect('training');
    }
}
