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
    <h1>{{ $training->namatraining }}</h1>

	<h3>{{ $training->lokasi }}</h3>
	<h3>{{ $training->tgltraining->toDateString() }}</h3>
	
	@unless($training->pegawai->isEmpty())
		<h5>Peserta Training : </h5>
		<ul>
			@foreach ($training->pegawai as $pegawai)
				<li>{{ $pegawai->nama }}</li>
			@endforeach
		</ul>
	@endunless
</div>
@endsection

@section('spjs')
	<script src="../js/bootstrap.min.js"></script>
@endsection