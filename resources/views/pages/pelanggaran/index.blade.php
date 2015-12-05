@extends('app')

@include('partials.menu')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h2 class="sub-header">Pelanggaran</h2>
  <div class="table-responsive">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Pegawai</th>
          <th>Tanggal Pelanggaran</th>
          <th>Jenis Pelanggaran</th>
          <th>Sanksi</th>
          <th>Keterangan</th>
          
          @if(Auth::user()->idpegawai==1)
            <th></th>
            <th></th>
          @endif

        </tr>
      </thead>
      <tbody>
        
        @foreach($pelanggaran as $pelanggaran)
          <tr>
            <td>{{ $pelanggaran->pegawai->kodepegawai }}</td>
            <td>{{ $pelanggaran->pegawai->nama }}</td>
            <td>{{ $pelanggaran->tglpelanggaran->toDateString() }}</td>
            <td>{{ $pelanggaran->jenispelanggaran }}</td>
            <td>{{ $pelanggaran->sanksi }}</td>
            <td>{{ $pelanggaran->keterangan }}</td>
            <td width="5">
                <form action="{{ url('/pelanggaran/'.$pelanggaran->idpelanggaran.'/edit') }}">
                    <button class="btn-xs btn-link" type="submit">Edit</button>
                </form>
            </td>
            <td width="5">
                {!! Form::open(['method' => 'DELETE', 'route' => ['pelanggaran.destroy', $pelanggaran->idpelanggaran]]) !!}
                    <button class="btn-xs btn-link" type="submit">Delete</button>
                {!! Form::close() !!}
            </td>
          </tr>
        @endforeach        

      </tbody>
    </table>

    @if(Auth::user()->idpegawai==1)
      <a class="btn btn-default" href="{{ url('/pelanggaran/create') }}" role="button">Create</a>
    @endif
    
  </div>
</div>