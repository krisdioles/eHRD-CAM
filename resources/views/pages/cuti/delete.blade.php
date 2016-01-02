@extends('app')

@section('spcss')
	<!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/dashboard.css" rel="stylesheet">
@endsection

@include('partials.menu')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

	<h2 class="sub-header">Cuti Detail</h2>

	<div class="col-md-3">
		<h4><strong>Nama Pegawai</strong></h4>
		<h4><strong>Jenis Cuti</strong></h4>
		<h4><strong>Tanggal Awal Cuti</strong></h4>
		<h4><strong>Tanggal Akhir Cuti</strong></h4>
		<h4><strong>Nomor Surat</strong></h4>
		<h4><strong>Keterangan</strong></h4>
	</div>

	<div class="col-md-3">
	    <h4>{{ $cuti->pegawai->nama }}</h4>
	    <h4>{{ $cuti->jeniscuti }}</h4>
		<h4>{{ $cuti->tglawal->toDateString() }}</h4>
		<h4>{{ $cuti->tglakhir->toDateString() }}</h4>
		<h4>{{ $cuti->nomorsurat }}</h4>
		@if($cuti->keterangan!=NULL)
			<h4>{{ $cuti->keterangan }}</h4>
		@else
			<h4>-</h4>
		@endif
	</div>

	<div class="col-md-4 col-md-push-4">
		<div class="panel panel-default">
		  	<div class="panel-body">
				<h4 class="text-center">Apakah Anda Yakin Menghapus Data Ini?</h4>
				<div class="form-group" align="center">
					{!! Form::open(['method' => 'DELETE', 'route' => ['cuti.destroy', $cuti->idcuti]]) !!}
					    <button class="btn btn-primary" type="submit">Hapus</button>
					    <a class="btn btn-default" href="/eHRD-CAM/public/cuti" role="button">Tidak</a>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('spjs')
	<script src="../../js/bootstrap.min.js"></script>
@endsection