@extends('app')

@include('partials.menu')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h2 class="sub-header">Lembur</h2>
  <div class="table-responsive">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Tanggal Lembur</th>
          <th>Jangka Waktu</th>
          <th>Status</th>
          <th>Keterangan</th>

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

      @foreach($lembur as $lembur)
        <tr height="2px">
          <td>{{ $lembur->idlembur }}</td>
          <td><a href="{{ url('/lembur', $lembur->idlembur) }}">{{ $lembur->tgllembur->toDateString() }}</td>
          <td>{{ $lembur->jangkawaktu }}</td>
          <td>{{ $lembur->status }}</td>
          <td>{{ $lembur->keterangan }}</td>

          @if(Auth::user()->idpegawai!=1)
            <td width="5">
                <form action="{{ url('/lembur/'.$lembur->idlembur.'/edit') }}">
                    <button class="btn-xs btn-link" type="submit">Edit</button>
                </form>
            </td>
            <td width="5">
                {!! Form::open(['method' => 'DELETE', 'route' => ['lembur.destroy', $lembur->idlembur]]) !!}
                    <button class="btn-xs btn-link" type="submit">Delete</button>
                {!! Form::close() !!}
            </td>
          @else
            <td>{{ $lembur->pegawai->nama }}</td>
            <td width="5">
                <form action="{{ url('/lembur/'.$lembur->idlembur.'/accept') }}">
                    <button class="btn-xs btn-link" type="submit">Accept</button>
                </form>
            </td>
          @endif

        </tr>
      @endforeach

      </tbody>
    </table>

    @if(Auth::user()->idpegawai!=1)
      <a class="btn btn-default" href="{{ url('/lembur/create') }}" role="button">Create</a>
    @endif
    
  </div>
</div>