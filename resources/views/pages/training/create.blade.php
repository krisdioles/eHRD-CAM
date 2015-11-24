@extends('app')

@section('spcss')
	<!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">
@endsection

@section('content')
<div class="col-md-8 col-md-offset-2">
	<h2 class="sub-header">Create Training</h2>
	<div class="form-group">
		{!! Form::open(['url'=>'training']) !!}
			{!! Form::label('namatraining', 'Nama Training : ') !!}
			{!! Form::text('namatraining', null, ['class'=>'form-control']) !!}

			<!-- Lokasi Form Input -->
			<div class="form-group">
				{!! Form::label('lokasi', 'Lokasi : ') !!}
				{!! Form::text('lokasi', null, ['class'=>'form-control']) !!}
			</div>

			<!-- Add Training Form Input -->
			<div class="form-group">
				{!! Form::submit('Add Training', ['class'=>'btn btn-primary form-control']) !!}
			</div>
		{!! Form::close() !!}
	</div>
</div>
@endsection

@section('spjs')
	<script src="../js/bootstrap.min.js"></script>
@endsection