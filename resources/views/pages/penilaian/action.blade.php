<div class="form-group">
	<form action="{{ url('/penilaian/'.$penilaian->idpenilaian.'/create') }}">
	    <button class="btn-xs btn-link" type="submit">Create</button>
	</form>
</div>


<div class="form-group">
	{!! Form::open(['method' => 'DELETE', 'route' => ['penilaian.destroy', $penilaian->idpenilaian]]) !!}
	    <button class="btn-xs btn-link" type="submit">Delete</button>
	{!! Form::close() !!}
</div>
