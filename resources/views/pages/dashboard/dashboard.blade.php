@extends('app')

@include('partials.menu')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2 class="page-header">Dashboard</h2>

    {{-- <div class="col-md-3">
      <h4><strong>Nama Pegawai</strong></h4>
      <h4><strong>Kode pegawai</strong></h4>
      <h4><strong>Email</strong></h4>
      <h4><strong>Alamat</strong></h4>
      <h4><strong>Agama</strong></h4>
    </div> --}}
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="col-lg-3 col-xs-6 col-sm-3 placeholder">
              <a href="/eHRD-CAM/public/dashboard/upload"><img src="/eHRD-CAM/public/images/{{ \Auth::user()->kodepegawai }}.jpg" width="200" height="200" class="img-responsive" alt="Mohon Upload Foto Anda"></a>
        </div>

        <div class="col-lg-4 col-md-6">
          <h3 class="sub-header"><strong>{{ \Auth::user()->nama }}</strong></h3>
          <h4>Kode Pegawai : {{ \Auth::user()->kodepegawai }}</h4>
          <h4>Email : {{ \Auth::user()->email }}</h4>
          <h4>Alamat : {{ \Auth::user()->alamat }}</h4>
          <h4>Agama : {{ \Auth::user()->agama }}</h4>
          <br>
          <a href="/eHRD-CAM/public/dashboard/detailprofil"><h4>Info Profil Selengkapnya...</h4></a>
        </div>
      </div>
    </div>

    <div class="row">
      @if(\Auth::user()->idpegawai==1)
        @include('pages/dashboard/notifadmin')
      @else
        @include('pages/dashboard/notifpegawai')
      @endif
    </div>
</div>
@stop
