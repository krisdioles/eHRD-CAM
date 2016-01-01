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
        <div class="col-xs-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
        </div>

        <div class="col-md-3">
          <h3 class="sub-header"><strong>{{ \Auth::user()->nama }}</strong></h3>
          <h4>Kode Pegawai : {{ \Auth::user()->kodepegawai }}</h4>
          <h4>Email : {{ \Auth::user()->email }}</h4>
          <h4>Alamat : {{ \Auth::user()->alamat }}</h4>
          <h4>Agama : {{ \Auth::user()->agama }}</h4>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4 col-md-6">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <span style="font-size:4em;" class="glyphicon glyphicon-alert" aria-hidden="true"></span>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">26</div>
                        <div>Training Baru untuk Anda!</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="panel panel-success">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <span style="font-size:4em;" class="glyphicon glyphicon-alert" aria-hidden="true"></span>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">26</div>
                        <div>Cuti Anda Telah Diterima!</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <span style="font-size:4em;" class="glyphicon glyphicon-alert" aria-hidden="true"></span>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">26</div>
                        <div>Lembur Anda Telah Diterima!</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
      </div>
    </div>
</div>
@stop
