@extends('app')

@section('spcss')
	<!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/dashboard.css" rel="stylesheet">
@endsection

@section('content')
<div class="col-md-8 col-md-offset-2">
	<h2 class="sub-header">Edit Pelanggaran : {!! $pelanggaran->pegawai->nama !!}</h2>
	<div class="form-group">
		
		{!! Form::model($pelanggaran, ['method' => 'PATCH' ,'url'=>'pelanggaran/'.$pelanggaran->idpelanggaran]) !!}
			<div class="form-group">
				{!! Form::label('tglpelanggaran', 'Tanggal Pelanggaran : ') !!}
				{!! Form::input('date', 'tglpelanggaran', $pelanggaran->tglpelanggaran->format('Y-m-d'), ['class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('jenispelanggaran', 'Jenis Pelanggaran : ') !!}
				{!! Form::text('jenispelanggaran', null, ['class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('sanksi', 'Sanksi : ') !!}
				{!! Form::text('sanksi', null, ['class'=>'form-control']) !!}
			</div>

			<!-- Keterangan Form Input -->
			<div class="form-group">
				{!! Form::label('keterangan', 'Keterangan : ') !!}
				{!! Form::textarea('keterangan', null, ['class'=>'form-control', 'rows'=>'3']) !!}
			</div>

			<div class="form-group">
				{!! Form::submit('Edit Pelanggaran', ['class'=>'btn btn-primary']) !!}
				<a class="btn btn-primary" href="/eHRD-CAM/public/pelanggaran" role="button">Back</a>
			</div>
		{!! Form::close() !!}

		@include('errors/list')

	</div>
</div>
@endsection



@section('spjs')
	<script src="../../js/bootstrap.min.js"></script>
@endsection