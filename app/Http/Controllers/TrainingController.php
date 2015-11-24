<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Training;

class TrainingController extends Controller
{
    public function index()
    {
    	$train = Training::latest('idtraining')->get();

    	return view('pages/training/index', compact('train'));
    }

    public function create()
    {
    	return view('pages/training/create');
    }

    public function store()
    {
    	$input=Request::all();

    	Training::create($input);

    	return redirect('training');
    }
}
