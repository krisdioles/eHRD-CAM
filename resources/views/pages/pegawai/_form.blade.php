<!-- Pelanggaran for Pegawai Form Input -->
<div class="form-group">
	{!! Form::label('nama', 'Nama Pegawai : ') !!}
	{!! Form::text('nama', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('email', 'Email : ') !!}
	{!! Form::text('email', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('alamat', 'Alamat : ') !!}
	{!! Form::textarea('alamat', null, ['class'=>'form-control']) !!}
</div>

<!-- Jenis Kelamin Form Input -->
<div class="form-group">
	{!! Form::label('jeniskelamin', 'Jenis Kelamin : ') !!}<br>
	{!! Form::radio('jeniskelamin', 'Pria', null) !!} Pria 
	{!! Form::radio('jeniskelamin', 'Wanita', null) !!} Wanita
</div>

<div class="form-group">
	{!! Form::label('telepon', 'Telepon : ') !!}
	{!! Form::text('telepon', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('tgllahir', 'Tanggal Lahir : ') !!}
	{!! Form::input('date', 'tgllahir', $pegawai->tgllahir->format('Y-m-d'), ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('agama', 'Agama : ') !!}
	{!! Form::text('agama', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('statuskawin', 'Status Kawin : ') !!}<br>
	{!! Form::radio('statuskawin', 'Belum Kawin', null) !!} Belum Kawin 
	{!! Form::radio('statuskawin', 'Sudah Kawin', null) !!} Sudah Kawin
</div>

<div class="form-group">
	{!! Form::label('pendidikanterakhir', 'Pendidikan Terakhir : ') !!}<br>
	{!! Form::radio('pendidikanterakhir', 'SMP', null) !!} SMP 
	{!! Form::radio('pendidikanterakhir', 'SMA', null) !!} SMA
	{!! Form::radio('pendidikanterakhir', 'D', null) !!} D1/D2/D3
	{!! Form::radio('pendidikanterakhir', 'S1', null) !!} S1
	{!! Form::radio('pendidikanterakhir', 'S2', null) !!} S2 
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
	{!! Form::submit($submitButtonText, ['class'=>'btn btn-primary form-control']) !!}
</div>