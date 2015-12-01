{!! Form::hidden('pegawai_id', Auth::user()->idpegawai) !!}

<div class="form-group">
	{!! Form::label('namapegawai', 'Nama Pegawai : ') !!}
	<p class="form-control-static">{{ $penilaian->pegawai->nama }}</p>
</div>

<div class="form-group">
	{!! Form::label('nilaikompetensi', 'Nilai Kompetensi : ') !!}
	{!! Form::text('nilaikompetensi', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('nilaikedisiplinan', 'Nilai Kedisiplinan : ') !!}
	{!! Form::text('nilaikedisiplinan', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('nilaiperilaku', 'Nilai Perilaku : ') !!}
	{!! Form::text('nilaiperilaku', null, ['class'=>'form-control']) !!}
</div>

<!-- Keterangan Form Input -->
<div class="form-group">
	{!! Form::label('keterangan', 'Keterangan : ') !!}
	{!! Form::textarea('keterangan', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::submit($submitButtonText, ['class'=>'btn btn-primary form-control']) !!}
</div>