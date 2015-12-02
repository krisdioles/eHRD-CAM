@extends('app')

@include('partials.menu')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h2 class="sub-header">Penilaian</h2>
  <div class="table-responsive">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Pegawai</th>
          <th>Nilai Kompetensi</th>
          <th>Nilai Kedisiplinan</th>
          <th>Nilai Perilaku</th>
          <th>Keterangan</th>
          
          @if(Auth::user()->idpegawai==1)
            <th></th>
            <th></th>
          @endif

        </tr>
      </thead>
      <tbody>

          @foreach($penilaian as $penilaian)
          <tr>
            <td>{{ $penilaian->pegawai->idpegawai }}</td>
            <td><a href="{{ url('/penilaian/'.$penilaian->pegawai->idpegawai.'/create') }}">{{ $penilaian->pegawai->nama }}</td>
            <td>{{ $penilaian->nilaikompetensi }}</td>
            <td>{{ $penilaian->nilaikedisiplinan }}</td>
            <td>{{ $penilaian->nilaiperilaku }}</td>
            <td>{{ $penilaian->keterangan }}</td>
          </tr>
          @endforeach

      </tbody>
    </table>

    @if(Auth::user()->idpegawai==1)
      <a class="btn btn-default" href="{{ url('/penilaian/create') }}" role="button">Create</a>
    @endif
    
  </div>
</div>