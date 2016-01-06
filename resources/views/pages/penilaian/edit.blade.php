@extends('app')

@section('spcss')
	<!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/dashboard.css" rel="stylesheet">
@endsection

@section('content')
<div class="col-md-8 col-md-offset-2">
	<h2 class="sub-header">Edit Penilaian : {!! $penilaian->pegawai->nama !!}</h2>
	<div class="form-group">
		
		{!! Form::model($penilaian, ['method' => 'PATCH' ,'url'=>'penilaian/'.$penilaian->idpenilaian]) !!}
			@include('pages/penilaian/_form', ['submitButtonText'=>'Edit Penilaian'])
		{!! Form::close() !!}

		@include('errors/list')

	</div>
</div>
@endsection



@section('spjs')
	<script src="../../js/bootstrap.min.js"></script>
@endsection