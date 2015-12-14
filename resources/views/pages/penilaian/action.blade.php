<div class="form-group">
	<form action="{{ url('/penilaian/'.$penilaian->idpenilaian.'/show') }}">
	    <button class="btn-xs btn-link" type="submit">Show</button>
	</form>
</div>

<div class="form-group">
	<form action="{{ url('/penilaian/'.$penilaian->pegawai_id.'/create') }}">
	    <button class="btn-xs btn-link" type="submit">Create</button>
	</form>
</div>

<div class="form-group">
	{!! Form::open(['method' => 'DELETE', 'route' => ['penilaian.destroy', $penilaian->idpenilaian]]) !!}
	    <button class="btn-xs btn-link" type="submit">Delete</button>
	{!! Form::close() !!}
</div>