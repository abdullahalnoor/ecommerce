<!DOCTYPE html>
<html lang="en">

<head>

  <title> @yield('title') </title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('admin/css/main.css')}}">
  <!-- Font-icon css-->
  <link rel="stylesheet" href="{{asset('admin/css/all.min.css')}}">
  <link rel="icon" href="{{asset('img/icon.png')}}" type="image/x-icon" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <style>
    #snackbar {
      visibility: hidden;
      min-width: 250px;
      margin-left: -125px;
      background-color: #333;
      color: #fff;
      text-align: center;
      border-radius: 3px;
      padding: 10px;
      position: fixed;
      z-index: 1;
      left: 50%;
      top: 60px;
      font-size: 17px;
    }

    #snackbar.show {
      visibility: visible;
      -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
      animation: fadein 0.5s, fadeout 0.5s 2.5s;
    }



    @-webkit-keyframes fadein {
      from {
        top: 0;
        opacity: 0;
      }
      to {
        top: 50px;
        opacity: 1;
      }
    }

    @keyframes fadein {
      from {
        top: 0;
        opacity: 0;
      }
      to {
        top: 50px;
        opacity: 1;
      }
    }

    @-webkit-keyframes fadeout {
      from {
        top: 50px;
        opacity: 1;
      }
      to {
        top: 0;
        opacity: 0;
      }
    }

    @keyframes fadeout {
      from {
        top: 50px;
        opacity: 1;
      }
      to {
        top: 0;
        opacity: 0;
      }
    }
  </style>

  @stack('style')

</head>

<body class="app sidebar-mini rtl">
  <!-- Navbar-->
  @include('admin.includes.navbar')
  <!-- Sidebar menu-->
  @include('admin.includes.sidebar') @yield('content')
  @include('admin.components.snackbar-notification')
  <!-- Essential javascripts for application to work-->
  <script src={{asset( "admin/js/jquery-3.2.1.min.js")}}></script>
  <script src={{asset( "admin/js/popper.min.js")}}></script>
  <script src={{asset( "admin/js/bootstrap.min.js")}}></script>
  <script src={{asset( "admin/js/main.js")}}></script>
  <!-- The javascript plugin to display page loading on top-->
  <script src={{asset( "admin/js/plugins/pace.min.js")}}></script>
  <!-- Page specific javascripts-->
  <!-- Google analytics script-->
  <script type="text/javascript">
    if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
  </script>


  {{-- snack bar notification start --}} {{-- snack bar notification by js --}}
  <script>
    function success(data){
     var bgColor = "#6AAC73";
     var icon = ["fas","fa-check"]; 
     snackbar(data,bgColor,icon);
   };
   function info(data){ 
     var bgColor = "#52A7CB"; 
     var icon = ["fas","fa-info-circle"];
     snackbar(data,bgColor,icon);
   };
    function warning(data){
      var bgColor = "#FCAB33"; 
      var icon = ["fas","fa-exclamation-triangle"];
       snackbar(data,bgColor,icon);
     };
     function error(data){ 
       var bgColor = "#D56855"; 
       var icon = ["far","fa-times-circle"]; 
       snackbar(data,bgColor,icon);
     };

    // main function 

    function snackbar(data,bgColor,icon) {
  var x = document.getElementById("snackbar");
  x.className = "show";
  x.style.backgroundColor = bgColor;
    
    document.getElementById("snackbarIcon").classList.add(icon[0],icon[1]);



  document.getElementById("snackbarMessage").innerText = data;
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
    
  }
  </script>

  {{-- snack bar notification by session --}} @if(Session::has('success'))
  <script>
    $(function () {
     success("{{Session::get('success')}}");
   });
  </script>
  @elseif(Session::has('info'))
  <script>
    $(function () {
       info("{{Session::get('info')}}");
     });
  </script>
  @elseif(Session::has('warning'))
  <script>
    $(function () {
         warning("{{Session::get('warning')}}");
       });
  </script>
  @elseif(Session::has('error'))
  <script>
    $(function () {
    
         error("{{Session::get('error')}}");
       });
  </script>
  @endif {{-- snack bar notification end --}} @stack('script')


</body>

</html>