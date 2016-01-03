<div class="form-group">
	<form action="{{ url('/lembur/'.$lembur->idlembur.'/show') }}">
	    <button class="btn-xs btn-link" type="submit">Show</button>
	</form>
</div>

@if(Auth::user()->idpegawai!=1)
	@unless($lembur->status=='Accepted'||$lembur->status=='Declined')
	<div class="form-group">
		<form action="{{ url('/lembur/'.$lembur->idlembur.'/edit') }}">
		    <button class="btn-xs btn-link" type="submit">Edit</button>
		</form>
	</div>

	<div class="form-group">
		<form action="{{ url('/lembur/'.$lembur->idlembur.'/delete') }}">
		    <button class="btn-xs btn-link" type="submit">Delete</button>
		</form>
	</div>
	@endunless
@else

<div class="form-group">
	<form action="{{ url('/lembur/'.$lembur->idlembur.'/edit') }}">
	    <button class="btn-xs btn-link" type="submit">Edit</button>
	</form>
</div>

<div class="form-group">
	<form action="{{ url('/lembur/'.$lembur->idlembur.'/delete') }}">
	    <button class="btn-xs btn-link" type="submit">Delete</button>
	</form>
</div>
	
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