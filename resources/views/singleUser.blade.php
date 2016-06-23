@extends('master')


@section('header')
kushal
@stop

@section('page header')
<h1 style="margin-left:40%">Edit User</h1>
@stop

@section('manageusers')

<li class="active">
@stop


    
@section('content')
    

<div class="container-fluid" style="background-color:#CEE3F6">


     <form method="POST" action="/editUser" novalidate style="margin: 0 auto;margin-left:20%;margin-top:6%">
            {!! csrf_field() !!}
            
    <div class=" form form-horizontal">
  <fieldset>
    
       <div class="form-group" hidden="true">
          
          
      <label for="id" class="col-lg-1 control-label">id</label>
      
        <input class="form-control" id="id" name="id" placeholder="id" type="text" required value="{{$user_name->id}}">
         
      </div>
      
      
      
      
    <div class="form-group">
      <label for="name" class="col-lg-2 control-label">First Name</label>
      <div class="col-lg-5 @if ($errors->has('name')) has-error @endif">
        <input class="form-control" id="name" name="name" placeholder="First Name " type="text" required value="{{$user_name->name}}">
           @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
      </div>
      </div>
        
      
      
      
      <br>
      
      
       <div class="form-group">
      <label for="email" class="col-lg-2 control-label">E-mail</label>
      <div class="col-lg-5 @if ($errors->has('email')) has-error @endif">
        <input class="form-control" id="email" name="email" placeholder="e-mail" type="email" value="{{$user_name->email}}">
           @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
      </div>
      </div>
      
      
      <br>
      
           <div class="form-group">
          
          
      <label for="type" class="col-lg-2 control-label">Type</label>
      <div class="col-lg-5">
       <select class="form-control" id="type" name="type" >
         
          
           <option vlaue="access">User</option>
           <option value="admin" >Admin</option>
                   
          
          
          </select>
      </div>
     
    </div>
  
       
      <br>
    
      
      
    
      
    <div class="form-group">
      <div class="col-lg-2 col-lg-offset-1" align="right" >
        
        
      </div>
        <div class="col-lg-2  " align="right" style="padding-right:0cm" >
        <button type="reset" class="btn btn-default btn-block">Cancel</button>
      </div>
        <div class="col-lg-2  " align="right" >
            <div id="booksave" >
        <button type="submit"    class="btn btn-primary btn-block " style="padding-right:0cm" >Register</button>
                </div>
            
      </div>
           
        <div class="col-lg-1 col-lg-offset-2" align="right" >
           
      </div>
    </div>
      
    
      
      
      <script>
          
          
          function rset(){
          
          
          location.href="editUsers";
          
          }
          
          
          </script>
      
     <br><br>
      
  </fieldset>
</div>
        </form>
    
    </div>
@stop