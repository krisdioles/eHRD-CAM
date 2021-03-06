<div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="{{ Request::segment(1) === 'dashboard' ? 'active' : null }}"><a href="/eHRD-CAM/public/dashboard">Overview</a></li>
            <li class="{{ Request::segment(1) === 'absensi' ? 'active' : null }}"><a href="/eHRD-CAM/public/absensi">Absensi</a></li>
            <li class="{{ Request::segment(1) === 'cuti' ? 'active' : null }}"><a href="/eHRD-CAM/public/cuti">Cuti</a></li>
            <li class="{{ Request::segment(1) === 'lembur' ? 'active' : null }}"><a href="/eHRD-CAM/public/lembur">Lembur</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li class="{{ Request::segment(1) === 'training' ? 'active' : null }}"><a href="/eHRD-CAM/public/training">Training</a></li>
          </ul>

          <ul class="nav nav-sidebar">
          @if(Auth::user()->idpegawai==1)
            <li class="{{ Request::segment(1) === 'pegawai' ? 'active' : null }}"><a href="/eHRD-CAM/public/pegawai">Pegawai</a></li>
            <li class="{{ Request::segment(1) === 'penilaian' ? 'active' : null }}"><a href="/eHRD-CAM/public/penilaian">Penilaian</a></li>
            <li class="{{ Request::segment(1) === 'pelanggaran' ? 'active' : null }}"><a href="/eHRD-CAM/public/pelanggaran">Pelanggaran</a></li>
          @endif
            <li class="{{ Request::segment(1) === 'penggajian' ? 'active' : null }}"><a href="/eHRD-CAM/public/penggajian">Penggajian</a></li>
          @if(Auth::user()->idpegawai==1)
            <li class="{{ Request::segment(1) === 'phk' ? 'active' : null }}"><a href="/eHRD-CAM/public/phk">PHK</a></li>
          @endif
            </ul>
          
        </div>
      </div>
</div>