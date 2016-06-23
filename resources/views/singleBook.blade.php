@extends('master')


@section('header')
kushal
@stop

@section('page header')
 {{$book_name->name}} <span class="label" style="color:#6D7878 ;font-weight:400">By {{$book_name->author}} </span>
<button class="btn btn-danger  " data-toggle="modal" data-target="#deleteM" style="position: absolute;
top: 26px;
right: 26px;
"> Remove Book </button>
@stop

@section('searchbooks')

<li class="active">
@stop

@section('content')

      @if (Session::has('message'))
    <div class="alert alert-success" style="text-align:center" hidden><input type="text" hidden id="lol" value="{{ Session::get('message') }}"></div>
@endif
    
    
    
    
    <div class="modal fade" id="deleteM">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Confirm Delete</h4>
            </div>
            <div class="modal-body" id="bookDelSuccess">

                Are you Sure you want to Delete <b> {{$book_name->name}} </b> and All it's <b>Copies</b>?
                <br>
                <b> This cannot be reverted Later.</b>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="DelSingleBook('{{$book_name->id}}')">Delete</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

            </div>
        </div>
    </div>
</div>
    
    
<div class="container-fluid">
    <div class="row" id="show_book">
        <legend>
            <h2> </h2> </legend>

        <div class="form-group">
        <div class="col-lg-3"  style="background-image: url('../book_images/{{$book_name->id}}.jpg'),url('../book_images/img_placeholder.png');background-size: 100% 100%;width:300px;height:280px;border:1px solid;border-color:#D8D8D8;">
&ensp;
            </div>

        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <h5 for="name" class="col-lg-3 control-label" style="font-weight:300; font-size:70%"> </h5>
                <legend>Main Info</legend>
                <div hidden>


                </div>
            </div>


            <div class="form-group">
                <h5 for="name" class="col-lg-3 control-label" style="font-weight:300;font-size:110%">Cl Number</h5>
                <div class="col-lg-5">
                    <h5 style="font-weight:600;font-size:110%"> {{$book_name->cl_number}}</h5>

                </div>
                <h5 for="name" class="col-lg-3 control-label" style="font-weight:300;font-size:110%">Cat Number </h5>
                 <div class="col-lg-1">
                    <h5 style="font-weight:500;font-size:110%"> <?php if($book_name->cat_num=="" ||$book_name->cat_num==null){
                            echo "None";

                        } 
else {
    echo $book_name->cat_num;

}
                        ?></h5>

                </div>
            </div>


            <input type="text" id="book_name_id" value="{{$book_name->id}}" hidden="true">



            <div class="form-group">
                <h5 for="name" class="col-lg-3 control-label" style="font-weight:300;font-size:110%">Editor/Translator</h5>
                <div class="col-lg-9">
                    <h5 style="font-weight:500;font-size:110%"> <?php if($book_name->edit_translate=="" ||$book_name->edit_translate==null){
                            echo "None";

                        } 
else {
    echo $book_name->edit_translate;

}
                        ?></h5>

                </div>
            </div>




            <div class="form-group">
                <h5 for="name" class="col-lg-3 control-label" style="font-weight:300"> </h5>
                <legend>Publisher Info</legend>
                <div hidden>


                </div>
            </div>



            <div class="form-group">
                <h5 for="name" class="col-lg-3 control-label" style="font-weight:300;font-size:110%">Publisher</h5>
                <div class="col-lg-9">
                    <h5 style="font-weight:500;font-size:110%"> <?php if($book_name->publisher=="" ||$book_name->publisher==null){
                            echo "None";

                        } 
else {
    echo $book_name->publisher;

}
                        ?></h5>

                </div>


            </div>



            <div class="form-group">
                <h5 for="name" class="col-lg-3 control-label" style="font-weight:300;font-size:110%">Published Place</h5>
                <div class="col-lg-5">
                    <h5 style="font-weight:500;font-size:110%"> <?php if($book_name->published_place=="" ||$book_name->published_place==null){
                            echo "None";

                        } 
else {
    echo $book_name->published_place;

}
                        ?></h5>

                </div>



                <h5 for="name" class="col-lg-3 control-label" style="font-weight:300;font-size:110%">Published Year</h5>
                <div class="col-lg-1">
                    <h5 style="font-weight:500;font-size:110%"> <?php if($book_name->published_year=="" ||$book_name->published_year==null){
                            echo "None";

                        } 
else {
    echo $book_name->published_year;

}
                        ?></h5>

                </div>

            </div>

        </div>
        
<div class="col-lg-8">
        <div class="form-group">
            <h5 for="name" class="col-lg-3 control-label" style="font-weight:300"> </h5>
            <legend>Additional Info </legend>

        </div>


          <div class="form-group">
                <h5 for="name" class="col-lg-2 control-label" style="font-weight:300;font-size:110%">Pages</h5>
                <div class="col-lg-3">
                     <h5 style="font-weight:500;font-size:110%"> <?php if($book_name->pages=="" ||$book_name->pages==null){
                            echo "None";

                        } 
else {
    echo $book_name->pages;

}
                    ?></h5>

                </div>
                <h5 for="name" class="col-lg-3 control-label" style="font-weight:300;font-size:110%">Series</h5>
                 <div class="col-lg-4">
                    <h5 style="font-weight:500;font-size:110%"> <?php if($book_name->series=="" ||$book_name->series==null){
                            echo "None";

                        } 
else {
    echo $book_name->series;

}
                        ?></h5>

                </div>
            </div>
        
        
         <div class="form-group">
                <h5 for="name" class="col-lg-2 control-label" style="font-weight:300;font-size:110%">Height</h5>
                <div class="col-lg-3">
                    <h5 style="font-weight:500;font-size:110%"> <?php if($book_name->height=="" ||$book_name->height==null){
                        echo "None";

                    } 
else {
    echo $book_name->height.'cm';

}
                    ?></h5>

                </div>
                <h5 for="name" class="col-lg-3 control-label" style="font-weight:300;font-size:110%">Series Number</h5>
                 <div class="col-lg-4">
                    <h5 style="font-weight:500;font-size:110%"> <?php if($book_name->series_num=="" ||$book_name->series_num==null){
                            echo "None";

                        } 
else {
    echo $book_name->series_num;

}
                        ?></h5>

                </div>
            </div>
    
    
        <div class="form-group">
                <h5 for="name" class="col-lg-2 control-label" style="font-weight:300;font-size:110%">ISBN</h5>
                <div class="col-lg-3">
                   <h5 style="font-weight:500;font-size:110%"> <?php if($book_name->isbn=="" ||$book_name->isbn==null){
                        echo "None";

                    } 
else {
    echo $book_name->isbn;

}
                    ?></h5>

                </div>
                <h5 for="name" class="col-lg-3 control-label" style="font-weight:300;font-size:110%">Remarks</h5>
                 <div class="col-lg-4">
                   <h5 style="font-weight:500;font-size:110%"> <?php if($book_name->remarks=="" ||$book_name->remarks==null){
                        echo "None";

                    } 
else {
    echo $book_name->remarks;

}
                    ?></h5>

                </div>
            </div>
       
        
    </div>
        

   




        <div class="form-group">
            <h5 for="name" class="col-lg-3 control-label" style="font-weight:300"> </h5>
            <h5 for="name" class="col-lg-3 control-label" style="font-weight:300"> </h5>
            <div class="col-lg-8">


            </div>
            <div class="col-lg-2">


            </div>




            <div class="col-lg-2">

                <button class="btn btn-primary btn-block" onclick="edit()"> Edit</button>
            </div>
        </div>










    </div>








    <div id="edit_book" class="row" hidden="true">
        <br>
        
         {!! Form::open(array('route' => 'updateBook', 'class' => 'form', 'novalidate' => 'novalidate', 'files' => true, 'method' => 'post', 'id' => 'disableform')) !!}
                    {!! csrf_field() !!}
    <div class=" form form-horizontal">
  <fieldset>
    <legend>Main Info </legend>
      
      <div class="form-group" hidden="true">
      <label for="idd" class="col-lg-1 control-label">idd</label>
      <div class="col-lg-10 @if ($errors->has('idd')) has-error @endif" >
        <input class="form-control" id="idd" name="idd" placeholder="idd " type="text" value="{{$book_name->id}}">
           @if ($errors->has('idd')) <p class="help-block">{{ $errors->first('idd') }}</p> @endif
      </div>
    </div>
      
      <div class="form-group">
      <label for="name" class="col-lg-1 control-label">Name</label>
      <div class="col-lg-10 @if ($errors->has('name')) has-error @endif" >
        <input class="form-control" id="name" name="name" placeholder="Name" type="text" value="{{ Input::old('name') }}" >
           @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
      </div>
    </div>
      
      
        <div class="form-group">
      <label for="author" class="col-lg-1 control-label">Author</label>
      <div class="col-lg-10 @if ($errors->has('author')) has-error @endif" >
        <input class="form-control" id="author" name="author" placeholder="author " type="text" value="{{ Input::old('author') }}">
           @if ($errors->has('author')) <p class="help-block">{{ $errors->first('author') }}</p> @endif
      </div>
    </div>
 
        
         <div class="form-group">
      <label for="cl_number" class="col-lg-1 control-label">Cl Number</label>
      <div class="col-lg-10 @if ($errors->has('cl_number')) has-error @endif" >
        <input class="form-control" id="cl_number" name="cl_number" placeholder="cl_number " type="text" value="{{ Input::old('cl_number') }}">
           @if ($errors->has('cl_number')) <p class="help-block">{{ $errors->first('cl_number') }}</p> @endif
      </div>
    </div>
        
       
       <div class="form-group">
      <label for="cat_num" class="col-lg-1 control-label">Category Number</label>
      <div class="col-lg-10 @if ($errors->has('cat_num')) has-error @endif" >
        <input class="form-control" id="cat_num" name="cat_num" placeholder="cat_num " type="text" value="{{ Input::old('cat_num') }}">
           @if ($errors->has('cat_num')) <p class="help-block">{{ $errors->first('cat_num') }}</p> @endif
      </div>
    </div>
      
      
       <div class="form-group">
      <label for="edit_translate" class="col-lg-1 control-label">Editor</label>
      <div class="col-lg-10 @if ($errors->has('edit_translate')) has-error @endif" >
        <input class="form-control" id="edit_translate" name="edit_translate" placeholder="edit_translate " type="text" value="{{ Input::old('edit_translate') }}">
           @if ($errors->has('edit_translate')) <p class="help-block">{{ $errors->first('edit_translate') }}</p> @endif
      </div>
    </div>
      
          
       <legend>Publisher Info</legend>
      
     
        <div class="form-group">
      <label for="publisher" class="col-lg-1 control-label">Publisher</label>
      <div class="col-lg-10 @if ($errors->has('publisher')) has-error @endif" >
        <input class="form-control" id="publisher" name="publisher" placeholder="publisher " type="text" value="{{ Input::old('publisher') }}">
           @if ($errors->has('publisher')) <p class="help-block">{{ $errors->first('publisher') }}</p> @endif
      </div>
    </div>
      
      
          <div class="form-group">
              
      <label for="published_place" class="col-lg-1 control-label">Published Place</label>
      <div class="col-lg-5 @if ($errors->has('published_place')) has-error @endif" >
        <input class="form-control" id="published_place" name="published_place" placeholder="published_place " type="text" value="{{ Input::old('published_place') }}">
           @if ($errors->has('published_place')) <p class="help-block">{{ $errors->first('published_place') }}</p> @endif
      </div>
              
        <label for="published_year" class="col-lg-1 control-label">Published Year</label>
      <div class="col-lg-4 @if ($errors->has('published_year')) has-error @endif" >
        <input class="form-control" id="published_year" name="published_year" placeholder="published_year " type="text" value="{{ Input::old('published_year') }}">
           @if ($errors->has('published_year')) <p class="help-block">{{ $errors->first('published_year') }}</p> @endif
      </div>      
      
    </div>
      
      
      <legend>Physical Info</legend>
      
      
         <div class="form-group">
      <label for="pages" class="col-lg-1 control-label">Pages</label>
      <div class="col-lg-5 @if ($errors->has('pages')) has-error @endif">
        <input class="form-control" id="pages" name="pages" placeholder="pages " type="text" required value="{{ Input::old('pages') }}">
           @if ($errors->has('pages')) <p class="help-block">{{ $errors->first('pages') }}</p> @endif
      </div>
      
        
         <label for="image" class="col-lg-1 control-label">Image</label>
      <div class="col-lg-4 @if ($errors->has('image')) has-error @endif">
       {!! Form::file('image',['id'=>'img']) !!}
           @if ($errors->has('image')) <p class="help-block">{{ $errors->first('image') }}</p> @endif
      </div>
        
    </div>
      
        <div class="form-group">
      <label for="height" class="col-lg-1 control-label">Height (cm)</label>
      <div class="col-lg-5 @if ($errors->has('height')) has-error @endif">
        <input class="form-control" id="height" name="height" placeholder="height " type="text" required value="{{ Input::old('height') }}">
           @if ($errors->has('height')) <p class="help-block">{{ $errors->first('height') }}</p> @endif
      </div>
      </div>
      
      
      <legend>Additional Info</legend>
      
      
            <div class="form-group">
      <label for="series" class="col-lg-1 control-label">Title Series</label>
      <div class="col-lg-5 @if ($errors->has('series')) has-error @endif">
        <input class="form-control" id="series" name="series" placeholder="series " type="text" required value="{{ Input::old('series') }}">
           @if ($errors->has('series')) <p class="help-block">{{ $errors->first('series') }}</p> @endif
      </div>
      
        
         <label for="series_num" class="col-lg-1 control-label">Series Number</label>
      <div class="col-lg-4 @if ($errors->has('series_num')) has-error @endif">
        <input class="form-control" id="series_num" name="series_num" placeholder="series_num "  required value="{{ Input::old('series_num') }}">
           @if ($errors->has('series_num')) <p class="help-block">{{ $errors->first('series_num') }}</p> @endif
      </div>
        
    </div>
      
      
           <div class="form-group">
      <label for="isbn" class="col-lg-1 control-label">ISBN</label>
      <div class="col-lg-5 @if ($errors->has('isbn')) has-error @endif">
        <input class="form-control" id="isbn" name="isbn" placeholder="isbn " type="text" required value="{{ Input::old('isbn') }}">
           @if ($errors->has('isbn')) <p class="help-block">{{ $errors->first('isbn') }}</p> @endif
      </div>
      
        
         <label for="remarks" class="col-lg-1 control-label">Remarks</label>
      <div class="col-lg-4 @if ($errors->has('remarks')) has-error @endif">
        <input class="form-control" id="remarks" name="remarks" placeholder="remarks "  required value="{{ Input::old('remarks') }}">
           @if ($errors->has('remarks')) <p class="help-block">{{ $errors->first('remarks') }}</p> @endif
      </div>
        
    </div>
      
      <br>
      
       <div class="form-group" id="savehide">
      <div class="col-lg-4 col-lg-offset-3" align="right" >
        
        
      </div>
        <div class="col-lg-2  " align="right" style="padding-right:0cm" >
        <button type="reset" id="cancelbk" class="btn btn-default btn-block">Cancel</button>
      </div>
        
        <div class="col-lg-2  " align="right" >
            <div id="booksave" >
        <button type="submit" id="bksave" class="btn btn-success btn-block " style="padding-right:0cm">Updape</button>
                </div>
          </div>
          
       
        <div class="col-lg-1 col-lg-offset-2" align="right" >
           
      </div>
    </div>
   
      
      
      
      
        </fieldset>
             </div>
        {!! Form::close() !!}
        
 


    </div>










    <div class="row">

        <div class="form-group">
            <h5 for="name" class="col-lg-3 control-label" style="font-weight:300"> </h5>
            <legend>Copies </legend>



        </div>
        <div class="">




            <div class="col-md-10"></div>
            <div class="col-md-2">
                <button class="btn btn-info btn-block" data-toggle="modal" onclick="openCopy()"> Add Copy</button>
            </div>






        </div>

        <div >

            <table class="table table-striped table-hover" id="retable">

                <thead>

                    <th> ID</th>
                    <th> Available</th>
                    <th> Reserved </th>
                    <th> Date Added </th>
                    <th> Date Updated </th>
                    <th class="col-lg-1"> </th>
                    <th class="col-lg-1"> </th>
                    <th class="col-lg-1"> </th>
                    <th class="col-lg-1"> </th>
                    <th class="col-lg-1"> </th>

                </thead>
                <tbody id="copytable">

                    @foreach ($book as $b)

                    <tr>
                        <td> {{$b->id}}</td>
                        <td>{{$b->status}} </td>
                        <td>{{$b->reserved}}  </td>


                        <td> {{$b->date_added}}</td>
                        <td> {{$b->date_updated}}</td>

                         <td>
                             <button type="button" class="btn btn-info btn-block btn-sm" onclick="viewbc('{{$b->id}}')">Barcode</button>
                        </td>
                        <td>
                             <button type="button" class="btn btn-warning btn-block btn-sm" onclick="reserve('{{$b->id}}')"  <?php if ($b->status=="Not Available"||$b->reserved=="Yes"){ echo "disabled"; } ?> >Reserve</button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-success btn-block btn-sm" onclick="lend('{{$b->id}}')" <?php if ($b->status=="Not Available"||$b->reserved=="Yes"){ echo "disabled"; } ?> >Lend</button>
                        </td>
                        <td> <a href='/singleCopy?id={{$b->id}}' class="btn btn-primary btn-block btn-sm">View</a> </td>
                        <td>
                            <button type="button" class="btn btn-danger btn-block btn-sm" onclick="deleteConfirm('{{$b->id}}')">Remove</button>
                        </td>
                    </tr>



                    @endforeach
                </tbody>


            </table>

        </div>




    </div>

</div>
    
 
<div class="modal fade" id="lendbook">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Borrow Log</h4>
            </div>
            <div class="modal-body" id="memberDelSuccess">

                
                
          <form >
            {!! csrf_field() !!}
                <div class=" form form-horizontal">
               <fieldset>
                      <div class="form-group">
                         <label for="client_id" class="col-lg-3 control-label">Mobile Number</label>
                         <div class="col-lg-5">
                        <input class="form-control" list="numbers" id="client_id" name="client_id" placeholder="Mobile Number "  >
                             <datalist id="numbers">
                                 @foreach ($members as $b)
					
                        <option value="{{$b->Mobile_Number }}"></option>
                           @endforeach
				</datalist>
                        </div>
                   </div>
                   
                     <div class="form-group">
                         <label for="duration" class="col-lg-3 control-label">Duration</label>
                         <div class="col-lg-5">
                        <input class="form-control" id="duration" name="duration" placeholder="duration " type="text" >                   
                        </div>
                   </div>
                   
                    <div class="alert alert-dismissible alert-danger" id="lenderrorone" hidden="true" align="center">
                  <strong> Both fields are required!</strong>  
                     </div>
                   <div class="alert alert-dismissible alert-danger" id="lenderrortwo" hidden="true" align="center">
                  <strong> Duartion should be an integer!</strong>  
                     </div>
                   <div class="alert alert-dismissible alert-danger" id="lenderrorthree" hidden="true" align="center">
                  <strong> Mobile Number does Not Exist!</strong>  
                     </div>
                   
                   <input type="text" id="lendbookid"  hidden="true">
                   
                    </fieldset>
                </div>
            </form>
                
                
                
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" onclick="LendBook()">Lend</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

            </div>
        </div>
    </div>
</div>    
    
 
<div class="modal fade" id="reservebook">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Reserve Log</h4>
            </div>
            <div class="modal-body" id="memberDelSuccess">

                
                
          <form >
            {!! csrf_field() !!}
                <div class=" form form-horizontal">
               <fieldset>
                      <div class="form-group">
                         <label for="reserved_client_id" class="col-lg-3 control-label">Mobile Number</label>
                         <div class="col-lg-6">
                        <input class="form-control" id="reserved_client_id" name="reserved_client_id" placeholder="Mobile Number " type="text" >
                        </div>
                   </div>
                   
                     <div class="form-group">
                         <label for="reserved_duration" class="col-lg-3 control-label">Duration</label>
                         <div class="col-lg-6">
                        <input class="form-control" id="reserved_duration" name="reserved_duration" placeholder="Days Book will remain as reserved" type="text" >
                        </div>
                   </div>
                   
                    <div class="alert alert-dismissible alert-danger" id="reserveerrorone" hidden="true" align="center">
                  <strong> Both fields are required!</strong>  
                     </div>
                   <div class="alert alert-dismissible alert-danger" id="reserveerrortwo" hidden="true" align="center">
                  <strong> Duartion should be an integer!</strong>  
                     </div>
                   <div class="alert alert-dismissible alert-danger" id="reserveerrorthree" hidden="true" align="center">
                  <strong> Mobile Number does Not Exist!</strong>  
                     </div>
                   
                   <input type="text" id="reservebookid"  hidden="true">
                   
                    </fieldset>
                </div>
            </form>
                
                
                
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" onclick="ReserveBook()">Reserve</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

            </div>
        </div>
    </div>
</div>    
    
    
    
    
    
    
<div class="modal fade" id="add_copies">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Add a Copy</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-dismissible alert-danger" id="copyerror" hidden="true">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Error!</strong> System encountered an issue. The most likely cause might be the Book ID already existing in the system.
                </div>
                <div class="alert alert-dismissible alert-success" id="copysuccess" hidden="true">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong> Success!</strong>
                </div>
                <form class="form-horizontal">
                    <fieldset>

                        <div class="form-group">
                            <label for="copyid" class="col-lg-2 control-label">Book ID</label>
                            <div class="col-lg-10">
                                <input class="form-control" id="copyid" placeholder=" Unique ID of the book Copy " type="Number">
                            </div>


                        </div>


                        <div class="form-group">
                            <label for="copydate" class="col-lg-2 control-label">Date</label>
                            <div class="col-lg-10">
                                <input class="form-control" id="copydate" placeholder="    " type="text" value="<?php echo date(" Y-m-d ");  ?>">
                            </div>


                        </div>








                        <div class="form-group">
                            <label for="copyremarks" class="col-lg-2 control-label">Remarks</label>
                            <div class="col-lg-10">
                                <textarea class="form-control" rows="3" placeholder="remarks" id="copyremarks"></textarea>

                            </div>


                        </div>


                    </fieldset>

                </form>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="saveCopy()">Save changes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
    
    
<div  class="modal fade" id="delConfirm">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Confirm</h4>
      </div>
      <div class="modal-body">
 
          Are you sure you want to delete coppy <strong id="delid"></strong>?
          
          
      </div>
      <div class="modal-footer">
             <button type="button" class="btn btn-warning" id="delYes" onclick="">Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
     
      </div>
    </div>
  </div>
</div>        
 
    
 <div class=" modal fade" id="kushal">
   <div class="modal-dialog modal-sm ">
    <div class="modal-content">
      <div class="modal-header">
        <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>-->
        <h4 class="modal-title">Print View</h4>
      </div>
      <div class="modal-body">
            
          <div id="borderdiv" >
            
                  <div id="pbc" hidden="true"><h2 style="display:inline;">barcord for copy of &ensp;</h2><h1 id="bknameforprint" style="display:inline;"> </h1></div>
              <br>
         <div id="bctarget">
              
         </div>
            
            
              
          </div>
          
             <div id="info">  
    
                
            </div>
          
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal" onclick="clearid()" style="border-radius: 5px;">Close</button>
     
        <button type="button" class="btn btn-sm btn-primary" onclick="printbc()" id="ok" style="border-radius: 5px;"> Print barcode</button>
      </div>
    </div>
  </div>
</div>
</div>   
    
    
<script>
    
window.onload = function(){
        
var idd = document.getElementById("lol").value;
    if(idd !== "" || idd !== "null")
    {
        
        $('#show_book').hide();
        $('#edit_book').show();
            
    }
    
        
}
    
 function edit() {
     
        $('#name').val('{{$book_name->name}}');
        $('#author').val('{{$book_name->author}}');
        $('#cl_number').val('{{$book_name->cl_number}}');
        $('#cat_num').val('{{$book_name->cat_num}}');
        $('#edit_translate').val('{{$book_name->edit_translate}}');


        $('#publisher').val('{{$book_name->publisher}}');
        $('#published_place').val('{{$book_name->published_place}}');
        $('#published_year').val('{{$book_name->published_year}}');

        $('#pages').val('{{$book_name->pages}}');
        $('#height').val('{{$book_name->height}}');

        $('#series').val('{{$book_name->series}}');
        $('#series_num').val('{{$book_name->series_num}}');
        $('#isbn').val('{{$book_name->isbn}}');
        $('#remarks').val('{{$book_name->remarks}}');
     
     
        document.getElementById("show_book").setAttribute("hidden", true);

        document.getElementById("edit_book").removeAttribute("hidden", true);
    }
    
    
 function update() {

        var book_name_id = $('#book_name_id').val();

        var name = $('#name').val();
        var author = $('#author').val();
        var cl_num = $('#cl_num').val();
        var edit = $('#edit_translate').val();

        var publisher = $('#publisher').val();
        var published_place = $('#published_place').val();
        var published_year = $('#published_year').val();

        var pages = $('#pages').val();
        var height = $('#height').val();

        var series = $('#series').val();
        var series_num = $('#series_num').val();
        var isbn = $('#isbn').val();
        var remarks = $('#remarks').val();



        var data = "name=" + name + "&author=" + author + "&cl_num=" + cl_num + "&edit=" + edit + "&publisher=" + publisher + "&published_place=" + published_place + "&published_year=" + published_year + "&pages=" + pages + "&height=" + height + "&series=" + series + "&series_num=" + series_num + "&isbn=" + isbn + "&remarks=" + remarks + "&bnid=" + book_name_id;



        $.ajax({
            type: "get",
            url: "updateBook",
            data: data,

            success: function (data) {
                
                document.getElementById("edit_book").setAttribute("hidden", false);
                document.getElementById("show_book").removeAttribute("hidden", false);

                window.location.reload();

                

            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert("error");
            }
        });



    }    
    
    
    
     function saveCopy() {


        var book_name_id = $('#book_name_id').val();
        var copyid = $('#copyid').val();
        var copydate = $('#copydate').val();
        var copyremarks = $('#copyremarks').val();


        var data = "bnid=" + book_name_id + "&cid=" + copyid + "&copydate=" + copydate + "&copyremarks=" + copyremarks;





        $.ajax({
            type: "get",
            url: "/addCopy",
            data: data,

            success: function (data) {
                document.getElementById("copysuccess").removeAttribute("hidden", false);

                
                
             location.reload();
                   

                
                
                

            /*    var body = "";
                if (data.length > 0) {
                  

                    for (var i = 0; i < data.length; i++) {


                      /*  var res = "";
                        var stat = "";

                        if (data[i].reserved == 0) {
                            res = "No";
                        } else {

                            res = "Yes";

                        }

                        if (data[i].status == 0) {
                            stat = "Yes";
                        } else {

                            stat = "No";

                        }*/

                  /*      body += '<tr> <td> ' + data[i].id + '</td><td>' + data[i].status + '</td><td>' + data[i].reserved + '</td> <td>' + data[i].date_added+ '</td><td>' + data[i].date_updated + '</td><td><button class="btn btn-info btn-block btn-sm" onclick="viewbc(' + data[i].id + ')"> Barcode </button></td><td><button class="btn btn-success  btn-block btn-sm" onclick="deleteConfirm(' + data[i].id + ')"> Lend </button></td><td><button class="btn btn-primary btn-block btn-sm" onclick="deleteConfirm(' + data[i].id + ')"> View </button></td><td><button class="btn btn-danger btn-block btn-sm" onclick="deleteConfirm(' + data[i].id + ')"> Remove </button></td></tr>';




                    }

                  

                }
                document.getElementById("copytable").innerHTML = body;*/
                $('#add_copies').modal('hide');
                

            },
            error: function (xhr, ajaxOptions, thrownError) {
                //document.getElementById("copyerror").removeAttribute("hidden", false);
                $("#copyerror").show();
            }
        });




    }

    function openCopy(){
    
        $("#bookerror").hide();
        $("#booksuccess").hide();
        $("#booksuccessupdate").hide();
        $("#copysuccess").hide();
         $("#copyerror").hide();
        
        $('#copyid').val('');
        $('#copyremarks').val('');
       
        $('#add_copies').modal('show');
 
    }
    
    
    
       function DelSingleBook(a) {



        $.ajax({
            type: "get",
            url: "/deleteSingleBook",
            data: {

                id: a

            },

            success: function (data) {

                document.getElementById("bookDelSuccess").innerHTML = '<div class="alert alert-dismissible alert-warning">  <button type="button" class="close" data-dismiss="alert">×</button>  <p> Successfully Deleted.</p> </div>';
                
                setTimeout(function(){  location.href="searchBooks"; }, 1500);
                
           

            },
            error: function (xhr, ajaxOptions, thrownError) {
                //document.getElementById("copyerror").removeAttribute("hidden", false);
                $("#copyerror").show();
            }
        });




    }
    
    
    
    function deleteConfirm(a){
   
     document.getElementById("delYes").setAttribute("onclick","deleteCopy("+a+")");
      document.getElementById("delid").innerHTML = "ID "+a;
$('#delConfirm').modal('show');
 
}
    
    
    
 function deleteCopy(a){
     
     var book_name_id = document.getElementById("book_name_id").value; 
      var data = "bnid="+book_name_id+"&cid="+a;
     
     $.ajax({
    type: "get",
    url: "/deleteCopy",
    data: data,
        
    success : function(data){
   $('#delConfirm').modal('hide');
        
        
        location.reload();
        
       /* var body="";
        if(data.length>0){
       
        
        for(var i =0; i<data.length; i++){
            
            
          /*  var res="";
            var stat ="";
        
            if (data[i].reserved == 0){
            res = "No";
            }
            else{
            
            res ="Yes";
            
            }
            
            if (data[i].status == 0){
            stat = "Available";
            }
            else{
            
            stat ="Not Available";
            
            }*/
            
         /*   body += '<tr> <td> ' + data[i].id + '</td><td>' + data[i].status + '</td><td>' + data[i].reserved + '</td> <td>' + data[i].date_added+ '</td><td>' + data[i].date_updated + '</td><td><button class="btn btn-info btn-block btn-sm" onclick="viewbc(' + data[i].id + ')"> Barcode </button></td><td><button class="btn btn-success  btn-block btn-sm" onclick="deleteConfirm(' + data[i].id + ')"> Lend </button></td><td><button class="btn btn-primary btn-block btn-sm" onclick="deleteConfirm(' + data[i].id + ')"> View </button></td><td><button class="btn btn-danger btn-block btn-sm" onclick="deleteConfirm(' + data[i].id + ')"> Remove </button></td></tr>';
        
        
        
        
        }
        
            body+= '</tbody> </table>';
       
        
        }
        document.getElementById("copytable").innerHTML=body;*/
        
        },
	 error: function(xhr, ajaxOptions, thrownError) {
       //document.getElementById("copyerror").removeAttribute("hidden",false);
          $("#copyerror").show();
      }	 

     });

         
         
     }
    
    
     function clearid(){
        
        $("#bctarget").empty();
    
        }
    
    
    
       function viewbc(a){
    
       
        $("#kushal").modal('show');
     //$("#bctarget").empty();
        $("#bctarget").barcode(a, "code128",{barWidth:2, barHeight:50, fontSize:20});
    
           
        
    }   
    
    
    function printbc(){
        
         var name = document.getElementById("name").value;
         $("#bknameforprint").text(name);
         $("#pbc").show();
          // $("#tb").css({ 'border-bottom': "1px solid #ddd" });
            var a = document.getElementById("borderdiv").outerHTML;
         
            
         //var divText = document.getElementById("borderdiv").outerHTML;
            var ws = '<div style="white-space:pre;">\
        </div>';
            var divText = '<div>'+ws+a+'</div>';
        /* var divText1 = document.getElementById("info").outerHTML;*/
         var myWindow = window.open('', '', 'width=auto,height=800');
         var doc = myWindow.document;
         doc.open();
         doc.write(divText);
         doc.close();
        
        myWindow.window.print();    
        $("#pbc").hide();
        }
    
    
    ///////////////////////////////////////
    
    
    function lend(a){
    
    var id = a;
    $("#lendbook").modal('show');
    $("#lendbookid").val(a);
       
    }
    
    function LendBook(){
    
    var bid = document.getElementById("lendbookid").value;
    var id = document.getElementById("client_id").value;
    var duration = document.getElementById("duration").value;
        
    if(id == "" || duration == "")
    {
    $("#lenderrorthree").hide(); 
    $("#lenderrortwo").hide();
    $("#lenderrorone").show();
    
    }
    if(!/^\d+$/.test(duration))
    
    {
     $("#lenderrorthree").hide(); 
     $("#lenderrorone").hide();
     $("#lenderrortwo").show();
    }  
        
    if(id !== "" && duration !== "" && /^\d+$/.test(duration))
    {
  
    var data = "mnumber="+id;
    
    $.ajax({
    type: "get",
    url: "/verifymember",
    data: data,
        
    success : function(data){
       
        if(data=="pass")
        {
           $("#lenderrorone").hide();
           $("#lenderrortwo").hide(); 
        var data = "mnumber="+id+"&duration="+duration+"&bookid="+bid;
            
            $.ajax({
            type: "get",
            url: "/lendthebook",
            data: data,
                
             success : function(data){
             $("#lendbook").modal('hide');
             location.reload();
             }
                
            });
        
        }
        else
        {
           $("#lenderrorone").hide();
           $("#lenderrortwo").hide(); 
           $("#lenderrorthree").show();  
        }
    
    
    }
    });
    }
    
    }
    
    
    function reserve(a){
    
   
    var id = a;
    $("#reservebook").modal('show');
    $("#reservebookid").val(a);
   
        
    
    
    }
    
    
    
    function ReserveBook(){
    
    var bid = document.getElementById("reservebookid").value;
    var id = document.getElementById("reserved_client_id").value;
    var duration = document.getElementById("reserved_duration").value;
        
        
    if(id == "" || duration == "")
    {
    $("#reserveerrorthree").hide();
    $("#reserveerrortwo").hide();
    $("#reserveerrorone").show();
    
    }
    if(!/^\d+$/.test(duration))
    
    {
    $("#reserveerrorthree").hide();
    $("#reserveerrorone").hide();
    $("#reserveerrortwo").show();
    }  
        
    if(id !== "" && duration !== "" && /^\d+$/.test(duration))
    {
  
    var data = "mnumber="+id;
    
    $.ajax({
    type: "get",
    url: "/verifymember",
    data: data,
        
    success : function(data){
       
        if(data=="pass")
        {
           $("#reserveerrorone").hide();
           $("#reserveerrortwo").hide(); 
        var data = "mnumber="+id+"&duration="+duration+"&bookid="+bid;
            
            $.ajax({
            type: "get",
            url: "/reservethebook",
            data: data,
                
             success : function(data){
             $("#reservebook").modal('hide');
             location.reload();
             }
                
            });
        
        }
        else
        {
           $("#reserveerrorone").hide();
           $("#reserveerrortwo").hide(); 
           $("#reserveerrorthree").show();  
        }
    
    
    }
    });
    }
    
    }
    
    
    
    
</script>
    
    
    @stop