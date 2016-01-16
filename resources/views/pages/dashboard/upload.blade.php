@extends('app')

@section('spcss')
	<!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">
@endsection

@section('content')
<div class="col-md-8 col-md-offset-2">
	<h2 class="sub-header">Upload Foto : {!! $pegawai->nama !!}</h2>
	<div class="form-group">
		
		{!! Form::model($pegawai, ['method' => 'PATCH' ,'url'=>'pegawai/'.$pegawai->idpegawai, 'files' => true]) !!}
			<div class="form-group">
			    {!! Form::label('foto', 'Foto Profil : ') !!}
			    {!! Form::file('foto', null, ['class'=>'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::submit('Upload Foto', ['class'=>'btn btn-primary']) !!}
				<a class="btn btn-primary" href="/eHRD-CAM/public/dashboard" role="button">Back</a>
			</div>
		{!! Form::close() !!}

		@include('errors/list')

	</div>
</div>
@endsection



@section('spjs')
	<script src="../js/bootstrap.min.js"></script>
@endsection