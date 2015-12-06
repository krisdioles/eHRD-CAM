<div class="form-group">
	<form action="{{ url('/penilaian/'.$penilaian->idpenilaian.'/edit') }}">
	    <button class="btn-xs btn-link" type="submit">Edit</button>
	</form>
</div>

<div class="form-group">
	{!! Form::open(['method' => 'DELETE', 'route' => ['penilaian.destroy', $penilaian->idpenilaian]]) !!}
	    <button class="btn-xs btn-link" type="submit">Delete</button>
	{!! Form::close() !!}
</div>