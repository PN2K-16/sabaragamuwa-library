@extends('master')


@section('header')
kushal
@stop

@section('page header')
Books that have been borrowed 
@stop

@section('booklog')

<li class="active">
@stop

@section('content')
  

<div class="container-fluid">
    
    <div class="row">

        <form class="form-horizontal">


            <div class="form-group">


                <div class="col-lg-6">
                    <input class="form-control"   oninput="searchf()" id="search" placeholder="Enter Keyword" type="text">
                </div>


                <div class="col-lg-3" style="padding-left:0cm;">
                    <select class="form-control" id="selectsearch" onchange="searchf()">
                        <option value="book_id" selected>Book ID</option>
                        <option  value="client_id">Member ID</option>
                        <option value="borrowed_date">Borrowed Date</option>
                       
                    </select>
                </div>
                <div class="col-lg-1" style="padding-left:0cm;">
                    <button type="button" class="btn btn-primary btn-block" onclick="searchf()">Search</button>
                </div>

            </div>






        </form> 
    </div>
    <br>
    
 <div class="card">
    <div class="card-body">
    <div class="row">
      
        <table class="table table-hover ">
        
        <thead>
                <th class="col-md-1"> Book ID</th>
                <th class="col-md-1">Borrower ID</th>
                <th class="col-md-1">Borrowed Date</th>

                <th class="col-md-1">Duration</th>
                <th class="col-md-1">Due Date</th>
           
                <th class="col-md-1"></th>    

        </thead>
        
            <tbody id="searchbody">
        
            </tbody>
        </table>
    </div>
     </div>
    </div>    
 </div>    


<div class="modal fade" id="returnbook">
    <div class="modal-dialog ">
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
                         <label for="return_comments" class="col-lg-2 control-label">Comments</label>
                         <div class="col-lg-9">
                             <textarea class="form-control" id="return_comments" name="return_comments" placeholder="Comments " type="text" ></textarea>
                        </div>
                   </div>
                   
                    
                   
                   
                   <input type="text" id="returnbookid"  hidden="true">
                   
                    </fieldset>
                </div>
            </form>
                
                
                
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" onclick="ReturnBBook()">Return</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

            </div>
        </div>
    </div>
</div>     
    
    
    
<script>
    

    
window.onload = function(){

 var search = '';   
 var select = 'book_id';

        var data = 'search='+search+'&select='+select;
    
 $.ajax({
    type: "get",
    url: "/searchborrowedbooks",
    data: data,
     
     success : function(data){

                var body ="";


                for(var i=0;i<data.length; i++){

                    body+= '<tr> <td style="font-weight:400; font-size:110%">'+ data[i].book_id +'</td> <td style="font-weight:400; font-size:110%">'+ data[i].Mobile_Number +'</td> <td style="font-weight:400; font-size:110%">'+ data[i].borrowed_date+'</td>   <td style="font-weight:400; font-size:110%">'+data[i].duration+'</td> <td style="font-weight:400; font-size:110%">'+data[i].due_date+'</td> <td><button type="button" class="btn btn-success btn-block" id="dlendYes" onclick="returned('+ data[i].book_id +','+ data[i].client_id +')">Return</button> </td></tr>';







                }

                document.getElementById("searchbody").innerHTML = body;



            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert("error");
            }	 
        });

}     
 


function searchf(){

        var search = $('#search').val();   
        var select = $('#selectsearch').val();

        var data = 'search='+search+'&select='+select;
        $.ajax({
            type: "get",
            url: "/searchborrowedbooks",
            data: data,

            success : function(data){
               
                var body ="";


                for(var i=0;i<data.length; i++){

                      body+= '<tr> <td style="font-weight:400; font-size:110%">'+ data[i].book_id +'</td> <td style="font-weight:400; font-size:110%">'+ data[i].Mobile_Number +'</td> <td style="font-weight:400; font-size:110%"><center>'+ data[i].borrowed_date+'</center></td>   <td style="font-weight:400; font-size:110%">'+data[i].duration+'</td> <td style="font-weight:400; font-size:110%">'+data[i].due_date+'</td> <td><button type="button" class="btn btn-success btn-block" id="dlendYes" onclick="returned('+ data[i].book_id +','+ data[i].client_id +')">Return</button></td></tr>';



                }

                document.getElementById("searchbody").innerHTML = body;



            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert("error");
            }	 
        });






    }


function returned(k,s){

    $("#returnbook").modal('show');
    $("#returnbookid").val(k);


}

    
function ReturnBBook(){

    var bid = document.getElementById("returnbookid").value;
    var comments = document.getElementById("return_comments").value;
   
    
     var data = "bookid="+bid+"&comments="+comments;
            
            $.ajax({
            type: "get",
            url: "/returnlendedbook",
            data: data,
                
             success : function(data){
             $("#returnbook").modal('hide');
             location.reload();
             }
                
            });
    


}  
    
    
    
    
    
</script>    
    
    
    
    
@stop