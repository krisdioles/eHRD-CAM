@if($submitButtonText=='Add Penggajian')
	<!-- Pelanggaran for Pegawai Form Input -->
	<div class="form-group">
		{!! Form::label('namapegawai', 'Nama Pegawai : ') !!}
		{!! Form::select('pegawai_id', $pegawai, null, ['class'=>'form-control']) !!}
	</div>
@endif

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
	<div class="input-group">
		<div class="input-group-addon">Rp. </div>
		{!! Form::text('biayabonus', null, ['class'=>'form-control']) !!}
	</div>	
</div>

<div class="form-group">
	{!! Form::label('keteranganbonus', 'Keterangan Bonus : ') !!}
	{!! Form::text('keteranganbonus', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('biayapotongan', 'Biaya Potongan : ') !!}
	<div class="input-group">
		<div class="input-group-addon">Rp. </div>
	{!! Form::text('biayapotongan', null, ['class'=>'form-control']) !!}
	</div>
</div>

<!-- Keterangan Form Input -->
<div class="form-group">
	{!! Form::label('keteranganpotongan', 'Keterangan Potongan : ') !!}
	{!! Form::textarea('keteranganpotongan', null, ['class'=>'form-control', 'rows'=>'3']) !!}
</div>

<!-- Keterangan Form Input -->
<div class="form-group">
	{!! Form::label('carabayar', 'Cara Bayar : ') !!}
	{!! Form::text('carabayar', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('namabank', 'Nama Bank : ') !!}
	{!! Form::text('namabank', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('norekening', 'Nomor Rekening : ') !!}
	{!! Form::text('norekening', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('namarekening', 'Atas Nama : ') !!}
	{!! Form::text('namarekening', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::submit($submitButtonText, ['class'=>'btn btn-primary']) !!}
	<a class="btn btn-primary" href="/eHRD-CAM/public/penggajian" role="button">Back</a>
</div>