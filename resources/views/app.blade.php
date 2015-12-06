<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Dashboard</title>

    @yield('spcss')

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.10/css/dataTables.bootstrap.min.css"/>

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">

  </head>

  <body>
    @include('partials.nav')
    
    @include('flash::message')

    @yield('content')

    @yield('spjs')

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.10/js/dataTables.bootstrap.min.js"></script>
    

    <script>
        //$('#flash-overlay-modal').modal('show');
        $('div.alert').not('.alert-important').delay(2000).slideUp(300);
    </script>
    @stack('scripts')

  </body>
</html>
