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

	<div class="col-md-9">
		<div class="table-responsive">
			<table cellspacing="10" style="width:400px; border-collapse: separate; border-spacing: 15px;">
				<tr>
					<td><strong>Nama Training</strong></td>
					<td>{{ $training->namatraining }}</td>
				</tr>
				<tr>
					<td><strong>Nomor Surat</strong></td>
					<td>{{ $training->nomorsurat }}</td>
				</tr>
				<tr>
					<td><strong>Lokasi</strong></td>
					<td>{{ $training->lokasi }}</td>
				</tr>
				<tr>
					<td><strong>Tanggal training</strong></td>
					<td>{{ $training->tgltraining->toDateString() }}</td>
				</tr>
				<tr>
					<td><strong>Penyelenggara</strong></td>
					<td>{{ $training->penyelenggara }}</td>
				</tr>
				<tr>
					<td><strong>Peserta Training</strong></td>
					<td>
						@foreach ($training->pegawai as $pegawai)
							{{ $pegawai->nama }}<br>
						@endforeach
					</td>
				</tr>
				@if(Auth::user()->idpegawai==1)
					<tr>
						<td><strong>Anggaran</strong></td>
						<td>{{ $training->anggaran }}</td>
					</tr>
				@endif
				<tr>
					<td><strong>Keterangan</strong></td>
					<td>{{ $training->keterangan }}</td>
				</tr>
			</table>
			<br>
			<a class="btn btn-default" href="/eHRD-CAM/public/training" role="button">Kembali</a>
		</div>
	</div>

</div>
@endsection

@section('spjs')
	<script src="../../js/bootstrap.min.js"></script>
@endsection