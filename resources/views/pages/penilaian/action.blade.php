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

<!-- Button trigger modal -->
<div class="form-group">
	<form action="{{ url('/penilaian/'.$penilaian->idpenilaian.'/delete') }}">
	    <button class="btn-xs btn-link" type="submit">Delete</button>
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
	        {!! Form::open(['method' => 'DELETE', 'route' => ['penilaian.destroy', $penilaian->idpenilaian]]) !!}
			    <button class="btn btn-primary" type="submit">Delete</button>
			{!! Form::close() !!}
		</div>
      </div>
    </div>
  </div>
</div>