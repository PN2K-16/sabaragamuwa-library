
    <!--
    This is a starter template page. Use this page to start your new project from
    scratch. This page gets rid of all links and provides the needed markup only.
    -->
    <html>
    <head>
      <!--  <meta charset="UTF-8">-->
        <title>Public Library</title>
     <!--  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>-->
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
   
<body style="background-image:url('../landing-background.png');background-size:100% 100%">
    
    <div style="width:100%;background-color:#0080FF;height:100px;opacity: 0.9">
        
        <div class="row">
            <div class="col-sm-1">
            </div>
           <div class="col-md-2">
              <img src="{{URL::asset('/government-logo.png')}}" alt="logo" style="height: 100%;"/>
           </div>
           <div class="col-md-8">
              <h1 style="color:white">Welcome to Sabaragamuwa Public Library</h1>
           </div>
        </div>
        
    </div>
       
    
    

<div class="container">    
        <div id="loginbox" style="margin-top:80px;opacity: 0.9" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Sign In</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="/forgotps">Forgot password?</a></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                        
                        @if ($error = $errors->first('password'))
  <div class="alert alert-danger">
    {{ $error }}
  </div>
@endif
                        
                            
                        <form method="post" action="/Login" novalidate id="loginform" class="form-horizontal">
                                     {!! csrf_field() !!}
                            <div style="margin-bottom: 25px" class="input-group">
                                       
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="email" type="text" class="form-control" name="email" value="" placeholder="email">                                              
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                       
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="password" type="password" class="form-control" name="password" placeholder="password">
                                       
                                    </div>
                                    



                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                      <button type="submit" id="btn-login"  class="btn btn-success">Login  </button>
                                    

                                    </div>
                                </div>


                               
                            </form>     



                        </div>                     
                    </div>  
        </div>
       
    </div>
        
        
            <script src="{{ asset ("/bower_components/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js") }}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset ("/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset ("/bower_components/AdminLTE/dist/js/app.min.js") }}" type="text/javascript"></script>
    <!-- Barcode -->
     <script src="{{ asset ("/bower_components/AdminLTE/plugins/jquery_bc/jquery-barcode.js") }}" type="text/javascript"></script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
          Both of these plugins are recommended to enhance the
          user experience -->
    </body>
</html>
    