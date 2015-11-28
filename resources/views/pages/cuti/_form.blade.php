{!! Form::hidden('idpegawai', Auth::user()->idpegawai) !!}

<div class="form-group">
	{!! Form::label('jeniscuti', 'Jenis Cuti : ') !!}
	{!! Form::text('jeniscuti', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('tglawal', 'Tanggal Awal : ') !!}
	{!! Form::input('date', 'tglawal', date('Y-m-d'), ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('tglakhir', 'Tanggal Akhir : ') !!}
	{!! Form::input('date', 'tglakhir', date('Y-m-d'), ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::submit($submitButtonText, ['class'=>'btn btn-primary form-control']) !!}
</div>