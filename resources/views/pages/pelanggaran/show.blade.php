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

	<div class="col-md-3">
	    <h4>{{ $pelanggaran->pegawai->nama }}</h4>
		<h4>{{ $pelanggaran->tglpelanggaran->toDateString() }}</h4>
		<h4>{{ $pelanggaran->jenispelanggaran }}</h4>
		<h4>{{ $pelanggaran->sanksi }}</h4>
		<h4>{{ $pelanggaran->keterangan }}</h4>
</div>
@endsection

@section('spjs')
	<script src="../../js/bootstrap.min.js"></script>
@endsection