<div class="form-group">
	<form action="{{ url('/cuti/'.$cuti->idcuti.'/show') }}">
	    <button class="btn-xs btn-link" type="submit">Show</button>
	</form>
</div>

@if(Auth::user()->idpegawai!=1)
	@unless($cuti->status=='Accepted'||$cuti->status=='Declined')
	<div class="form-group">
		<form action="{{ url('/cuti/'.$cuti->idcuti.'/edit') }}">
		    <button class="btn-xs btn-link" type="submit">Edit</button>
		</form>
	</div>

	<!-- Button trigger modal -->
	<div class="form-group">
		<form action="{{ url('/cuti/'.$cuti->idcuti.'/delete') }}">
		    <button class="btn-xs btn-link" type="submit">Delete</button>
		</form>
	</div>
	@endunless

@else

<div class="form-group">
	<form action="{{ url('/cuti/'.$cuti->idcuti.'/edit') }}">
	    <button class="btn-xs btn-link" type="submit">Edit</button>
	</form>
</div>

<!-- Button trigger modal -->
<div class="form-group">
	<form action="{{ url('/cuti/'.$cuti->idcuti.'/delete') }}">
	    <button class="btn-xs btn-link" type="submit">Delete</button>
	</form>
</div>

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