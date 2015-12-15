@extends('app')

@include('partials.menu')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2 class="sub-header">Pegawai</h2>
    <div class="table-responsive">
      <table class="table table-hover" id="pegawai" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>Tanggal Lahir</th>
            <th></th>
          </tr>
        </thead>
      </table>
    </div>
</div>
@stop

@push('scripts')
<script>
$(document).ready(function() {
    $('#pegawai').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('pegawai.data') !!}',
        columns: [
            { data: 'idpegawai', name: 'idpegawai' },
            { data: 'nama', name: 'nama' },
            { data: 'alamat', name: 'alamat' },
            { data: 'email', name: 'email' },
            { data: 'tgllahir', name: 'tgllahir'},
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});
</script>
@endpush