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
	{!! Form::input('date', 'tgllahir', $pegawai->tgllahir->format('Y-m-d'), ['class'=>'form-control']) !!}
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
	{!! Form::submit($submitButtonText, ['class'=>'btn btn-primary']) !!}
	<a class="btn btn-primary" href="/eHRD-CAM/public/pegawai" role="button">Back</a>
</div>