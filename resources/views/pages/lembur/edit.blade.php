@extends('app')

@section('spcss')
	<!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/dashboard.css" rel="stylesheet">
@endsection

@section('content')
<div class="col-md-8 col-md-offset-2">
	<h2 class="sub-header">Edit lembur : {!! $lembur->tgllembur !!}</h2>
	<div class="form-group">
		
		{!! Form::model($lembur, ['method' => 'PATCH' ,'url'=>'lembur/'.$lembur->idlembur]) !!}
			@include('pages/lembur/_form', ['submitButtonText'=>'Ubah Lembur'])
		{!! Form::close() !!}

		@include('errors/list')

	</div>
</div>
@endsection



@section('spjs')
	<script src="../../js/bootstrap.min.js"></script>
@endsection