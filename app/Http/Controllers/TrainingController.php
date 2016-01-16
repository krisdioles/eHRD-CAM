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

    	return view('pages/training/index');
    }

    public function getData()
    {
        if(\Auth::user()->idpegawai==1)
        {
            $training = Training::oldest('tgltraining')->get();
        }
        else
        {
            $training = Training::select('*')
                ->join('pegawai_training', 'training.idtraining', '=', 'pegawai_training.training_id')
                ->where('pegawai_training.pegawai_id', '=', \Auth::user()->idpegawai)
                ->get();
        }
        //dd($training);
        
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

    public function delete($idtraining)
    {
        $training=Training::findOrFail($idtraining);
        
        return view('pages/training/delete', compact('training'));
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

        flash()->overlay('Data training berhasil ditambahkan!');

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

        flash()->overlay('Data training berhasil diubah!');

        return redirect('training');
    }

    public function destroy(Training $training)
    {
        // delete
        $training->delete();

        // redirect
        flash()->overlay('Data training berhasil dihapus!');
        return redirect('training');
    }
}
