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
	<h2 class="sub-header">Training Detail</h2>

	<div class="col-md-3">
		<h4><strong>Nama Training</strong></h4>
		<h4><strong>Nomor Surat</strong></h4>
		<h4><strong>Lokasi</strong></h4>
		<h4><strong>Tanggal Training</strong></h4>
		<h4><strong>Penyelenggara</strong></h4>
		<h4><strong>Anggaran</strong></h4>
		<h4><strong>Keterangan</strong></h4>
		<h4><strong>Peserta Training</strong></h4>
	</div>

	<div class="col-md-3">
	    <h4>{{ $training->namatraining }}</h4>
	    <h4>{{ $training->nomorsurat }}</h4>
		<h4>{{ $training->lokasi }}</h4>
		<h4>{{ $training->tgltraining->toDateString() }}</h4>
		<h4>{{ $training->penyelenggara }}</h4>
		<h4>Rp {{ $training->anggaran }}</h4>
		<h4>{{ $training->keterangan }}</h4>
		@unless($training->pegawai->isEmpty())
			@foreach ($training->pegawai as $pegawai)
				<h4>{{ $pegawai->nama }}</h4>
			@endforeach
		@endunless
	</div>
</div>
@endsection

@section('spjs')
	<script src="../../js/bootstrap.min.js"></script>
@endsection