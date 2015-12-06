@extends('app')

@include('partials.menu')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h2 class="sub-header">Training</h2>
  <div class="table-responsive">
    <table class="table table-hover" id="training" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Training</th>
          <th>Lokasi</th>
          <th>Tanggal Training</th>
          <th>Anggaran</th>
          <th></th>

          @if(Auth::user()->idpegawai==1)
            <th></th>
            
          @endif
          
        </tr>
      </thead>
    </table>

    @if(Auth::user()->idpegawai==1)
      <a class="btn btn-default" href="{{ url('/training/create') }}" role="button">Create</a>
    @endif
  </div>
</div>
@stop

@push('scripts')
<script>
$(document).ready(function() {
    $('#training').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('training.data') !!}',
        columns: [
            { data: 'idtraining', name: 'idtraining' },
            { data: 'namatraining', name: 'namatraining' },
            { data: 'lokasi', name: 'lokasi' },
            { data: 'tgltraining', name: 'tgltraining' },
            { data: 'anggaran', name: 'anggaran' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});
</script>
@endpush