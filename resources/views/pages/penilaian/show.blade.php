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

	<h2 class="sub-header">Detail Penilaian</h2>

	{{-- <div class="col-md-3">
		<h4><strong>Nama Pegawai</strong></h4>
		<h4><strong>Nilai Kompetensi</strong></h4>
		<h4><strong>Nilai Kedisiplinan</strong></h4>
		<h4><strong>Nilai Perilaku</strong></h4>
		<h4><strong>Keterangan</strong></h4>
	</div>

	<div class="col-md-3">
	    <h4>{{ $penilaian->pegawai->nama }}</h4>
	    <h4>{{ $penilaian->nilaikompetensi }}</h4>
		<h4>{{ $penilaian->nilaikedisiplinan }}</h4>
		<h4>{{ $penilaian->nilaiperilaku }}</h4>
		<h4>{{ $penilaian->keterangan }}</h4>
	</div> --}}

	<div class="col-md-9">
		<div class="table-responsive">
			<table cellspacing="10" style="width:400px; border-collapse: separate; border-spacing: 15px;">
				<tr>
					<td><strong>Nama Pegawai</strong></td>
					<td>{{ $penilaian->pegawai->nama }}</td>
				</tr>
				<tr>
					<td><strong>Tanggal Penilaian</strong></td>
					<td>{{ $penilaian->tglpenilaian->format('d-m-Y') }}</td>
				</tr>
				<tr>
					<td><strong>Nilai Kompetensi</strong></td>
					<td>{{ $penilaian->nilaikompetensi }}</td>
				</tr>
				<tr>
					<td><strong>Nilai Kedisiplinan</strong></td>
					<td>{{ $penilaian->nilaikedisiplinan }}</td>
				</tr>
				<tr>
					<td><strong>Nilai Perilaku</strong></td>
					<td>{{ $penilaian->nilaiperilaku }}</td>
				</tr>
				<tr>
					<td><strong>Keterangan</strong></td>
					<td>{{ $penilaian->keterangan }}</td>
				</tr>
			</table>
			<br>
			<a class="btn btn-default" href="/eHRD-CAM/public/penilaian" role="button">Kembali</a>
		</div>
	</div>
</div>
@endsection

@section('spjs')
	<script src="../../js/bootstrap.min.js"></script>
@endsection