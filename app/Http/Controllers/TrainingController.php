<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Training;

class TrainingController extends Controller
{
    public function index()
    {
    	$train = Training::all();

    	return view('pages/training/index', compact('train'));
    }

    public function create()
    {
    	return view('pages/training/create');
    }
}
