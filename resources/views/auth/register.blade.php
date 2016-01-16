@extends('app')

@section('spcss')
	<!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">
@endsection

<?php 
	$kodepegawai = substr_replace(
			DB::table('pegawai')->orderBy('created_at', 'desc')->pluck('kodepegawai'),
			substr(DB::table('pegawai')->orderBy('created_at', 'desc')->pluck('kodepegawai'),3,3)+1,
			6-strlen(substr(DB::table('pegawai')->orderBy('created_at', 'desc')->pluck('kodepegawai'),3,3)+1),
			strlen(substr(DB::table('pegawai')->orderBy('created_at', 'desc')->pluck('kodepegawai'),3,3)+1)
		);
?>

@section('content')

<div class="col-md-8 col-md-offset-2">	
<h2 class="sub-header">Add Pegawai</h2>			
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<div class="form-group">
		<form role="form" method="POST" action="{{ url('/auth/register') }}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">

			<?php 
				$kodepegawai = substr_replace(
						DB::table('pegawai')->orderBy('created_at', 'desc')->pluck('kodepegawai'),
						substr(DB::table('pegawai')->orderBy('created_at', 'desc')->pluck('kodepegawai'),3,3)+1,
						6-strlen(substr(DB::table('pegawai')->orderBy('created_at', 'desc')->pluck('kodepegawai'),3,3)+1),
						strlen(substr(DB::table('pegawai')->orderBy('created_at', 'desc')->pluck('kodepegawai'),3,3)+1)
					);
			?>

			<div class="form-group">
				{!! Form::label('kodepegawai', 'Kode Pegawai : ') !!}
				{!! Form::text('kodepegawai', $kodepegawai, ['class'=>'form-control', 'readonly']) !!}
			</div>

			<!-- Pelanggaran for Pegawai Form Input -->
			<div class="form-group">
				{!! Form::label('name', 'Nama Pegawai : ') !!}
				{!! Form::text('name', null, ['class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('email', 'Email : ') !!}
				{!! Form::text('email', null, ['class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('password', 'Password : ') !!}
				{!! Form::password('password', ['class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('password_confirmation', 'Konfirmasi Password : ') !!}
				{!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('alamat', 'Alamat : ') !!}
				{!! Form::textarea('alamat', null, ['class'=>'form-control']) !!}
			</div>

			<!-- Jenis Kelamin Form Input -->
			<div class="form-group">
				{!! Form::label('jeniskelamin', 'Jenis Kelamin : ') !!}<br>
				<label class="radio-inline">
					{!! Form::radio('jeniskelamin', 'Pria', null) !!} Pria
				</label> 
				<label class="radio-inline">
					{!! Form::radio('jeniskelamin', 'Wanita', null) !!} Wanita
				</label>
			</div>

			<div class="form-group">
				{!! Form::label('telepon', 'Telepon : ') !!}
				{!! Form::text('telepon', null, ['class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('tgllahir', 'Tanggal Lahir : ') !!}
				{!! Form::input('date', 'tgllahir', null, ['class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('agama', 'Agama : ') !!}
				{!! Form::text('agama', null, ['class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('statuskawin', 'Status Kawin : ') !!}<br> 
				<label class="radio-inline">
					{!! Form::radio('statuskawin', 'Sudah Kawin', null) !!} Sudah Kawin
				</label>
				<label class="radio-inline">
					{!! Form::radio('statuskawin', 'Belum Kawin', null) !!} Belum Kawin
				</label>
			</div>

			<div class="form-group">
				{!! Form::label('pendidikanterakhir', 'Pendidikan Terakhir : ') !!}<br>
				<label class="radio-inline">
					{!! Form::radio('pendidikanterakhir', 'SMP', null) !!} SMP 
				</label>
				<label class="radio-inline">
					{!! Form::radio('pendidikanterakhir', 'SMA', null) !!} SMA
				</label>
				<label class="radio-inline">
					{!! Form::radio('pendidikanterakhir', 'D', null) !!} D1/D2/D3
				</label>
				<label class="radio-inline">
					{!! Form::radio('pendidikanterakhir', 'S1', null) !!} S1
				</label>
				<label class="radio-inline">
					{!! Form::radio('pendidikanterakhir', 'S2', null) !!} S2 
				</label>
				<label class="radio-inline">
					{!! Form::radio('pendidikanterakhir', 'S3', null) !!} S3
			</div>

			<div class="form-group">
				{!! Form::label('jabatan', 'Jabatan : ') !!}
				{!! Form::text('jabatan', null, ['class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('gajipokok', 'Gaji Pokok : ') !!}
				<div class="input-group">
					<div class="input-group-addon">Rp. </div>
					{!! Form::text('gajipokok', null, ['class'=>'form-control']) !!}
				</div>
			</div>

			<div class="form-group">
				{!! Form::label('tunjangantetap', 'Tunjangan Tetap : ') !!}
				<div class="input-group">
					<div class="input-group-addon">Rp. </div>
					{!! Form::text('tunjangantetap', null, ['class'=>'form-control']) !!}
				</div>
			</div>

			<div class="form-group">
				{!! Form::label('hakcuti', 'Hak Cuti : ') !!}
				<div class="input-group">
					{!! Form::text('hakcuti', null, ['class'=>'form-control']) !!}
					<div class="input-group-addon">Hari</div>
				</div>
			</div>

			<div class="form-group">
				<div class="form-group">
					{!! Form::submit('Add Pegawai', ['class'=>'btn btn-primary']) !!}
					<a class="btn btn-primary" href="/eHRD-CAM/public/pegawai" role="button">Back</a>
				</div>
			</div>
		</form>
	</div>
</div>

@endsection

@section('spjs')
	<script src="../js/bootstrap.min.js"></script>
@endsection