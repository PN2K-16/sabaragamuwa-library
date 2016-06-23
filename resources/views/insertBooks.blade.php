@extends('master')


@section('header')
kushal
@stop

@section('page header')

Insert Books
@stop

@section('insertbooks')

<li class="active">
@stop

@section('content')

<div class="container-fluid">
 
    <div > 
     @if (Session::has('message'))
    <div class="alert alert-success" style="text-align:center" ><p id="lol" >Book Successfully Added</p><input type="text" hidden id="book_name_id" value="{{ Session::get('message') }}"></div>
@endif
      
      
      
         
         {!! Form::open(array('route' => 'addbooks', 'class' => 'form', 'novalidate' => 'novalidate', 'files' => true, 'method' => 'post', 'id' => 'disableform')) !!}
                    {!! csrf_field() !!}
    <div class=" form form-horizontal">
  <fieldset>
    <legend>Main Info </legend>
      
     
      
      <div class="form-group">
      <label for="name" class="col-lg-1 control-label">Name</label>
      <div class="col-lg-10 @if ($errors->has('name')) has-error @endif" >
        <input class="form-control" id="name" name="name" placeholder="Name " type="text" value="{{ Input::old('name') }}">
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
        <button type="submit" id="bksave" onclick="showadd()"  class="btn btn-primary btn-block " style="padding-right:0cm">Save</button>
                </div>
          </div>
          
       
        <div class="col-lg-1 col-lg-offset-2" align="right" >
           
      </div>
    </div>
   
      
      
      
      
        </fieldset>
             </div>
        {!! Form::close() !!}
    </div>
    </div>
      
   
       
              
              <div id="copytable"></div>
      
       
        <div class="form-group" id="doneadd" hidden="true">
      <div class="col-lg-2 col-lg-offset-2" align="right" >
        
        
      </div>
         
             <div class="col-lg-2  " align="right" style="padding-right:0cm;margin-left:15px" >
        <button type="button" class="btn btn-success btn-block" onclick="rset()">Done</button>
      </div>
            
        <div class="col-lg-2  " align="right" style="padding-right:0cm;margin-left:15px" >
        <button type="button" id="barcode" class="btn btn-info btn-block" onclick="viewbc()" disabled>Generate Barcode</button>
      </div>
        
        <div class="col-lg-2  " align="right" style="padding-right:0cm">
            <button type="button" id="addcopy" onclick="openCopy()" class="btn btn-primary btn-block ">Add Copy </button>
        </div>
        <div class="col-lg-1 col-lg-offset-2" align="right" >
           
      </div>
    </div>
       
       
     

   
    
    
    <br> <br>
    
            
            
    </div>
   
    </div> 
    
    
    
    <div  class="modal fade" id="add_copies">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Add a Copy</h4>
      </div>
      <div class="modal-body">
          <div class="alert alert-dismissible alert-danger" id="copyerror" hidden="true">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Error!</strong>  System encountered an issue. The most likely cause might be the Book ID already existing in the system.
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
        <input class="form-control" id="copydate" placeholder="    " type="text" value="<?php echo date("Y-m-d");  ?>">
      </div>
    
      
    </div>

              
                   <div class="form-group">
      <label for="copyremarks" class="col-lg-2 control-label">Remarks</label>
      <div class="col-lg-10">
        <textarea class="form-control" rows="3" placeholder="  remarks  " id="copyremarks"></textarea>
       
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
   <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>-->
        <h4 class="modal-title">Print View</h4>
      </div>
      <div class="modal-body">
            
          <div id="borderdiv" >
            
                  <div id="pbc" hidden="true"><h2 style="display:inline;">barcords for copies of &ensp;</h2><h1 id="bknameforprint" style="display:inline;"> </h1></div>
              
              
                  <table id="tb" style=" border-collapse: separate;
    border-spacing: 0 2em;">
                 <tbody id="searchbody">
        
                      </tbody>
                  </table>
         
            
            
              
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
    
function rset(){

window.location = "/insertBooks";

}
window.onload = function(){
        
var idd = document.getElementById("lol").value;
    if(idd !== "" || idd !== "null")
    {
                $("#name").prop( "disabled", true );
                $("#author").prop( "disabled", true );
                $("#cl_number").prop( "disabled", true );
                $("#cat_num").prop( "disabled", true );
                $("#edit_translate").prop( "disabled", true );
                $("#publisher").prop( "disabled", true );
                $("#img").prop( "disabled", true );
                $("#published_place").prop( "disabled", true );
                $("#published_year").prop( "disabled", true );
                $("#pages").prop( "disabled", true );
                $("#height").prop( "disabled", true );
              
                $("#series").prop( "disabled", true );
                $("#series_num").prop( "disabled", true );
                $("#isbn").prop( "disabled", true );
                $("#remarks").prop( "disabled", true );
    $("#doneadd").show();
    $("#savehide").hide();
    }
        
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
        
        
    function saveCopy(){
    
     $("#barcode").prop( "disabled", false );
     $("#editbk").prop( "disabled", true );
     $("#bookdone").hide();
     $("#booksuccessupdate").hide();
     var book_name_id = document.getElementById("book_name_id").value; 
     var copyid= document.getElementById("copyid").value;    
     var copydate = document.getElementById("copydate").value;     
     var copyremarks= document.getElementById("copyremarks").value;     
    
      var data = "bnid="+book_name_id+"&cid="+copyid+"&copydate="+copydate+"&copyremarks="+copyremarks;
        
        $.ajax({
    type: "get",
    url: "/addCopy",
    data: data,
        
    success : function(data){
   document.getElementById("copysuccess").removeAttribute("hidden",false);
        
       
        var body="";
        if(data.length>0){
        body+= '<table class="table table-striped table-hover" id="copies"><thead><th> ID</th><th>Date added </th><th>Date updated </th><th> Reserved</th><th>Status</th><th>Remarks</th><th></th> </thead> <tbody> ';
        
        for(var i =0; i<data.length; i++){
            
            
          
        
        /*    if (data[i].reserved == 0){
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
            
            body+= '<tr> <td> '+ data[i].id + '</td><td>'+data[i].date_added+'</td><td>'+data[i].date_updated+'</td><td>'+data[i].reserved+'</td><td>'+data[i].status+'</td><td>'+data[i].remarks+'</td><td><button class="btn btn-danger" onclick="deleteConfirm('+ data[i].id+')"> Remove </button></td></tr>';
        
        
        
        
        }
        
            body+= '</tbody> </table>';
       
        
        }
        document.getElementById("copytable").innerHTML=body;
        $('#add_copies').modal('hide');
        
        },
	 error: function(xhr, ajaxOptions, thrownError) {
       //document.getElementById("copyerror").removeAttribute("hidden",false);
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
        
        
        var body="";
        if(data.length>0){
        body+= '<table class="table table-striped table-hover"><thead><th> ID</th><th>Date added </th><th>Date updated </th><th> Reserved</th><th>Status</th><th>Remarks</th><th></th> </thead> <tbody> ';
        
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
            
            body+= '<tr> <td> '+ data[i].id + '</td><td>'+data[i].date_added+'</td><td>'+data[i].date_updated+'</td><td>'+data[i].reserved+'</td><td>'+data[i].status+'</td><td>'+data[i].remarks+'</td><td><button class="btn btn-danger" onclick="deleteConfirm('+ data[i].id+')"> Remove </button></td></tr>';
        
        
        
        
        }
        
            body+= '</tbody> </table>';
       
        
        }
        else{$("#barcode").prop( "disabled", true );}
        document.getElementById("copytable").innerHTML=body;
        
        },
	 error: function(xhr, ajaxOptions, thrownError) {
       //document.getElementById("copyerror").removeAttribute("hidden",false);
          $("#copyerror").show();
      }	 

     });

         
         
     }
        
        
        
   function editBook(){
     
       $("#bookdone").hide();
        $("#booksuccess").hide();
       $("#booksuccessupdate").hide();
       $("#bookerror").hide();
       $("#bookedit").hide();
         
          $('#disableform').find('input, textarea').prop('disabled',false);
         
         $("#bookupdate").show();
         
     
     
     
     }
        
        
        
    function updateBook(){
        
     $("#bookdone").hide();
     $("#booksuccessupdate").hide();
     $("#bookerror").hide();
      
      
      
      var book_name_id = $('#book_name_id').val();
     
      var name = document.getElementById("name").value;
      var author = document.getElementById("author").value;
      var cl_num = document.getElementById("cl_number").value;    
      var edit = document.getElementById("edit_translate").value;
     
      var publisher = document.getElementById("publisher").value;  
      var published_place = document.getElementById("published_place").value;   
      var published_year = document.getElementById("year").value;     
     
      var pages = document.getElementById("pages").value; 
      var height = document.getElementById("height").value;       
        
      var series = document.getElementById("series").value;     
      var series_num = document.getElementById("series_num").value;      
      var isbn = document.getElementById("isbn").value;    
      var remarks = document.getElementById("remarks").value;      
     
     
     var data = "name="+name+"&author="+author+"&cl_num="+cl_num+"&edit="+edit+"&publisher="+publisher+"&published_place="+published_place+"&published_year="+published_year+"&pages="+pages+"&height="+height+"&series="+series+"&series_num="+series_num+"&isbn="+isbn+"&remarks="+remarks+"&bnid="+book_name_id;
    
     
     
     
 
  $.ajax({
    type: "get",
    url: "/updateBook",
    data: data,
        
    success : function(data){
     
         $("#booksuccessupdate").show();
         $("#bookupdate").hide();
         $("#bookedit").show();
   
         $('#disableform').find('input, textarea').prop('disabled',true);
      

        },
	 error: function(xhr, ajaxOptions, thrownError) {
         $("#bookerror").show();
       //document.getElementById("bookerror").removeAttribute("hidden",false);
      }	 
    });
 

     
     
     }
     
        
        
       function viewbc(){
    
     
        $("#kushal").modal('show');
        var vals = new Array();
        var i=0;
        var options='';
    $("#copies tr:gt(0) td:nth-child(1)").each(function(){
       var t=$(this).html();
       if($.inArray(t, vals) < 0)
       {
           vals[i]=t;
           i++;
       }
    });

    
         for(var j=0;j<i;j++)
    {
        $('#tb tbody').append('<tr><td id='+j+'></td></tr>');
        //$('#tb tbody').append('<tr><td> </td></tr>');
        $('#'+j+'' ).barcode(vals[j], "code128",{barWidth:2, barHeight:50, fontSize:20});
    }   
         
           
        
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
    
        

        
    
    </script>
    
@stop
