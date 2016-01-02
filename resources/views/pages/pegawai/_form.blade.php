<!-- Pelanggaran for Pegawai Form Input -->
<div class="form-group">
	{!! Form::label('nama', 'Nama Pegawai : ') !!}
	{!! Form::text('nama', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('foto', 'Foto Profil : ') !!}
    {!! Form::file('foto', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('tgllahir', 'Tanggal Lahir : ') !!}
	{!! Form::input('date', 'tgllahir', $pegawai->tgllahir->format('Y-m-d'), ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('email', 'E-Mail : ') !!}
	{!! Form::text('email', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('alamat', 'Alamat : ') !!}
	{!! Form::textarea('alamat', null, ['class'=>'form-control']) !!}
</div>

<!-- Jenis Kelamin Form Input -->
<div class="form-group">
	{!! Form::label('jeniskelamin', 'Jenis Kelamin : ') !!}
	{!! Form::radio('jeniskelamin', 'pria', null) !!} Pria 
	{!! Form::radio('jeniskelamin', 'wanita', null) !!} Wanita
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
	{!! Form::submit($submitButtonText, ['class'=>'btn btn-primary form-control']) !!}
</div>