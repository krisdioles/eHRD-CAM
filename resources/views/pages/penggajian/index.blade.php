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
            <tr>
              <td>{{ $pegawai->idpegawai }}</td>
              <td><a href="{{ url('/penggajian/'.$pegawai->idpegawai.'/create') }}">{{ $pegawai->nama }}</td>
              <td>{{ $pegawai->gajipokok }}</td>
              <td>{{ $pegawai->tunjangantetap }}</td>
              <td>{{ $pegawai->penggajian->last()->tglpenggajian->format('d-m-Y') }}</td>
              <td>{{ $pegawai->penggajian->last()->periodepenggajian->format('F Y') }}</td>
              <td>{{ $pegawai->penggajian->last()->biayabonus }}</td>
              <td>{{ $pegawai->penggajian->last()->keteranganbonus }}</td>
              <td>{{ $pegawai->penggajian->last()->biayapotongan }}</td>
              <td>{{ $pegawai->penggajian->last()->keteranganpotongan }}</td>
              <td>{{ $pegawai->penggajian->last()->jumlahpenggajian }}</td>
              <td>{{ $pegawai->penggajian->last()->keterangan }}</td>

              @unless($pegawai->penggajian->last()==$pegawai->penggajian->first())
                  <td width="5">
                    {!! Form::open(['method' => 'DELETE', 'route' => ['penggajian.destroy', $pegawai->penggajian->last()->idpenggajian]]) !!}
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
      <a class="btn btn-default" href="{{ url('/penggajian/create') }}" role="button">Create</a>
    @endif
    
  </div>
</div>