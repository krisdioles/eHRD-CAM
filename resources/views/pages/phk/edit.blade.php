@extends('app')

@section('spcss')
	<!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/dashboard.css" rel="stylesheet">
@endsection

@section('content')
<div class="col-md-8 col-md-offset-2">
	<h2 class="sub-header">Edit PHK : {!! $phk->pegawai->nama !!}</h2>
	<div class="form-group">
		
		{!! Form::model($phk, ['method' => 'PATCH' ,'url'=>'phk/'.$phk->idphk]) !!}
			@include('pages/phk/_form', ['submitButtonText'=>'Update phk'])
		{!! Form::close() !!}

		@include('errors/list')

	</div>
</div>
@endsection



@section('spjs')
	<script src="../../js/bootstrap.min.js"></script>
@endsection