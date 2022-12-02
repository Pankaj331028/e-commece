<!DOCTYPE html>
<html>
  <head>  
    <title> LOGIN Form</title>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="{{asset('css/admin-login.css')}}">
      <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
       
  </head>
  <body>
    <img class="log">
    <div class="loginbox">
    <img src="{{URL('css/images/avatar1.jpg')}}" class="avatar">
    <h1>Login Here</h1>
    
    <form action="{{route('login.store')}}" method="post">
      @if(Session::has('success'))
      <div class="success">{{Session::get('success')}}</div>
      @endif
      @if(Session::has('error'))
      <div class="error">{{Session::get('error')}}</div>
      @endif
    @csrf
    <p> Email</p>
    <input type="search" name="email" placeholder="Enter Email">
    <span class="error">@error('email'){{$message}}@enderror</span>
    <p> Password</p>
   <div class="password"> <input type="password" id="passInput" name="password" placeholder="Enter Password">
    <ion-icon id="oneye" name="eye-outline"></ion-icon>
    <ion-icon id="offeye"name="eye-off-outline"></ion-icon></div>
    <span>@error('passwored'){{$message}}@enderror</span>
    <span class="error">@error('password'){{$message}}@enderror</span><br>
    <input type="submit" name="" value="Login">
    <a href="#">Lost your password?</a><br>
    <a href="#">Don't have an acoount?</a>
    </form>
    </div>
    <script>
      $(document).ready(function(){
 
        $('#offeye').on('click', function(){
            $("#offeye").hide();
            $("#oneye").show();
            $("#passInput").attr('type','text');
       });
          $('#oneye').on('click', function(){
            $("#offeye").show();
            $("#oneye").hide();
            $("#passInput").attr('type','password');
          });
 
        // $("#offeye").click(function(){
        //   $("#offeye").toggle('').remove();
        //   $(".hide").addClass('hid');


        // });
      });
</script>
  </body>
</html>