@extends('master')


@section('header')
kushal
@stop

@section('page header')
<h1 style="margin-left:40%">Add Book Category</h1>
@stop

@section('manageusers')

<li class="active">
@stop


    
@section('content')

<div class="container-fluid" style="background-color:#CEE3F6">
    <div id="disableform"> 
        <form method="POST" action="/addcategory" novalidate style="margin: 0 auto;margin-left:20%;margin-top:6%">
            {!! csrf_field() !!}
            
            <div class=" form form-horizontal">
            <fieldset>
    
            <div class="form-group">
                <label for="name" class="col-lg-2 control-label">Category Number</label>
                <div class="col-lg-5 @if ($errors->has('cat_num')) has-error @endif">
                    <input class="form-control" id="cat_num" name="cat_num" placeholder="Category Number" type="text" required value="{{ Input::old('cat_num') }}">
                    @if ($errors->has('cat_num')) <p class="help-block">{{ $errors->first('cat_num') }}</p> @endif
                </div>
            </div>
                
                <br>
  
            <div class="form-group">
                <label for="Last_Name" class="col-lg-2 control-label">Category Name</label>
                <div class="col-lg-5 @if ($errors->has('cat_name')) has-error @endif">
                    <input class="form-control" id="cat_name" name="cat_name" placeholder="Category Name" type="text" required value="{{ Input::old('cat_name') }}">
                    @if ($errors->has('cat_name')) <p class="help-block">{{ $errors->first('cat_name') }}</p> @endif
                </div>  
            </div>
      
                <br>
  
            <div class="form-group">
                <div class="col-lg-2 col-lg-offset-1" align="right" >
        
        
                </div>
                <div class="col-lg-2" align="right" style="padding-right:0cm" >
                    <button type="reset" class="btn btn-default btn-block">Cancel</button>
                </div>
                <div class="col-lg-2" align="right" >
                    <div id="booksave" >
                        <button type="submit"    class="btn btn-primary btn-block " style="padding-right:0cm" >Save</button>
                    </div>
                </div>
           
                <div class="col-lg-1 col-lg-offset-2" align="right" >
           
                </div>
            </div>

      
            </fieldset>
            </div>
        </form>
    </div>
    <br>
    <br>
</div>
    
@stop