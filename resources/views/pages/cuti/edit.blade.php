@extends('app')

@section('spcss')
	<!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/dashboard.css" rel="stylesheet">
@endsection

@section('content')
<div class="col-md-8 col-md-offset-2">
	@if(Auth::user()->idpegawai==1)
		<h2 class="sub-header">Pemilik Cuti : {!! $cuti->pegawai->nama !!}</h2>
	@else
		<h2 class="sub-header">Edit Cuti : {!! $cuti->jeniscuti !!}</h2>
	@endif

	<div class="form-group">
		
		{!! Form::model($cuti, ['method' => 'PATCH' ,'url'=>'cuti/'.$cuti->idcuti]) !!}
			@include('pages/cuti/_form', ['submitButtonText'=>'Edit Cuti'])
		{!! Form::close() !!}

		@include('errors/list')

	</div>
</div>
@endsection



@section('spjs')
	<script src="../../js/bootstrap.min.js"></script>
@endsection