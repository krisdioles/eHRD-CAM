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
					@if($lembur->keterangan!=NULL)
						<td>{{ $lembur->keterangan }}</td>
					@else
						<td>-</td>
					@endif
				</tr>
			</table>
		</div>
	</div>

	<div class="col-md-4 col-md-push-4">
		<div class="panel panel-default">
		  	<div class="panel-body">
				<h4 class="text-center">Apakah Anda Yakin Menghapus Data Ini?</h4>
				<div class="form-group" align="center">
					{!! Form::open(['method' => 'DELETE', 'route' => ['lembur.destroy', $lembur->idlembur]]) !!}
					    <button class="btn btn-primary" type="submit">Hapus</button>
					    <a class="btn btn-default" href="/eHRD-CAM/public/lembur" role="button">Tidak</a>
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