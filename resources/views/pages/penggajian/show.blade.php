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
	<h2 class="sub-header">Detail Penggajian</h2>

	<div class="col-md-9">
		<div class="table-responsive">
			<table cellspacing="10" style="width:400px; border-collapse: separate; border-spacing: 15px;">
				<tr>
					<td><strong>Nama Pegawai</strong></td>
					<td>{{ $penggajian->pegawai->nama }}</td>
				</tr>
				<tr>
					<td><strong>Tanggal Penggajian</strong></td>
					<td>{{ $penggajian->tglpenggajian->format('d-m-Y') }}</td>
				</tr>
				<tr>
					<td><strong>Periode Penggajian</strong></td>
					<td>{{ $penggajian->periodepenggajian->format('F Y') }}</td>
				</tr>
				<tr>
					<td><strong>Gaji Pokok</strong></td>
					<td>Rp. {{ $penggajian->pegawai->gajipokok }}</td>
				</tr>
				<tr>
					<td><strong>Tunjangan Tetap</strong></td>
					<td>Rp. {{ $penggajian->pegawai->tunjangantetap }}</td>
				</tr>
				<tr>
					<td><strong>Biaya Bonus</strong></td>
					<td>Rp. {{ $penggajian->biayabonus }}</td>
				</tr>
				<tr>
					<td><strong>Keterangan Bonus</strong></td>
					<td>{{ $penggajian->keteranganbonus }}</td>
				</tr>
				<tr>
					<td><strong>Biaya Potongan</strong></td>
					<td>Rp. {{ $penggajian->biayapotongan }}</td>
				</tr>
				<tr>
					<td><strong>Keterangan Potongan</strong></td>
					<td>{{ $penggajian->keteranganpotongan }}</td>
				</tr>
				<tr>
					<td><strong>Jumlah Penggajian</strong></td>
					<td>Rp. {{ $penggajian->jumlahpenggajian }}</td>
				</tr>
				<tr>
					<td><strong>Cara Bayar</strong></td>
					<td>{{ $penggajian->carabayar }}</td>
				</tr>
				<tr>
					<td><strong>Nama Bank</strong></td>
					<td>{{ $penggajian->namabank }}</td>
				</tr>
				<tr>
					<td><strong>Nomor Rekening</strong></td>
					<td>{{ $penggajian->norekening }}</td>
				</tr>
				<tr>
					<td><strong>Atas Nama</strong></td>
					<td>{{ $penggajian->namarekening }}</td>
				</tr>
			</table>
			<br>
			<a class="btn btn-default" href="/eHRD-CAM/public/penggajian" role="button">Back</a>
		</div>
	</div>
		
</div>
@endsection

@section('spjs')
	<script src="../../js/bootstrap.min.js"></script>
@endsection