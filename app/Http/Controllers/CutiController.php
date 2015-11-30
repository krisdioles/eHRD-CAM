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
            $cuti = Cuti::oldest('tglpengajuan')->future()->get();  
        }
        else
        {
            $cuti = \Auth::user()->cuti()->future1()->get();
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
    	Cuti::create($request->all());

    	return redirect('cuti');
    }

    public function edit(Cuti $cuti)
    {
        return view('pages/cuti/edit', compact('cuti'));
    }

    public function update(Cuti $cuti, CutiRequest $request)
    {
        $cuti->update($request->all());

        return redirect('cuti');
    }

    public function destroy(Cuti $cuti)
    {
        // delete
        $cuti->delete();

        // redirect
        //Session::flash('message', 'Successfully deleted the cuti!');
        return redirect('cuti');
    }

    public function accept(Cuti $cuti)
    {
        $cuti->status = 'Accepted';
        $cuti->save();

        return redirect('cuti');
    }
}
