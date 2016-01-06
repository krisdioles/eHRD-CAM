@extends('app')

@section('spcss')
	<!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">
@endsection

@section('content')
<div class="col-md-8 col-md-offset-2">
	<h2 class="sub-header">Add Pelanggaran</h2>
	<div class="form-group">

		{!! Form::model($pelanggaran=new \App\Pelanggaran, ['url'=>'pelanggaran']) !!}
			<!-- Pelanggaran for Pegawai Form Input -->
			<div class="form-group">
				{!! Form::label('namapegawai', 'Nama Pegawai : ') !!}
				{!! Form::select('pegawai_id', $pegawai, null, ['class'=>'form-control']) !!}
			</div>

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
				{!! Form::submit('Add Pelanggaran', ['class'=>'btn btn-primary form-control']) !!}
			</div>
		{!! Form::close() !!}

		@include('errors/list')

	</div>
</div>
@endsection



@section('spjs')
	<script src="../js/bootstrap.min.js"></script>
@endsection