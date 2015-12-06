<div class="form-group">
	<form action="{{ url('/training/'.$training->idtraining.'/show') }}">
	    <button class="btn-xs btn-link" type="submit">Show</button>
	</form>
</div>

@if(Auth::user()->idpegawai==1)
<div class="form-group">
	<form action="{{ url('/training/'.$training->idtraining.'/edit') }}">
	    <button class="btn-xs btn-link" type="submit">Edit</button>
	</form>
</div>

<div class="form-group">
	{!! Form::open(['method' => 'DELETE', 'route' => ['training.destroy', $training->idtraining]]) !!}
	    <button class="btn-xs btn-link" type="submit">Delete</button>
	{!! Form::close() !!}
</div>
@endif