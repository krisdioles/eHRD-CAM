@extends('app')

@include('partials.menu')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h2 class="sub-header">Penggajian</h2>
  <div class="table-responsive">
    <table class="table table-hover" id="penggajian" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>#</th>
          @if(Auth::user()->idpegawai==1)
            <th>Nama Pegawai</th>  
          @endif
          <th>Tanggal Penggajian</th>
          <th>Periode Penggajian</th>
          <th>Biaya Bonus</th>
          <th>Biaya Potongan</th>
          <th>Jumlah Penggajian (Rp.)</th>
          <th>Cara Bayar</th>
          <th>Nama Bank</th>
          <th>No Rekening</th>
          <th>Nama Pemilik Rekening</th>
          <th width="17%"></th>

        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>#</th>
          @if(Auth::user()->idpegawai==1)
            <th>Nama Pegawai</th>  
          @endif
          <th>Tanggal Penggajian</th>
          <th>Periode Penggajian</th>
          <th>Biaya Bonus</th>
          <th>Biaya Potongan</th>
          <th>Jumlah Penggajian (Rp.)</th>
          <th>Cara Bayar</th>
          <th>Nama Bank</th>
          <th>No Rekening</th>
          <th>Nama Pemilik Rekening</th>
          <th width="17%"></th>
        </tr>
      </tfoot>
      
    </table>

    @if(Auth::user()->idpegawai==1)
      <a class="btn btn-default" href="{{ url('/penggajian/create') }}" role="button">Add</a>
    @endif
    
  </div>
</div>
@stop

@if(Auth::user()->idpegawai==1)
  @push('scripts')
    <script>
    $(document).ready(function() {
      // Setup - add a text input to each footer cell
      $('#penggajian tfoot th').each( function () {
          var title = $(this).text();
          $(this).html( '<input type="text" />' );
      } );

      var table = $('#penggajian').DataTable({
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
                targets: [0,4,5,7,8,9,10],
                visible: false
            }],
            processing: true,
            serverSide: true,
            ajax: '{!! route('penggajian.data') !!}',
            columns: [
                { data: 'idpenggajian', name: 'penggajian.idpenggajian' },
                { data: 'nama', name: 'pegawai.nama' },
                { data: 'tglpenggajian', name: 'penggajian.tglpenggajian' },
                { data: 'periodepenggajian', name: 'penggajian.periodepenggajian' },
                { data: 'biayabonus', name: 'penggajian.biayabonus' },
                { data: 'biayapotongan', name: 'penggajian.biayapotongan' },
                { data: 'jumlahpenggajian', name: 'penggajian.jumlahpenggajian' },
                { data: 'carabayar', name: 'penggajian.carabayar' },
                { data: 'namabank', name: 'penggajian.namabank' },
                { data: 'norekening', name: 'penggajian.norekening' },
                { data: 'namarekening', name: 'penggajian.namarekening' },
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
      $('#penggajian tfoot th').each( function () {
          var title = $(this).text();
          $(this).html( '<input type="text" />' );
      } );

      var table = $('#penggajian').DataTable({
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
                targets: [0,3,4,6,7,8,9],
                visible: false
            }],
            processing: true,
            serverSide: true,
            ajax: '{!! route('penggajian.data') !!}',
            columns: [
                { data: 'idpenggajian', name: 'penggajian.idpenggajian' },
                { data: 'tglpenggajian', name: 'penggajian.tglpenggajian' },
                { data: 'periodepenggajian', name: 'penggajian.periodepenggajian' },
                { data: 'biayabonus', name: 'penggajian.biayabonus' },
                { data: 'biayapotongan', name: 'penggajian.biayapotongan' },
                { data: 'jumlahpenggajian', name: 'penggajian.jumlahpenggajian' },
                { data: 'carabayar', name: 'penggajian.carabayar' },
                { data: 'namabank', name: 'penggajian.namabank' },
                { data: 'norekening', name: 'penggajian.norekening' },
                { data: 'namarekening', name: 'penggajian.namarekening' },
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