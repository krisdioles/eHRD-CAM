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

	{{-- <div class="col-md-3">
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
	</div> --}}

	<div class="col-md-9">
		<div class="table-responsive">
			<table cellspacing="10" style="width:400px; border-collapse: separate; border-spacing: 15px;">
				<tr>
					<td><strong>Nama Pegawai</strong></td>
					<td>{{ $lembur->pegawai->nama }}</td>
				</tr>
				<tr>
					<td><strong>Tanggal Lembur</strong></td>
					<td>{{ $lembur->tgllembur->toDateString() }}</td>
				</tr>
				<tr>
					<td><strong>Jangka Waktu</strong></td>
					<td>{{ $lembur->jangkawaktu }}</td>
				</tr>
				<tr>
					<td><strong>Nomor SPKL</strong></td>
					<td>{{ $lembur->nomorspkl }}</td>
				</tr>
				<tr>
					<td><strong>Keterangan</strong></td>
					<td>{{ $lembur->keterangan }}</td>
				</tr>
			</table>
			<br>
			<a class="btn btn-default" href="/eHRD-CAM/public/lembur" role="button">Kembali</a>
		</div>
	</div>
</div>

@endsection

@section('spjs')
	<script src="../../js/bootstrap.min.js"></script>
@endsection