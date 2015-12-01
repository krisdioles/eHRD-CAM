@extends('app')

@include('partials.menu')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h2 class="sub-header">Penggajian</h2>
  <div class="table-responsive">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Pegawai</th>
          <th>Tanggal Awal</th>
          <th>Tanggal Akhir</th>
          <th>Status</th>

          @if(Auth::user()->idpegawai==1)
            <th>Diajukan Oleh</th>
          @endif

          <th></th>

          @if(Auth::user()->idpegawai!=1)
            <th></th>
          @endif

        </tr>
      </thead>
      <tbody>

      @foreach($penggajian as $penggajian)
        <tr height="2px">
          <td>{{ $penggajian->idpenggajian }}</td>
          <td><a href="{{ url('/penggajian', $penggajian->idpenggajian) }}">{{ $penggajian->jenispenggajian }}</td>
          <td>{{ $penggajian->tglawal->toDateString() }}</td>
          <td>{{ $penggajian->tglakhir->toDateString() }}</td>
          <td>{{ $penggajian->status }}</td>

          @if(Auth::user()->idpegawai!=1)
            <td width="5">
                <form action="{{ url('/penggajian/'.$penggajian->idpenggajian.'/edit') }}">
                    <button class="btn-xs btn-link" type="submit">Edit</button>
                </form>
            </td>
            <td width="5">
                {!! Form::open(['method' => 'DELETE', 'route' => ['penggajian.destroy', $penggajian->idpenggajian]]) !!}
                    <button class="btn-xs btn-link" type="submit">Delete</button>
                {!! Form::close() !!}
            </td>
          @else
            <td>{{ $penggajian->pegawai->nama }}</td>
            <td width="5">
                <form action="{{ url('/penggajian/'.$penggajian->idpenggajian.'/accept') }}">
                    <button class="btn-xs btn-link" type="submit">Accept</button>
                </form>
            </td>
          @endif

        </tr>
      @endforeach

      </tbody>
    </table>

    @if(Auth::user()->idpegawai!=1)
      <a class="btn btn-default" href="{{ url('/penggajian/create') }}" role="button">Create</a>
    @endif
    
  </div>
</div>