<!-- Penggajian for Pegawai Form Input -->
<div class="form-group">
	{!! Form::label('namapegawai', 'Nama Pegawai : ') !!}
	{!! Form::select('pegawai_id', $pegawai, null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('tglpenggajian', 'Tanggal Penggajian : ') !!}
	{!! Form::input('date', 'tglpenggajian', $penggajian->tglpenggajian->format('Y-m-d'), ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('periodepenggajian', 'Periode Penggajian : ') !!}
	{!! Form::input('month', 'periodepenggajian', $penggajian->periodepenggajian->format('Y-m'), ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('biayabonus', 'Biaya Bonus : ') !!}
	{!! Form::text('biayabonus', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('keteranganbonus', 'Keterangan Bonus : ') !!}
	{!! Form::text('keteranganbonus', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('biayapotongan', 'Biaya Potongan : ') !!}
	{!! Form::text('biayapotongan', null, ['class'=>'form-control']) !!}
</div>

<!-- Keterangan Form Input -->
<div class="form-group">
	{!! Form::label('keteranganpotongan', 'Keterangan Potongan : ') !!}
	{!! Form::textarea('keteranganpotongan', null, ['class'=>'form-control', 'rows'=>'3']) !!}
</div>

<!-- Keterangan Form Input -->
<div class="form-group">
	{!! Form::label('keterangan', 'Keterangan : ') !!}
	{!! Form::textarea('keterangan', null, ['class'=>'form-control', 'rows'=>'3']) !!}
</div>

<div class="form-group">
	{!! Form::submit($submitButtonText, ['class'=>'btn btn-primary form-control']) !!}
</div>