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

	{{-- <div class="col-md-3">
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
		<h4>{{ $cuti->keterangan }}</h4>
	</div> --}}

	<div class="col-md-9">
		<div class="table-responsive">
			<table cellspacing="10" style="width:400px; border-collapse: separate; border-spacing: 15px;">
				<tr>
					<td><strong>Nama Pegawai</strong></td>
					<td>{{ $cuti->pegawai->nama }}</td>
				</tr>
				<tr>
					<td><strong>Jenis Cuti</strong></td>
					<td>{{ $cuti->jeniscuti }}</td>
				</tr>
				<tr>
					<td><strong>Tanggal Awal Cuti</strong></td>
					<td>{{ $cuti->tglawal->toDateString() }}</td>
				</tr>
				<tr>
					<td><strong>Tanggal Akhir Cuti</strong></td>
					<td>{{ $cuti->tglakhir->toDateString() }}</td>
				</tr>
				<tr>
					<td><strong>Nomor Surat</strong></td>
					<td>{{ $cuti->nomorsurat }}</td>
				</tr>
				<tr>
					<td><strong>Keterangan</strong></td>
					<td>{{ $cuti->keterangan }}</td>
				</tr>
			</table>
			<br>
			<a class="btn btn-default" href="/eHRD-CAM/public/cuti" role="button">Kembali</a>
		</div>
	</div>

</div>
@endsection

@section('spjs')
	<script src="../../js/bootstrap.min.js"></script>
@endsection