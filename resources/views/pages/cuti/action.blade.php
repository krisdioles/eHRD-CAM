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
		<form>
			<button type="button" class="btn-xs btn-link" data-toggle="modal" data-target="#deleteModal">Delete</button>
		</form>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="deleteModalLabel">Notice</h4>
	      </div>
	      <div class="modal-body">
	        Apakah anda yakin untuk menghapus data ini?
	      </div>
	      <div class="modal-footer">
	      	<div class="form-group">
	      		<form>
		        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		    	</form>
		    </div>
		    <div class="form-group">
		        {!! Form::open(['method' => 'DELETE', 'route' => ['cuti.destroy', $cuti->idcuti]]) !!}
				    <button class="btn btn-primary" type="submit">Delete</button>
				{!! Form::close() !!}
			</div>
	      </div>
	    </div>
	  </div>
	</div>
	@endunless
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