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