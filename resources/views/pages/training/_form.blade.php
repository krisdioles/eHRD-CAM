<div class="form-group">
	{!! Form::label('namatraining', 'Nama Training : ') !!}
	{!! Form::text('namatraining', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('lokasi', 'Lokasi : ') !!}
	{!! Form::text('lokasi', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('tgltraining', 'Tanggal Training : ') !!}
	{!! Form::input('date', 'tgltraining', date('Y-m-d'), ['class'=>'form-control']) !!}
</div>

<!-- Pegawai for Training Form Input -->
<div class="form-group">
	{!! Form::label('pegawai_list', 'Pegawai : ') !!}
	{!! Form::select('pegawai_list[]', $peg, null, ['class'=>'form-control', 'multiple'=>'multiple']) !!}
</div>

<div class="form-group">
	{!! Form::submit($submitButtonText, ['class'=>'btn btn-primary form-control']) !!}
</div>