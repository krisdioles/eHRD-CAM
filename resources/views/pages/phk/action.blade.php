<div class="form-group">
	<form action="{{ url('/phk/'.$phk->idphk.'/show') }}">
	    <button class="btn-xs btn-link" type="submit">Show</button>
	</form>
</div>

<div class="form-group">
	<form action="{{ url('/phk/'.$phk->idphk.'/edit') }}">
	    <button class="btn-xs btn-link" type="submit">Edit</button>
	</form>
</div>

<div class="form-group">
	{!! Form::open(['method' => 'DELETE', 'route' => ['phk.destroy', $phk->idphk]]) !!}
	    <button class="btn-xs btn-link" type="submit">Delete</button>
	{!! Form::close() !!}
</div>