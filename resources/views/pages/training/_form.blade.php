<div class="form-group">
	{!! Form::label('namatraining', 'Nama Training : ') !!}
	{!! Form::text('namatraining', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('tgltraining', 'Tanggal Training : ') !!}
	{!! Form::input('date', 'tgltraining', $training->tgltraining->format('Y-m-d'), ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('nomorsurat', 'Nomor Surat : ') !!}
	{!! Form::text('nomorsurat', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('lokasi', 'Lokasi : ') !!}
	{!! Form::text('lokasi', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('anggaran', 'Anggaran : ') !!}
	{!! Form::text('anggaran', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('penyelenggara', 'Penyelenggara : ') !!}
	{!! Form::text('penyelenggara', null, ['class'=>'form-control']) !!}
</div>

<!-- Pegawai for Training Form Input -->
<div class="form-group">
	{!! Form::label('pegawai_list', 'Pegawai : ') !!}
	{!! Form::select('pegawai_list[]', $peg, null, ['class'=>'form-control', 'multiple'=>'multiple']) !!}
</div>

<div class="form-group">
	{!! Form::label('keterangan', 'Keterangan : ') !!}
	{!! Form::textarea('keterangan', null, ['class'=>'form-control', 'rows'=>'3']) !!}
</div>

<div class="form-group">
	{!! Form::submit($submitButtonText, ['class'=>'btn btn-primary']) !!}
	<a class="btn btn-primary" href="/eHRD-CAM/public/training" role="button">Kembali</a>
</div>