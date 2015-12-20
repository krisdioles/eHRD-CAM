@extends('app')

@include('partials.menu')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h2 class="sub-header">PHK</h2>
  <div class="table-responsive">
    <table class="table table-hover" id="phk" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Pegawai</th>
          <th>Tanggal PHK</th>
          <th>Jenis PHK</th>
          <th>Nomor Surat</th>
          <th>Keterangan</th>
          <th></th>

        </tr>
      </thead>
    </table>

    @if(Auth::user()->idpegawai==1)
      <a class="btn btn-default" href="{{ url('/phk/create') }}" role="button">Create</a>
    @endif
    
  </div>
</div>
@stop

@push('scripts')
  <script>
  $(document).ready(function() {
      $('#phk').DataTable({
          dom: 'Bfrtlip',
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
                  extend: 'csvFlash',
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
          ajax: '{!! route('phk.data') !!}',
          columns: [
              { data: 'idphk', name: 'phk.idphk' },
              { data: 'nama', name: 'pegawai.nama' },
              { data: 'tglphk', name: 'phk.tglphk' },
              { data: 'jenisphk', name: 'phk.jenisphk' },
              { data: 'nomorsurat', name: 'phk.nomorsurat' },
              { data: 'keterangan', name: 'phk.keterangan' },
              { data: 'action', name: 'action', orderable: false, searchable: false }
          ]
      });
  });
  </script>
  @endpush