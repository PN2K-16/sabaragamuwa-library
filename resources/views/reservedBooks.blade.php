@extends('master')


@section('header')
kushal
@stop

@section('page header')
Books that have been reserved
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
                        <option value="reserved_date">Borrowed Date</option>
                       
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
                <th class="col-md-1">Book ID</th>
                <th class="col-md-1">Borrower ID</th>
                <th class="col-md-1">Reserved Date</th>

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

    
<div class="modal fade" id="lendbook">
    <div class="modal-dialog modal-sm">
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
                         <label for="duration" class="col-sm-4 control-label">Duration</label>
                         <div class="col-sm-6">
                        <input class="form-control" id="duration" name="duration" placeholder="duration " type="text" >
                        </div>
                   </div>
                   
                    <div class="alert alert-dismissible alert-danger" id="lenderrorone" hidden="true" align="center">
                  <strong> This field is required!</strong>  
                     </div>
                   <div class="alert alert-dismissible alert-danger" id="lenderrortwo" hidden="true" align="center">
                  <strong> Duartion should be an integer!</strong>  
                     </div>
                 
                   
                   <input type="text" id="lendbookid"  hidden="true">
                   <input type="text" id="lendclientid"  hidden="true">
                   
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
    
    

<script>
    

    
window.onload = function(){

 var search = '';   
 var select = 'book_id';

        var data = 'search='+search+'&select='+select;
    
 $.ajax({
    type: "get",
    url: "/searchreservedbooks",
    data: data,
     
     success : function(data){

                var body ="";


                for(var i=0;i<data.length; i++){

                    body+= '<tr> <td style="font-weight:400; font-size:110%">'+ data[i].book_id +'</td> <td style="font-weight:400; font-size:110%">'+ data[i].Mobile_Number +'</td> <td style="font-weight:400; font-size:110%">'+ data[i].reserved_date+'</td>   <td style="font-weight:400; font-size:110%">'+data[i].duration+'</td> <td style="font-weight:400; font-size:110%">'+data[i].due_date+'</td> <td><button type="button" class="btn btn-primary btn-block" id="dlendYes" onclick="lend('+ data[i].book_id +','+ data[i].client_id +')">Lend</button> </td></tr>';







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
            url: "/searchreservedbooks",
            data: data,

            success : function(data){
               
                var body ="";


                for(var i=0;i<data.length; i++){

                      body+= '<tr> <td style="font-weight:400; font-size:110%">'+ data[i].book_id +'</td> <td style="font-weight:400; font-size:110%">'+ data[i].Mobile_Number +'</td> <td style="font-weight:400; font-size:110%">'+ data[i].reserved_date+'</td>   <td style="font-weight:400; font-size:110%">'+data[i].duration+'</td> <td style="font-weight:400; font-size:110%">'+data[i].due_date+'</td> <td><button type="button" class="btn btn-primary btn-block" id="dlendYes" onclick="lend('+ data[i].book_id +','+ data[i].client_id +')">Lend</button> </td></tr>';



                }

                document.getElementById("searchbody").innerHTML = body;



            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert("error");
            }	 
        });






    }

function lend(e,f){

 $("#lendbook").modal('show');
$("#lendbookid").val(e);
$("#lendclientid").val(f);
    
}

function LendBook(){

    var bid = document.getElementById("lendbookid").value;
    var id = document.getElementById("lendclientid").value;
    var duration = document.getElementById("duration").value;

    
     if(duration == "")
    {
    
    $("#lenderrortwo").hide();
    $("#lenderrorone").show();
    
    }
    if(!/^\d+$/.test(duration))
    
    {
    
    $("#lenderrorone").hide();
    $("#lenderrortwo").show();
    }
    
    if(duration !== "" && /^\d+$/.test(duration))
    {
         $("#lenderrorone").hide();
         $("#lenderrortwo").hide();
     var data = "id="+id+"&duration="+duration+"&bookid="+bid;
            
            $.ajax({
            type: "get",
            url: "/lendreservedbook",
            data: data,
                
             success : function(data){
             $("#lendbook").modal('hide');
             location.reload();
             }
                
            });
    }

}

    
</script>        
    
    
    
@stop