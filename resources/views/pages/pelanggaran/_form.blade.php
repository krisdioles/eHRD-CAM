<!-- Pelanggaran for Pegawai Form Input -->
<div class="form-group">
	{!! Form::label('namapegawai', 'Nama Pegawai : ') !!}
	{!! Form::select('pegawai_id', $pegawai, null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('tglpelanggaran', 'Tanggal Pelanggaran : ') !!}
	{!! Form::input('date', 'tglpelanggaran', $pelanggaran->tglpelanggaran->format('Y-m-d'), ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('jenispelanggaran', 'Jenis Pelanggaran : ') !!}
	{!! Form::text('jenispelanggaran', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('sanksi', 'Sanksi : ') !!}
	{!! Form::text('sanksi', null, ['class'=>'form-control']) !!}
</div>

<!-- Keterangan Form Input -->
<div class="form-group">
	{!! Form::label('keterangan', 'Keterangan : ') !!}
	{!! Form::textarea('keterangan', null, ['class'=>'form-control', 'rows'=>'3']) !!}
</div>

<div class="form-group">
	{!! Form::submit($submitButtonText, ['class'=>'btn btn-primary']) !!}
	<a class="btn btn-primary" href="/eHRD-CAM/public/pelanggaran" role="button">Kembali</a>
</div>