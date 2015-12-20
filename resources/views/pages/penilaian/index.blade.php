@extends('app')

@include('partials.menu')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h2 class="sub-header">Penilaian</h2>
  <div class="table-responsive">
    <table class="table table-hover" id="penilaian" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>#</th>
          <th>#</th>
          <th>Nama Pegawai</th>
          <th>Nilai Kompetensi</th>
          <th>Nilai Kedisiplinan</th>
          <th>Nilai Perilaku</th>
          <th>Keterangan</th>
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
      $('#penilaian').DataTable({
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
          ajax: '{!! route('penilaian.data') !!}',
          columns: [
              { data: 'idpenilaian', name: 'penilaian.idpenilaian' },
              { data: 'idpegawai', name: 'pegawai.idpegawai' },
              { data: 'nama', name: 'pegawai.nama' },
              { data: 'nilaikompetensi', name: 'penilaian.nilaikompetensi' },
              { data: 'nilaikedisiplinan', name: 'penilaian.nilaikedisiplinan' },
              { data: 'nilaiperilaku', name: 'penilaian.nilaiperilaku' },
              { data: 'keterangan', name: 'penilaian.keterangan' },
              { data: 'action', name: 'action', orderable: false, searchable: false }
          ]
      });
  });
  </script>
  @endpush