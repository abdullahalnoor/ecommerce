<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('admin/css/main.css')}}">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css" href="{{asset('admin/css/all.min.css')}}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Login - Vali Admin</title>
  <link rel="icon" href="{{asset('img/icon.png')}}" type="image/x-icon" />
</head>

<body>
  <section class="material-half-bg">
    <div class="cover"></div>
  </section>
  <section class="login-content">
    <div class="logo">
      <h1>Vali</h1>
    </div>
    <div class="login-box">

      <form id="adminLoginForm" class="login-form" method="POST">
        {{ csrf_field() }}
        <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
        <div id="loginErr"></div>
        <div class="form-group">
          <label class="control-label">USERNAME</label>
          <input class="form-control" name="email" type="text" placeholder="Email" autofocus>
        </div>
        <div class="form-group">
          <label class="control-label">PASSWORD</label>
          <input class="form-control" id="password" type="password" name="password" autocomplete="off" placeholder="Password">
        </div>

        <div class="form-group btn-container">
          <button type="submit" class="btn btn-primary btn-block " id="loginSuc"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>

        </div>
      </form>

    </div>
  </section>
  <script src={{asset( "admin/js/jquery-3.2.1.min.js")}}></script>
  <script>
    $(document).ready(function(){
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
         $("#adminLoginForm").on("submit",function(e){
           e.preventDefault();
           var formData = $(this).serialize();
           $.ajax({
             url:"{{route('admin.login')}}",
             type:"POST",
             data:formData
           })
           .done(function(data){
             $("#loginSuc").html(`<span class='text-center text-capitalize text-white' style="font-size:18px"><i class="fas fa-spinner fa-pulse"></i>  Redirect to Dashboard..</span>`);
             window.location.href = "{{route('admin.home')}}";
           })
           .fail(function(err){
           $("#adminLoginForm #password").val("");
           $("#password").val('');
              var startTime = new Date().getTime();
              var interval = setInterval(function(){
                  if(new Date().getTime() - startTime > 8000){
                      clearInterval(interval);
                      $("#loginErr").empty();
                      return;
                  }
                  $("#loginErr").html(`
                  <h4 class='text-center  text-danger' style="font-size:18px"><i class="fas fa-sync fa-spin"></i> Email or Password is Wrong..</h4>`);
              }, 1000);    
             
           });
         })
       })
  </script>

</body>

</html>