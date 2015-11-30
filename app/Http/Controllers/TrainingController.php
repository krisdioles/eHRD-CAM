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
    	$training = Training::oldest('tgltraining')->future()->get();

    	return view('pages/training/index', compact('training'));
    }

    public function show(Training $training)
    {
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

    public function edit(Training $training)
    {

        return view('pages/training/edit', compact('training'));
    }

    public function update(Training $training, TrainingRequest $request)
    {
        $training->update($request->all());

        return redirect('training');
    }

    public function destroy(Training $training)
    {
        // delete
        $training->delete();

        // redirect
        //Session::flash('message', 'Successfully deleted the training!');
        return redirect('training');
    }
}
