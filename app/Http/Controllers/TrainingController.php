<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Training;
use Carbon\Carbon;
use App\Http\Requests\TrainingRequest;

class TrainingController extends Controller
{
    public function index()
    {
    	$train = Training::oldest('tgltraining')->future()->get();

    	return view('pages/training/index', compact('train'));
    }

    public function show($idtraining)
    {
        $training=Training::findOrFail($idtraining);

        //dd($training->tgltraining);
        return view('pages/training/show', compact('training'));
    }

    public function create()
    {
    	return view('pages/training/create');
    }

    public function store(TrainingRequest $request)
    {
    	Training::create($request->all());

    	return redirect('training');
    }

    public function edit($idtraining)
    {
        $training=Training::findOrFail($idtraining);

        return view('pages/training/edit', compact('training'));
    }

    public function update($idtraining, TrainingRequest $request)
    {
        $training=Training::findOrFail($idtraining);

        $training->update($request->all());

        return redirect('training');
    }

    public function destroy($idtraining)
    {
        // delete
        $training = Training::find($idtraining);
        $training->delete();

        // redirect
        //Session::flash('message', 'Successfully deleted the training!');
        return redirect('training');
    }
}
