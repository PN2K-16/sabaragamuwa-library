@extends('master')


@section('header')
kushal
@stop

@section('page header')
Member Details
@stop

@section('searchmembers')

<li class="active">
@stop

@section('content')
  
 <form method="POST" action="/updateMembers" novalidate id="edit_book">
            {!! csrf_field() !!}
    <div class=" form form-horizontal">
  <fieldset>
  
        <div class="form-group" hidden="true">
          
          
      <label for="id" class="col-lg-1 control-label">id</label>
      
        <input class="form-control" id="id" name="id" placeholder="id" type="text" required value="{{$member_name->id}}">
         
      </div>
          
      
      
    <legend>Main Info </legend>
    <div class="form-group">
      <label for="name" class="col-lg-1 control-label">First Name</label>
      <div class="col-lg-5 @if ($errors->has('name')) has-error @endif">
        <input class="form-control" id="name" name="name" placeholder="First Name " type="text" required value="{{$member_name->name}}">
           @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
      </div>
        
        
       
        
        
        
        
        
         <label for="Last_Name" class="col-lg-1 control-label">Last Name</label>
      <div class="col-lg-5 @if ($errors->has('Last_Name')) has-error @endif">
        <input class="form-control" id="Last_Name" name="Last_Name" placeholder="Last Name " type="text" required value="{{$member_name->Last_Name}}">
           @if ($errors->has('Last_Name')) <p class="help-block">{{ $errors->first('Last_Name') }}</p> @endif
      </div>
        
        
        
        
        
    </div>
      
      
      
           <div class="form-group">
          
          
      <label for="typee" class="col-lg-1 control-label">Type</label>
      <div class="col-lg-5">
       <select class="form-control" id="typee" name="typee" >
         
          <option value="Provincial Library" >Provincial Library</option>
           <option vlaue="Book Reader Club Memeber">Book Reader Club Memeber</option>
           <option value="Regular User">Regular User</option>
           <option value="University">University</option>
                   
          
          
          </select>
      </div>
          
          
          
          
          
    </div>
      
            
      <div class="form-group">
      <label for="nic" class="col-lg-1 control-label">NIC</label>
      <div class="col-lg-5 @if ($errors->has('nic')) has-error @endif">
        <input class="form-control" id="nic" name="nic" placeholder="NIC Number " type="text" value="{{$member_name->nic}}" >
           @if ($errors->has('nic')) <p class="help-block">{{ $errors->first('nic') }}</p> @endif
      </div>
          
               <label for="Ref_Num" class="col-lg-1 control-label">Ref. Number</label>
      <div class="col-lg-5 @if ($errors->has('Ref_Num')) has-error @endif">
        <input class="form-control" id="Ref_Num" name="Ref_Num" placeholder="Reference Number" type="text" value=" {{$member_name->Ref_Num}}">
          @if ($errors->has('Ref_Num')) <p class="help-block">{{ $errors->first('Ref_Num') }}</p> @endif
      </div> 
          
          
          
    </div>
      
      
          <legend>Contact Info </legend>
      
      
      <div class="form-group">
          
          
      <label for="Address_Line_1" class="col-lg-1 control-label">Address Line 1</label>
      <div class="col-lg-11 @if ($errors->has('Address_Line_1')) has-error @endif">
        <input class="form-control" id="Address_Line_1" name="Address_Line_1" placeholder="Number and Street" type="text" required value=" {{$member_name->Address_Line_1}}">
          @if ($errors->has('Address_Line_1')) <p class="help-block">{{ $errors->first('Address_Line_1') }}</p> @endif
      </div>
          
          
          
          
          
    </div>
      
      
      <div class="form-group">
      <label for="Address_Line_2" class="col-lg-1 control-label">Address Line 2</label>
      <div class="col-lg-5 @if ($errors->has('Address_Line_2')) has-error @endif">
        <input class="form-control" id="Address_Line_2" name="Address_Line_2" placeholder="Town and city" type="text" required value=" {{$member_name->Address_Line_2}}">
           @if ($errors->has('Address_Line_2')) <p class="help-block">{{ $errors->first('Address_Line_2') }}</p> @endif
      </div>
          
          <label for="Land_Number" class="col-lg-1 control-label">Land Phone</label>
      <div class="col-lg-5 @if ($errors->has('Land_Number')) has-error @endif">
        <input class="form-control" id="Land_Number" name="Land_Number" placeholder="Land Phone Number " type="text" value=" {{$member_name->Land_Number}}">
          @if ($errors->has('Land_Number')) <p class="help-block">{{ $errors->first('Land_Number') }}</p> @endif
      </div>
            
          
          
          
          
          
          
    </div>
      
      
      <div class="form-group">
      <label for="Address_Line_3" class="col-lg-1 control-label">Address Line 3</label>
      <div class="col-lg-5 @if ($errors->has('Address_Line_3')) has-error @endif">
        <input class="form-control" id="Address_Line_3" name="Address_Line_3" placeholder="District" type="text" required value="{{$member_name->Address_Line_3}}">
          @if ($errors->has('Address_Line_3')) <p class="help-block">{{ $errors->first('Address_Line_3') }}</p> @endif
      </div>
          
               <label for="Mobile_Number" class="col-lg-1 control-label">Mobile Phone</label>
      <div class="col-lg-5 @if ($errors->has('Mobile_Number')) has-error @endif">
        <input class="form-control" id="Mobile_Number" name="Mobile_Number" placeholder="Mobile Phone Number" type="text" value="{{$member_name->Mobile_Number}}">
          @if ($errors->has('Mobile_Number')) <p class="help-block">{{ $errors->first('Mobile_Number') }}</p> @endif
      </div> 
          
          
          
    </div>
      
     
      
      
      
      
            
      <div class="form-group">
      <label for="email" class="col-lg-1 control-label">Email</label>
      <div class="col-lg-5 @if ($errors->has('email')) has-error @endif">
        <input class="form-control" id="email" name="email" placeholder=" Email Address " type="email" value=" {{$member_name->email}}">
             @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
      </div>
          
 
          
    </div>
      
      <legend>Other Info</legend>
      
            
      <div class="form-group">
      <label for="status" class="col-lg-1 control-label">Status</label>
      <div class="col-lg-5">
       <select class="form-control" id="status" name="status" value="{{ Input::old('status') }}">
          
          
          <option value="false">Memebrship Disabled</option>
             <option value="true">Memebrship Enabled</option>
          
          
          
          
          
          
          
          </select>
      </div>
          
          <label for="remarks" class="col-lg-1 control-label">Remarks</label>
      <div class="col-lg-5 @if ($errors->has('remarks')) has-error @endif">
      <textarea class="form-control" id="remarks" name="remarks" > {{$member_name->remarks}}</textarea>
             @if ($errors->has('remarks')) <p class="help-block">{{ $errors->first('remarks') }}</p> @endif
      </div>
               
          
          
    </div>
      
      
    
      
    <div class="form-group">
      <div class="col-lg-5 col-lg-offset-3" align="right" >
        
        
      </div>
        <div class="col-lg-2  " align="right" style="padding-right:0cm" >
        <button type="reset" class="btn btn-default btn-block">Cancel</button>
      </div>
        
        <div class="col-lg-2  " align="right" >
            <div id="booksave" >
        <button type="submit"    class="btn btn-success btn-block " style="padding-right:0cm" >Update</button>
                </div>
          
      </div>
           
        <div class="col-lg-1 col-lg-offset-2" align="right" >
           
      </div>
    </div>
          
        </fieldset></div></form>  
    
@stop