@extends('master')


@section('header')

@stop

@section('page header')
Edit Your Profile
@stop



@section('content')

<div class="container-fluid" style="background-color:#CEE3F6">

   <form method="POST" action="/editpassword" novalidate style="margin: 0 auto;margin-left:20%;margin-top:6%" id="password_reset" >
            {!! csrf_field() !!}
            
    <div class=" form form-horizontal">
  <fieldset>
    
       <div class="form-group" hidden="true">
          
          
      <label for="id" class="col-lg-1 control-label">id</label>
      
        <input class="form-control" id="id" name="id" placeholder="id" type="text" required value="{{ Auth::user()->id }}">
         
      </div>
      
      
      <div class="form-group">
      <label for="old_password" class="col-lg-2 control-label">Old Password</label>
      <div class="col-lg-5 @if ($errors->has('old_password')) has-error @endif @if (Session::has('message')) has-error @endif">
        <input class="form-control" id="old_password" name="old_password" placeholder="old password" type="password" value="{{ Input::old('old_password') }}">
           @if ($errors->has('old_password')) <p class="help-block">{{ $errors->first('old_password') }}</p> @endif
          @if (Session::has('message'))<p class="help-block">{{ Session::get('message') }}</p> @endif
      </div>
      </div>
      
          
      <br>
      
       <div class="form-group">
      <label for="password" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-5 @if ($errors->has('password')) has-error @endif">
        <input class="form-control" id="password" name="password" placeholder="password" type="password" value="{{ Input::old('password') }}">
           @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
      </div>
      </div>
      
      
      <br>
          
          <div class="form-group">
               <label for="confirm_password" class="col-lg-2 control-label">Confirm Password</label>
      <div class="col-lg-5 @if ($errors->has('confirm_password')) has-error @endif">
        <input class="form-control" id="confirm_password" name="confirm_password" placeholder="confirm password" type="password">
          @if ($errors->has('confirm_password')) <p class="help-block">{{ $errors->first('confirm_password') }}</p> @endif
      </div> 
          
          
          
    </div> 
  
    
      <br>
    
      
      
    
      
    <div class="form-group">
      <div class="col-lg-2 col-lg-offset-1" align="right" >
        
        
      </div>
        <div class="col-lg-2  " align="right" style="padding-right:0cm" >
        <button type="button" onclick="bck()" class="btn btn-warning btn-block">Back</button>
      </div>
        <div class="col-lg-2  " align="right" >
            <div id="booksave" >
        <button type="submit"   class="btn btn-primary btn-block " style="padding-right:0cm" >Save</button>
                </div>
            
      </div>
           
        <div class="col-lg-1 col-lg-offset-2" align="right" >
           
      </div>
    </div>
      
    
      
      
      <script>
      
          function bck(){
              
           window.location ="/memberProfile";   
          }
      
          
          </script>
      
     <br><br>
      
  </fieldset>
</div>
        </form>
    
</div>

@stop