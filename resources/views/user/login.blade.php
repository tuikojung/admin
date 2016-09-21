<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin</title>

    <!-- Bootstrap -->
    <link href="{{ URL::asset('resources/assets/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ URL::asset('resources/assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ URL::asset('resources/assets/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{ URL::asset('resources/assets/https://colorlib.com/polygon/gentelella/css/animate.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ URL::asset('resources/assets/build/css/custom.min.css') }}" rel="stylesheet">
  </head>

  <body class="login"> 
    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">

          <section class="login_content">
            {!! Form::open(array('route'=>'handlelogin')) !!}
              <h1>Login Form</h1>

              <div>
                <input type="text" name="email" class="form-control" placeholder="Email"/>
                {{ $errors->first('email') }}

              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" />
               
              </div>
              <div>

                <input type="submit" name="submit" value="Log in" class="btn btn-default submit">
                <a class="reset_pass" href="#">Forgot your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="{{ route('register.create') }}" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Company name</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            {!!Form::close()!!}
          </section>
        </div>

        
      </div>
    </div>
  </body>
</html>