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
          <th>Gaji Pokok</th>
          <th>Tunjangan Pokok</th>
          <th>Tanggal Penggajian</th>
          <th>Periode Penggajian</th>
          <th>Biaya Bonus</th>
          <th>Keterangan Bonus</th>
          <th>Biaya Potongan</th>
          <th>Keterangan Potongan</th>
          <th>Jumlah Penggajian</th>
          <th>Keterangan</th>
          
          @if(Auth::user()->idpegawai==1)
            <th></th>
            <th></th>
          @endif

        </tr>
      </thead>
      <tbody>

      @foreach($pegawai as $pegawai)
          {{-- @foreach($pegawai->penggajian as $penggajian) --}}
            <tr>
              <td>{{ $pegawai->idpegawai }}</td>
              <td><a href="{{ url('/penilaian/'.$pegawai->idpegawai.'/create') }}">{{ $pegawai->nama }}</td>
              <td>{{ $pegawai->gajipokok }}</td>
              <td>{{ $pegawai->tunjangantetap }}</td>
              {{-- <td>{{ $penggajian->tglpenggajian->format('d-m-Y') }}</td>
              <td>{{ $penggajian->periodepenggajian->format('F Y') }}</td>
              <td>{{ $penggajian->biayabonus }}</td>
              <td>{{ $penggajian->keteranganbonus }}</td>
              <td>{{ $penggajian->biayapotongan }}</td>
              <td>{{ $penggajian->keteranganpotongan }}</td>
              <td>{{ $penggajian->jumlahpenggajian }}</td>
              <td>{{ $penggajian->keterangan }}</td> --}}
              <td width="5">
                  <form action="{{ url('/penggajian/'.$pegawai->idpegawai.'/edit') }}">
                      <button class="btn-xs btn-link" type="submit">Edit</button>
                  </form>
              </td>
              <td width="5">
                  {!! Form::open(['method' => 'DELETE', 'route' => ['penggajian.destroy', $penggajian->idpenggajian]]) !!}
                      <button class="btn-xs btn-link" type="submit">Delete</button>
                  {!! Form::close() !!}
              </td>
            </tr>
          {{-- @endforeach --}}
      @endforeach

      </tbody>
    </table>

    @if(Auth::user()->idpegawai==1)
      <a class="btn btn-default" href="{{ url('/penggajian/create') }}" role="button">Create</a>
    @endif
    
  </div>
</div>