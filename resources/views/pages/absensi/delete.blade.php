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

	<h2 class="sub-header">Absensi Detail</h2>

	<div class="col-md-9">
		<div class="table-responsive">
			<table cellspacing="10" style="width:400px; border-collapse: separate; border-spacing: 15px;">
				<tr>
					<td><strong>Nama Pegawai</strong></td>
					<td>{{ $absensi->pegawai->nama }}</td>
				</tr>
				<tr>
					<td><strong>Waktu Masuk</strong></td>
					<td>{{ $absensi->waktumasuk }}</td>
				</tr>
				<tr>
					<td><strong>Waktu Pulang</strong></td>
					<td>{{ $absensi->waktupulang }}</td>
				</tr>
				<tr>
					<td><strong>Status Masuk</strong></td>
					<td>{{ $absensi->statusmasuk }}</td>
				</tr>
				<tr>
					<td><strong>Status Pulang</strong></td>
					<td>{{ $absensi->statuspulang }}</td>
				</tr>
				<tr>
					<td><strong>Keterangan</strong></td>
					<td>{{ $absensi->keterangan }}</td>
				</tr>
			</table>

		</div>
	</div>

	<div class="col-md-4 col-md-push-4">
		<div class="panel panel-default">
		  	<div class="panel-body">
				<h4 class="text-center">Apakah anda yakin mau menghapus data ini?</h4>
				<div class="form-group" align="center">
					{!! Form::open(['method' => 'DELETE', 'route' => ['absensi.destroy', $absensi->idabsensi]]) !!}
					    <button class="btn btn-primary" type="submit">Hapus</button>
					    <a class="btn btn-default" href="/eHRD-CAM/public/absensi" role="button">Tidak</a>
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