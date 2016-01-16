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

	<h2 class="sub-header">Detail Pelanggaran</h2>

	<div class="col-md-9">
		<div class="table-responsive">
			<table cellspacing="10" style="width:400px; border-collapse: separate; border-spacing: 15px;">
				<tr>
					<td><strong>Nama Pegawai</strong></td>
					<td>{{ $pelanggaran->pegawai->nama }}</td>
				</tr>
				<tr>
					<td><strong>Tanggal Pelanggaran</strong></td>
					<td>{{ $pelanggaran->tglpelanggaran->toDateString() }}</td>
				</tr>
				<tr>
					<td><strong>Jenis Pelanggaran</strong></td>
					<td>{{ $pelanggaran->jenispelanggaran }}</td>
				</tr>
				<tr>
					<td><strong>Sanksi</strong></td>
					<td>{{ $pelanggaran->sanksi }}</td>
				</tr>
				<tr>
					<td><strong>Keterangan</strong></td>
					<td>{{ $pelanggaran->keterangan }}</td>
				</tr>
			</table>
			<br>
			<a class="btn btn-default" href="/eHRD-CAM/public/pelanggaran" role="button">Back</a>
		</div>
	</div>
</div>
@endsection

@section('spjs')
	<script src="../../js/bootstrap.min.js"></script>
@endsection