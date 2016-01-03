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
<div class="container-fluid" style="padding-top : 20px">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Register</div>
				<div class="panel-body">
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

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Kode Pegawai</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="kodepegawai" id="kodepegawai" value="{{ $kodepegawai}}" readonly>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Nama</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Alamat E-Mail</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Konfirmasi Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Alamat</label>
							<div class="col-md-6">
								<textarea class="form-control" name="alamat" value="{{ old('alamat') }}" rows="3"></textarea>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Jenis Kelamin</label>
							<div class="col-md-6">
								<label class="radio-inline">
								  <input type="radio" name="jeniskelamin" id="pria" value="Pria"> Pria
								</label>
								<label class="radio-inline">
								  <input type="radio" name="jeniskelamin" id="wanita" value="Wanita"> Wanita
								</label>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Telepon</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="telepon" value="{{ old('telepon') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Tanggal Lahir</label>
							<div class="col-md-6">
								<input type="date" class="form-control" name="tgllahir" value="{{ old('tgllahir') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Agama</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="agama" value="{{ old('agama') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Status Kawin</label>
							<div class="col-md-6">
								<label class="radio-inline">
								  <input type="radio" name="statuskawin" id="sudahkawin" value="Sudah Kawin"> Sudah Kawin
								</label>
								<label class="radio-inline">
								  <input type="radio" name="statuskawin" id="belumkawin" value="Belum Kawin"> Belum Kawin
								</label>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Pendidikan Terakhir</label>
							<div class="col-md-6">
								<label class="radio-inline">
								  <input type="radio" name="pendidikanterakhir" id="smp" value="SMP"> SMP
								</label>
								<label class="radio-inline">
								  <input type="radio" name="pendidikanterakhir" id="sma" value="SMA"> SMA
								</label>
								<label class="radio-inline">
								  <input type="radio" name="pendidikanterakhir" id="d" value="D"> D1/D2/D3
								</label>
								<label class="radio-inline">
								  <input type="radio" name="pendidikanterakhir" id="s1" value="S1"> S1
								</label>
								<label class="radio-inline">
								  <input type="radio" name="pendidikanterakhir" id="s2" value="S2"> S2
								</label>
								<label class="radio-inline">
								  <input type="radio" name="pendidikanterakhir" id="s3" value="S3"> S3
								</label>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Register
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('spjs')
	<script src="../js/bootstrap.min.js"></script>
@endsection