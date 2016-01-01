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
	<h2 class="sub-header">Lembur Detail</h2>

	<div class="col-md-3">
		<h4><strong>Nama Pegawai</strong></h4>
		<h4><strong>Tanggal Lembur</strong></h4>
		<h4><strong>Jangka Waktu</strong></h4>
		<h4><strong>Nomor SPKL</strong></h4>
		<h4><strong>Keterangan</strong></h4>
	</div>

	<div class="col-md-3">
	    <h4>{{ $lembur->pegawai->nama }}</h4>
		<h4>{{ $lembur->tgllembur->toDateString() }}</h4>
		<h4>{{ $lembur->jangkawaktu }}</h4>
		<h4>{{ $lembur->nomorspkl }}</h4>
		<h4>{{ $lembur->keterangan }}</h4>
	</div>
</div>
@endsection

@section('spjs')
	<script src="../../js/bootstrap.min.js"></script>
@endsection