    <html>
    <head>
        <meta charset="UTF-8">
        <title>AdminLTE 2 | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 --> 


<link href="{{ asset("/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="{{ asset("/bower_components/AdminLTE/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
              page. However, you can choose any other skin. Make sure you
              apply the skin class to the body tag so the changes take effect.
        -->
        <link href="{{ asset("/bower_components/AdminLTE/dist/css/skins/skin-blue.min.css")}}" rel="stylesheet" type="text/css" />

<body style="background-color:#E6E6E6">

<h2 style="text-align:center;margin-top:10%;color:#58ACFA">Reset Your Password</h2>

<form method="POST" action="/password/reset" style="margin: 0 auto;margin-left:25%;margin-top:8%">
    {!! csrf_field() !!}
    <input type="hidden" name="token" value="{{ $token }}">

 

    <div class="form-group">
        <label for="email" class="col-lg-2 control-label">E-mail</label>
        <div class="col-lg-5  @if  ($errors->has('email')) has-error @endif" >
        <input class="form-control" type="email" name="email" value="{{ old('email') }}">
            @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
        </div>
    </div>
    
    <br>
    <br>
    <br>
    <br>

    <div class="form-group">
        <label for="password" class="col-lg-2 control-label">Password</label>
        <div class="col-lg-5  @if ($errors->has('password')) has-error @endif">
        <input class="form-control" type="password" name="password">
            @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
        </div>
    </div>

    <br>
    <br>
    <br>
    
    <div class="form-group">
        <label for="confirm_password" class="col-lg-2 control-label">Confirm Password</label>
        <div class="col-lg-5" >
        <input class="form-control" type="password" name="password_confirmation">
        </div>
    </div>

    <br>
    <br>
    
    
    <div class="form-group">
        <div class="col-lg-3 col-lg-offset-2" align="right" >
        
        
      </div>
    <div class="col-lg-2  " >
        
        <button type="submit"  class="btn btn-primary btn-block " style="padding-right:0cm" >
            Reset Password
        </button>
        </div>
         <div class="col-lg-1 col-lg-offset-2" align="right" >
           
      </div>
        
    </div>
</form>
        </body>
        </head>
</html>