<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/eHRD-CAM/public/">e-HRM PT Carmel Anugrah Mandiri</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/eHRD-CAM/public/"><span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span>   Dashboard</a></li>

          @if(!Auth::check())
            <li><a href="/eHRD-CAM/public/auth/login"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>  Login</a></li>
            <li><a href="/eHRD-CAM/public/auth/register"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>   Register</a></li>
          @else
            <li><a href="/eHRD-CAM/public/auth/logout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>  Logout as {{ Auth::user()->nama }}</a></li>
          @endif

          </ul>
        </div>
      </div>
    </nav>
