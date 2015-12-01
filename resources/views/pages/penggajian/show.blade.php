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
    <h1>{{ $cuti->jeniscuti }}</h1>

	<h3>{{ $cuti->pegawai->nama }}</h3>
	<h3>{{ $cuti->tglawal->toDateString() }}</h3>
	<h3>{{ $cuti->tglakhir->toDateString() }}</h3>
</div>
@endsection

@section('spjs')
	<script src="../js/bootstrap.min.js"></script>
@endsection