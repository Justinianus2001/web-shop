<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="csrf-token" content="{{csrf_token()}}">
      <link rel="shortcut icon" href="source/images/favicon.png">
      <title>Welcome to FlatShop</title>
      <base href="{{asset(' ')}}"/>
      <link href="source/css/bootstrap.css" rel="stylesheet">
      <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,700,500italic,100italic,100' rel='stylesheet' type='text/css'>
      <link href="source/css/font-awesome.min.css" rel="stylesheet">
      <link rel="stylesheet" href="source/css/flexslider.css" type="text/css" media="screen"/>
      <link href="source/css/sequence-looptheme.css" rel="stylesheet" media="all"/>
      <link href="source/css/style.css" rel="stylesheet">
      <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script><![endif]-->
   </head>
   <body id="home">
      <div class="wrapper">
         @include('header')
         <div class="clearfix"></div>
         @yield('content')
         <div class="clearfix"></div>
         @include('footer')
      </div>
      <!-- Bootstrap core JavaScript==================================================-->
      <script type="text/javascript" src="source/js/jquery-1.10.2.min.js"></script>
      <script type="text/javascript" src="source/js/jquery.easing.1.3.js"></script>
      <script type="text/javascript" src="source/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="source/js/jquery.sequence-min.js"></script>
      <script type="text/javascript" src="source/js/jquery.carouFredSel-6.2.1-packed.js"></script>
      <script defer src="source/js/jquery.flexslider.js"></script>
      <script type="text/javascript" src="source/js/script.min.js" ></script>
      <script>
      $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      });
      </script>
   </body>
</html>