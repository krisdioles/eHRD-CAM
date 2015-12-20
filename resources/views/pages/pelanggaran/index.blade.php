@extends('app')

@include('partials.menu')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h2 class="sub-header">Pelanggaran</h2>
  <div class="table-responsive">
    <table class="table table-hover" id="pelanggaran" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Pegawai</th>
          <th>Tanggal Pelanggaran</th>
          <th>Jenis Pelanggaran</th>
          <th>Sanksi</th>
          <th>Keterangan</th>
          <th></th>
        </tr>
      </thead>
    </table>

    @if(Auth::user()->idpegawai==1)
      <a class="btn btn-default" href="{{ url('/pelanggaran/create') }}" role="button">Create</a>
    @endif
    
  </div>
</div>
@stop

@push('scripts')
  <script>
  $(document).ready(function() {
      $('#pelanggaran').DataTable({
          dom: 'Bfrtip',
          buttons: [
              {
                  extend: 'print',
                  exportOptions: {
                      columns: ':visible'
                  }
              },
              {
                  extend: 'copyFlash',
                  exportOptions: {
                      columns: ':visible'
                  }
              },
              {
                  extend: 'excelFlash',
                  exportOptions: {
                      columns: ':visible'
                  }
              },
              {
                  extend: 'pdfFlash',
                  exportOptions: {
                      columns: ':visible'
                  }
              },
              'colvis',
          ],
          columnDefs: [{
              targets: 0,
              visible: false
          }],
          processing: true,
          serverSide: true,
          ajax: '{!! route('pelanggaran.data') !!}',
          columns: [
              { data: 'idpelanggaran', name: 'pelanggaran.idpelanggaran' },
              { data: 'nama', name: 'pegawai.nama' },
              { data: 'tglpelanggaran', name: 'pelanggaran.tglpelanggaran' },
              { data: 'jenispelanggaran', name: 'pelanggaran.jenispelanggaran' },
              { data: 'sanksi', name: 'pelanggaran.sanksi' },
              { data: 'keterangan', name: 'pelanggaran.keterangan' },
              { data: 'action', name: 'action', orderable: false, searchable: false }
          ]
      });
  });
  </script>
  @endpush