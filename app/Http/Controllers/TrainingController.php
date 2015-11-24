<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Training;
use Carbon\Carbon;

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

    public function store()
    {
    	Training::create(Request::all());

    	return redirect('training');
    }
}
