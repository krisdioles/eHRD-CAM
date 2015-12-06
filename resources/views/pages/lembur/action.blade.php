@if(Auth::user()->idpegawai!=1)
<div class="form-group">
	<form action="{{ url('/lembur/'.$lembur->idlembur.'/edit') }}">
	    <button class="btn-xs btn-link" type="submit">Edit</button>
	</form>
</div>

<div class="form-group">
	{!! Form::open(['method' => 'DELETE', 'route' => ['lembur.destroy', $lembur->idlembur]]) !!}
	    <button class="btn-xs btn-link" type="submit">Delete</button>
	{!! Form::close() !!}
</div>
@else
<div class="form-group">
	<form action="{{ url('/lembur/'.$lembur->idlembur.'/accept') }}">
	    <button class="btn-xs btn-link" type="submit">Accept</button>
	</form>
</div>

<div class="form-group">
	<form action="{{ url('/lembur/'.$lembur->idlembur.'/decline') }}">
	    <button class="btn-xs btn-link" type="submit">Decline</button>
	</form>
</div>
@endif