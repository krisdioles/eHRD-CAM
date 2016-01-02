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

	<div class="col-md-3">
		<h4><strong>Nama Training</strong></h4>
		<h4><strong>Nomor Surat</strong></h4>
		<h4><strong>Lokasi</strong></h4>
		<h4><strong>Tanggal Training</strong></h4>
		<h4><strong>Penyelenggara</strong></h4>
		<h4><strong>Anggaran</strong></h4>
		<h4><strong>Keterangan</strong></h4>
		<h4><strong>Peserta Training</strong></h4>
	</div>

	<div class="col-md-9">
	    <h4>{{ $training->namatraining }}</h4>
	    <h4>{{ $training->nomorsurat }}</h4>
		<h4>{{ $training->lokasi }}</h4>
		<h4>{{ $training->tgltraining->toDateString() }}</h4>
		<h4>{{ $training->penyelenggara }}</h4>
		<h4>Rp {{ $training->anggaran }}</h4>
		@if($training->keterangan!=NULL)
			<h4>{{ $training->keterangan }}</h4>
		@else
			<h4>-</h4>
		@endif
		@unless($training->pegawai->isEmpty())
			@foreach ($training->pegawai as $pegawai)
				<h4>{{ $pegawai->nama }}</h4>
			@endforeach
		@endunless
	</div>
	
	<div class="col-md-4 col-md-push-4">
		<div class="panel panel-default">
		  	<div class="panel-body">
				<h4 class="text-center">Apakah Anda Yakin Menghapus Data Ini?</h4>
				<div class="form-group" align="center">
					{!! Form::open(['method' => 'DELETE', 'route' => ['training.destroy', $training->idtraining]]) !!}
					    <button class="btn btn-primary" type="submit">Hapus</button>
					    <a class="btn btn-default" href="/eHRD-CAM/public/training" role="button">Tidak</a>
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