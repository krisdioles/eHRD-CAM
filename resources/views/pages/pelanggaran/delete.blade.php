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

	<h2 class="sub-header">Pelanggaran Detail</h2>

	<div class="col-md-3">
		<h4><strong>Nama Pegawai</strong></h4>
		<h4><strong>Tanggal Pelanggaran</strong></h4>
		<h4><strong>Jenis Pelanggarean</strong></h4>
		<h4><strong>Sanksi</strong></h4>
		<h4><strong>Keterangan</strong></h4>
	</div>

	<div class="col-md-9">
	    <h4>{{ $pelanggaran->pegawai->nama }}</h4>
		<h4>{{ $pelanggaran->tglpelanggaran->toDateString() }}</h4>
		<h4>{{ $pelanggaran->jenispelanggaran }}</h4>
		<h4>{{ $pelanggaran->sanksi }}</h4>
		@if($pelanggaran->keterangan!=NULL)
			<h4>{{ $pelanggaran->keterangan }}</h4>
		@else
			<h4>-</h4>
		@endif
	</div>

	<div class="col-md-4 col-md-push-4">
		<div class="panel panel-default">
		  	<div class="panel-body">
				<h4 class="text-center">Apakah Anda Yakin Menghapus Data Ini?</h4>
				<div class="form-group" align="center">
					{!! Form::open(['method' => 'DELETE', 'route' => ['pelanggaran.destroy', $pelanggaran->idpelanggaran]]) !!}
					    <button class="btn btn-primary" type="submit">Hapus</button>
					    <a class="btn btn-default" href="/eHRD-CAM/public/pelanggaran" role="button">Tidak</a>
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