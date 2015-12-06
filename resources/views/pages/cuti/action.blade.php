@if(Auth::user()->idpegawai!=1)
<div class="form-group">
	<form action="{{ url('/cuti/'.$cuti->idcuti.'/edit') }}">
	    <button class="btn-xs btn-link" type="submit">Edit</button>
	</form>
</div>

<div class="form-group">
	{!! Form::open(['method' => 'DELETE', 'route' => ['cuti.destroy', $cuti->idcuti]]) !!}
	    <button class="btn-xs btn-link" type="submit">Delete</button>
	{!! Form::close() !!}
</div>
@else
<div class="form-group">
	<form action="{{ url('/cuti/'.$cuti->idcuti.'/accept') }}">
	    <button class="btn-xs btn-link" type="submit">Accept</button>
	</form>
</div>

<div class="form-group">
	<form action="{{ url('/cuti/'.$cuti->idcuti.'/decline') }}">
	    <button class="btn-xs btn-link" type="submit">Decline</button>
	</form>
</div>
@endif