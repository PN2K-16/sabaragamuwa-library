@extends('master')


@section('header')

@stop

@section('page header')
Edit Your Profile
@stop



@section('content')
 


<div class="container-fluid" style="background-color:#CEE3F6">

{!! Form::open(array('route' => 'editprofile', 'class' => 'form', 'novalidate' => 'novalidate', 'files' => true, 'method' => 'post', 'id' => 'profile', 'style' => 'margin: 0 auto;margin-left:20%;margin-top:6%')) !!}
     
            {!! csrf_field() !!}
            
    <div class=" form form-horizontal">
  <fieldset>
    
       <div class="form-group" hidden="true">
          
          
      <label for="id" class="col-lg-1 control-label">id</label>
      
        <input class="form-control" id="id" name="id" placeholder="id" type="text" required value="{{ Auth::user()->id }}">
         
      </div>
      
      
      
      
    <div class="form-group">
      <label for="name" class="col-lg-2 control-label">Username</label>
      <div class="col-lg-5 @if ($errors->has('name')) has-error @endif">
        <input class="form-control" id="name" name="name" placeholder="First Name " type="text" required value="{{ Auth::user()->name }}">
           @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
      </div>
      </div>
   
      
      <br>
      
      
       <div class="form-group">
      <label for="email" class="col-lg-2 control-label">E-mail</label>
      <div class="col-lg-5 @if ($errors->has('email')) has-error @endif">
        <input class="form-control" id="email" name="email" placeholder="e-mail" type="email" value="{{ Auth::user()->email }}">
           @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
      </div>
      </div>
       
           
      <br>
      
      <div class="form-group">
          <label for="image" class="col-lg-2 control-label">Image</label>
      <div class="col-lg-5 @if ($errors->has('image')) has-error @endif">
       {!! Form::file('image',['id'=>'img']) !!}
           @if ($errors->has('image')) <p class="help-block">{{ $errors->first('image') }}</p> @endif
      </div>
      </div>
   
      <br>
    
      
      
    
      
    <div class="form-group">
      <div class="col-lg-2 col-lg-offset-1" align="right" >
        
        
      </div>
        <div class="col-lg-2  " align="right" style="padding-right:0cm" >
        <button type="button" onclick="rset()" class="btn btn-warning btn-block">Change Password</button>
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
          
          
          function rset(){
          
 window.location ="/changePassword";
          }
          
          
          </script>
      
     <br><br>
      
  </fieldset>
</div>
               {!! Form::close() !!}
    
    
  
  
    </div>

    
@stop