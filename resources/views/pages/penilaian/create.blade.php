@extends('app')

@section('spcss')
	<!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/dashboard.css" rel="stylesheet">
@endsection

@section('content')
<div class="col-md-8 col-md-offset-2">
	<h2 class="sub-header">Create Penilaian</h2>
	<div class="form-group">

		{!! Form::model($penilaian=new \App\Penilaian, ['url'=>'penilaian']) !!}
			@include('pages/penilaian/_form', ['submitButtonText'=>'Add Penilaian'])
		{!! Form::close() !!}

		@include('errors/list')

	</div>
</div>
@endsection



@section('spjs')
	<script src="../../js/bootstrap.min.js"></script>
@endsection