@extends('master')


@section('header')
kushal
@stop

@section('page header')
search Member
@stop

@section('searchmembers')

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
                        <option  value="name" selected>Name</option>
                        <option value="mobile_number">Mobile Number</option>
                        <option value="type">Typer</option>
                       
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
         <th class="col-md-2"> Name</th>
                <th class="col-md-2">Address</th>
                <th class="col-md-1">Mobile Number</th>

                <th class="col-md-1">Type</th>
                
                
                <th class="col-md-1"></th>    

        </thead>
        
            <tbody id="searchbody">
        
            </tbody>
        </table>
    </div>
     </div>
    </div>    
 </div>
        
 
<script>
    
    
 window.onload = function(){

 var search = '';   
 var select = 'name';

        var data = 'search='+search+'&select='+select;
    
 $.ajax({
    type: "get",
    url: "/searchmembers",
    data: data,
     
     success : function(data){

                var body ="";


                for(var i=0;i<data.length; i++){
                    
                    var fname = data[i].name;
                    var lnmae = data[i].Last_Name;
                    var name = fname + " " + lnmae;

                    body+= '<tr> <td style="font-weight:400; font-size:110%">' +name+  '</td> <td style="font-weight:400; font-size:110%">'+ data[i].address +'</td> <td style="font-weight:400; font-size:110%"><center>'+ data[i].Mobile_Number+'</center></td>   <td style="font-weight:400; font-size:110%">'+data[i].typee+'</td> <td><a href="/singleMember?id='+data[i].id+'" class="btn btn-primary btn-block">View</a> </td></tr>';



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
            url: "/searchmembers",
            data: data,

            success : function(data){
               
                var body ="";


                for(var i=0;i<data.length; i++){

                    var fname = data[i].name;
                    var lnmae = data[i].Last_Name;
                    var name = fname + " " + lnmae;

                    body+= '<tr> <td style="font-weight:400; font-size:110%">' +name+  '</td> <td style="font-weight:400; font-size:110%">'+ data[i].address +'</td> <td style="font-weight:400; font-size:110%"><center>'+ data[i].Mobile_Number+'</center></td>   <td style="font-weight:400; font-size:110%">'+data[i].typee+'</td> <td><a href="/singleMember?id='+data[i].id+'" class="btn btn-primary btn-block">View</a> </td></tr>';


                }

                document.getElementById("searchbody").innerHTML = body;



            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert("error");
            }	 
        });






    }

    
    
    
    
</script>    
    
    
    
    
    
@stop