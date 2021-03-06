{!! Form::hidden('pegawai_id', Auth::user()->idpegawai) !!}
{!! Form::hidden('status', 'Pending') !!}

<div class="form-group">
	{!! Form::label('tgllembur', 'Tanggal Lembur : ') !!}
	{!! Form::input('date', 'tgllembur', $lembur->tgllembur->format('Y-m-d'), ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('jangkawaktu', 'Jangka Waktu : ') !!}
	<div class="input-group">
		{!! Form::text('jangkawaktu', null, ['class'=>'form-control']) !!}
		<div class="input-group-addon">Jam</div>
	</div>
</div>

<div class="form-group">
	{!! Form::label('nomorspkl', 'Nomor SPKL : ') !!}
	{!! Form::text('nomorspkl', null, ['class'=>'form-control']) !!}
</div>

<!-- Keterangan Form Input -->
<div class="form-group">
	{!! Form::label('keterangan', 'Keterangan : ') !!}
	{!! Form::textarea('keterangan', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::submit($submitButtonText, ['class'=>'btn btn-primary']) !!}
	<a class="btn btn-primary" href="/eHRD-CAM/public/lembur" role="button">Back</a>
</div>