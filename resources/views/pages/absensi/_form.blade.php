<div class="form-group">
	{!! Form::label('waktumasuk', 'Waktu Masuk : ') !!}
	{!! Form::input('date', 'waktumasuk', $absensi->waktumasuk->format('Y-m-d'), ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('waktupulang', 'Waktu Pulang : ') !!}
	{!! Form::input('date', 'waktupulang', $absensi->waktupulang->format('Y-m-d'), ['class'=>'form-control']) !!}
</div>


<div class="form-group">
	{!! Form::label('statusmasuk', 'Status Masuk : ') !!}
	{!! Form::text('statusmasuk', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('statuspulang', 'Status Pulang : ') !!}
	{!! Form::text('statuspulang', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('keterangan', 'Keterangan : ') !!}
	{!! Form::textarea('keterangan', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::submit($submitButtonText, ['class'=>'btn btn-primary form-control']) !!}
</div>