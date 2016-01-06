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
	<h2 class="sub-header">Detail PHK</h2>

	{{-- <div class="col-md-3">
		<h4><strong>Nama Pegawai</strong></h4>
		<h4><strong>Tanggal PHK</strong></h4>
		<h4><strong>Jenis PHK</strong></h4>
		<h4><strong>Nomor Surat</strong></h4>
		<h4><strong>Keterangan</strong></h4>
		<br><br>
		<a class="btn btn-default" href="/eHRD-CAM/public/phk" role="button">Kembali</a>
	</div>

	<div class="col-md-3">
	    <h4>{{ $phk->pegawai->nama }}</h4>
		<h4>{{ $phk->tglphk->format('d-m-Y') }}</h4>
		<h4>{{ $phk->jenisphk }}</h4>
		<h4>{{ $phk->nomorsurat }}</h4>
		<h4>{{ $phk->keterangan }}</h4>
	</div> --}}

	<div class="col-md-9">
		<div class="table-responsive">
			<table cellspacing="10" style="width:400px; border-collapse: separate; border-spacing: 15px;">
				<tr>
					<td><strong>Nama Pegawai</strong></td>
					<td>{{ $phk->pegawai->nama }}</td>
				</tr>
				<tr>
					<td><strong>Tanggal PHK</strong></td>
					<td>{{ $phk->tglphk->toDateString() }}</td>
				</tr>
				<tr>
					<td><strong>Jenis PHK</strong></td>
					<td>{{ $phk->jenisphk }}</td>
				</tr>
				<tr>
					<td><strong>Nomor Surat</strong></td>
					<td>{{ $phk->nomorsurat }}</td>
				</tr>
				<tr>
					<td><strong>Keterangan</strong></td>
					<td>{{ $phk->keterangan }}</td>
				</tr>
			</table>
			<br>
			<a class="btn btn-default" href="/eHRD-CAM/public/phk" role="button">Kembali</a>
		</div>
	</div>

</div>
@endsection

@section('spjs')
	<script src="../../js/bootstrap.min.js"></script>
@endsection