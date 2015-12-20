<div class="form-group">
	<form action="{{ url('/pegawai/'.$pegawai->idpegawai.'/edit') }}">
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
	        {!! Form::open(['method' => 'DELETE', 'route' => ['pegawai.destroy', $pegawai->idpegawai]]) !!}
			    <button class="btn btn-primary" type="submit">Delete</button>
			{!! Form::close() !!}
		</div>
      </div>
    </div>
  </div>
</div>