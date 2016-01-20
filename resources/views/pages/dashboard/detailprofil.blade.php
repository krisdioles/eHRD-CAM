@extends('app')

@section('spcss')
	<!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">
@endsection

@include('partials.menu')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2 class="page-header">Detail Profil</h2>
    <div class="col-md-9">
		<div class="table-responsive">
			<table cellspacing="10" style="width:400px; border-collapse: separate; border-spacing: 15px;">
				<tr>
					<td><strong>Kode Pegawai</strong></td>
					<td>{{ $pegawai->kodepegawai }}</td>
				</tr>
				<tr>
					<td><strong>Nama Pegawai</strong></td>
					<td>{{ $pegawai->nama }}</td>
				</tr>
				<tr>
					<td><strong>Email</strong></td>
					<td>{{ $pegawai->email }}</td>
				</tr>
				<tr>
					<td><strong>Jenis Kelamin</strong></td>
					<td>{{ $pegawai->jeniskelamin }}</td>
				</tr>
				<tr>
					<td><strong>Telepon</strong></td>
					<td>{{ $pegawai->telepon }}</td>
				</tr>
				<tr>
					<td><strong>Tanggal Lahir</strong></td>
					<td>{{ $pegawai->tgllahir->toDateString() }}</td>
				</tr>
				<tr>
					<td><strong>Agama</strong></td>
					<td>{{ $pegawai->agama }}</td>
				</tr>
				<tr>
					<td><strong>Status Kawin</strong></td>
					<td>{{ $pegawai->statuskawin }}</td>
				</tr>
				<tr>
					<td><strong>Pendidikan Terakhir</strong></td>
					<td>{{ $pegawai->pendidikanterakhir }}</td>
				</tr>
				<tr>
					<td><strong>Jabatan</strong></td>
					<td>{{ $pegawai->jabatan }}</td>
				</tr>
				<tr>
					<td><strong>Gaji Pokok</strong></td>
					<td>{{ $pegawai->gajipokok }}</td>
				</tr>
				<tr>
					<td><strong>Tunjangan Tetap</strong></td>
					<td>{{ $pegawai->tunjangantetap }}</td>
				</tr>
				<tr>
					<td><strong>Hak Cuti</strong></td>
					<td>{{ $pegawai->hakcuti }}</td>
				</tr>
				<tr>
					<td><strong>Status Aktif</strong></td>
					<td>{{ $pegawai->statusaktif }}</td>
				</tr>
			</table>
			<br>
			<a class="btn btn-default" href="/eHRD-CAM/public/dashboard" role="button">Back</a>
		</div>
	</div>
</div>
@endsection

@section('spjs')
	<script src="../js/bootstrap.min.js"></script>
@endsection