<div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="{{ Request::segment(1) === 'dashboard' ? 'active' : null }}"><a href="/eHRD-CAM/public/dashboard">Overview <span class="sr-only">(current)</span></a></li>
            <li class="{{ Request::segment(1) === 'absensi' ? 'active' : null }}"><a href="/eHRD-CAM/public/absensi">Absensi</a></li>
            <li class="{{ Request::segment(1) === 'cuti' ? 'active' : null }}"><a href="/eHRD-CAM/public/cuti">Cuti</a></li>
            <li class="{{ Request::segment(1) === 'lembur' ? 'active' : null }}"><a href="#">Lembur</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li class="{{ Request::segment(1) === 'training' ? 'active' : null }}"><a href="/eHRD-CAM/public/training">Training</a></li>
            <li class="{{ Request::segment(1) === 'penilaian' ? 'active' : null }}"><a href="">Penilaian</a></li>
            <li class="{{ Request::segment(1) === 'pelanggaran' ? 'active' : null }}"><a href="">Pelanggaran</a></li>
            <li class="{{ Request::segment(1) === 'penggajian' ? 'active' : null }}"><a href="">Penggajian</a></li>
            <li class="{{ Request::segment(1) === 'phk' ? 'active' : null }}"><a href="">PHK</a></li>
          </ul>
        </div>
      </div>
</div>