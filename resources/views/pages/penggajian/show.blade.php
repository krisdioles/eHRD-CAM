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
	<h2 class="sub-header">Penggajian Detail</h2>

	<div class="col-md-3">
		<h4><strong>Nama Pegawai</strong></h4>
		<h4><strong>Tanggal Penggajian</strong></h4>
		<h4><strong>Periode Penggajian</strong></h4>
		<h4><strong>Gaji Pokok</strong></h4>
		<h4><strong>Tunjangan Tetap</strong></h4>
		<h4><strong>Biaya Bonus</strong></h4>
		<h4><strong>Biaya Potongan</strong></h4>
		<h4><strong>Jumlah Penggajian</strong></h4>
		<h4><strong>Keterangan</strong></h4>
	</div>

	<div class="col-md-3">
	    <h4>{{ $penggajian->pegawai->nama }}</h4>
	    <h4>{{ $penggajian->tglpenggajian->format('d-m-Y') }}</h4>
	    <h4>{{ $penggajian->periodepenggajian->format('F Y') }}</h4>
		<h4>{{ $penggajian->pegawai->gajipokok }}</h4>
		<h4>{{ $penggajian->pegawai->tunjangantetap }}</h4>
		<h4>{{ $penggajian->biayabonus }}</h4>
		<h4>{{ $penggajian->biayapotongan }}</h4>
		<h4>{{ $penggajian->jumlahpenggajian }}</h4>
		<h4>{{ $penggajian->keterangan }}</h4>
	</div>
</div>
@endsection

@section('spjs')
	<script src="../../js/bootstrap.min.js"></script>
@endsection