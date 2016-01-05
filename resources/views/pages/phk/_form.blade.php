@if($submitButtonText=='Buat PHK')
	<!-- Pelanggaran for Pegawai Form Input -->
	<div class="form-group">
		{!! Form::label('namapegawai', 'Nama Pegawai : ') !!}
		{!! Form::select('pegawai_id', $pegawai, null, ['class'=>'form-control']) !!}
	</div>
@endif

<div class="form-group">
	{!! Form::label('tglphk', 'Tanggal PHK : ') !!}
	{!! Form::input('date', 'tglphk', $phk->tglphk->format('Y-m-d'), ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('jenisphk', 'Jenis PHK : ') !!}
	{!! Form::text('jenisphk', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('nomorsurat', 'Nomor Surat : ') !!}
	{!! Form::text('nomorsurat', null, ['class'=>'form-control']) !!}
</div>

<!-- Keterangan Form Input -->
<div class="form-group">
	{!! Form::label('keterangan', 'Keterangan : ') !!}
	{!! Form::textarea('keterangan', null, ['class'=>'form-control', 'rows'=>'3']) !!}
</div>

<div class="form-group">
	{!! Form::submit($submitButtonText, ['class'=>'btn btn-primary form-control']) !!}
</div>