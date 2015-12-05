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
          <th></th>
        </tr>
      </thead>
      <tbody>

          @foreach($pegawai as $pegawai)
              <tr>
                <td>{{ $pegawai->kodepegawai }}</td>
                <td><a href="{{ url('/penilaian/'.$pegawai->idpegawai.'/create') }}">{{ $pegawai->nama }}</td>
                <td>{{ $pegawai->penilaian->last()->nilaikompetensi }}</td>
                <td>{{ $pegawai->penilaian->last()->nilaikedisiplinan }}</td>
                <td>{{ $pegawai->penilaian->last()->nilaiperilaku }}</td>
                <td>{{ $pegawai->penilaian->last()->keterangan }}</td>
                
                @unless($pegawai->penilaian->last()==$pegawai->penilaian->first())
                  <td width="5">
                    {!! Form::open(['method' => 'DELETE', 'route' => ['penilaian.destroy', $pegawai->penilaian->last()->idpenilaian]]) !!}
                        <button class="btn-xs btn-link" type="submit">Delete</button>
                    {!! Form::close() !!}
                  </td>
                @else
                  <td width="5">
                      <button class="btn-xs btn-link" type="submit" disabled="disabled">Delete</button>
                @endunless

              </tr>
          @endforeach

      </tbody>
    </table>

    @if(Auth::user()->idpegawai==1)
      <a class="btn btn-default" href="{{ url('/penilaian/create') }}" role="button">Create</a>
    @endif
    
  </div>
</div>