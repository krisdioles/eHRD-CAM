@extends('app')

@include('partials.menu')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h2 class="sub-header">PHK</h2>
  <div class="table-responsive">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Pegawai</th>
          <th>Tanggal PHK</th>
          <th>Jenis PHK</th>
          <th>Nomor Surat</th>
          <th>Keterangan</th>
          
          @if(Auth::user()->idpegawai==1)
            <th></th>
            <th></th>
          @endif

        </tr>
      </thead>
      <tbody>
        
        @foreach($phk as $phk)
          <tr>
            <td>{{ $phk->pegawai->kodepegawai }}</td>
            <td>{{ $phk->pegawai->nama }}</td>
            <td>{{ $phk->tglphk->toDateString() }}</td>
            <td>{{ $phk->jenisphk }}</td>
            <td>{{ $phk->nomorsurat }}</td>
            <td>{{ $phk->keterangan }}</td>
            <td width="5">
                <form action="{{ url('/phk/'.$phk->idphk.'/edit') }}">
                    <button class="btn-xs btn-link" type="submit">Edit</button>
                </form>
            </td>
            <td width="5">
                {!! Form::open(['method' => 'DELETE', 'route' => ['phk.destroy', $phk->idphk]]) !!}
                    <button class="btn-xs btn-link" type="submit">Delete</button>
                {!! Form::close() !!}
            </td>
          </tr>
        @endforeach        

      </tbody>
    </table>

    @if(Auth::user()->idpegawai==1)
      <a class="btn btn-default" href="{{ url('/phk/create') }}" role="button">Create</a>
    @endif
    
  </div>
</div>