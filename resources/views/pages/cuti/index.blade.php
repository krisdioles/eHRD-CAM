@extends('app')

@include('partials.menu')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h2 class="sub-header">Cuti</h2>
  <div class="table-responsive">
    <table class="table table-hover" id="cuti" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>#</th>
          <th>Jenis Cuti</th>
          <th>Tanggal Awal</th>
          <th>Tanggal Akhir</th>
          <th>Status</th>

          @if(Auth::user()->idpegawai==1)
            <th>Diajukan Oleh</th>
            <th width="26%"></th>
          @else
            <th width="17%"></th>
          @endif

        </tr>
      </thead>

      <tfoot>
        <tr>
          <th>#</th>
          <th>Jenis Cuti</th>
          <th>Tanggal Awal</th>
          <th>Tanggal Akhir</th>
          <th>Status</th>

          @if(Auth::user()->idpegawai==1)
            <th>Diajukan Oleh</th>
            <th width="26%"></th>
          @else
            <th width="17%"></th>
          @endif
        </tr>
      </tfoot>
      
    </table>

    @if(Auth::user()->idpegawai!=1)
      <a class="btn btn-default" href="{{ url('/cuti/create') }}" role="button">Add</a>
    @endif
    
  </div>
</div>
@stop

@if(Auth::user()->idpegawai==1)
  @push('scripts')
  <script>
  $(document).ready(function() {
      // Setup - add a text input to each footer cell
      $('#cuti tfoot th').each( function () {
          var title = $(this).text();
          $(this).html( '<input type="text" />' );
      } );

      var table = $('#cuti').DataTable({
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
          ajax: '{!! route('cuti.data') !!}',
          columns: [
              { data: 'idcuti', name: 'cuti.idcuti' },
              { data: 'jeniscuti', name: 'cuti.jeniscuti' },
              { data: 'tglawal', name: 'cuti.tglawal' },
              { data: 'tglakhir', name: 'cuti.tglakhir' },
              { data: 'status', name: 'cuti.status' },
              { data: 'nama', name: 'pegawai.nama' },
              { data: 'action', name: 'action', orderable: false, searchable: false }
          ],
      });
      // Apply the search
      table.columns().every( function () {
          var that = this;
   
          $( 'input', this.footer() ).on( 'keyup change', function () {
              if ( that.search() !== this.value ) {
                  that
                      .search( this.value )
                      .draw();
              }
          });
      });
  });
  </script>
  @endpush
@else
  @push('scripts')
  <script>
  $(document).ready(function() {
      // Setup - add a text input to each footer cell
      $('#cuti tfoot th').each( function () {
          var title = $(this).text();
          $(this).html( '<input type="text" />' );
      } );

      var table = $('#cuti').DataTable({
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
          ajax: '{!! route('cuti.data') !!}',
          columns: [
              { data: 'idcuti', name: '.idcuti' },
              { data: 'jeniscuti', name: 'jeniscuti' },
              { data: 'tglawal', name: 'tglawal' },
              { data: 'tglakhir', name: 'tglakhir' },
              { data: 'status', name: 'status' },
              { data: 'action', name: 'action', orderable: false, searchable: false }
          ],
      });

      // Apply the search
      table.columns().every( function () {
          var that = this;
   
          $( 'input', this.footer() ).on( 'keyup change', function () {
              if ( that.search() !== this.value ) {
                  that
                      .search( this.value )
                      .draw();
              }
          });
      });
      
  });
  </script>
  @endpush
@endif