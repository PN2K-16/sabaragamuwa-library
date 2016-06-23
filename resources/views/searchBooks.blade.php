@extends('master')


@section('header')
kushal
@stop

@section('page header')

Search Books
@stop

@section('searchbooks')

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
                        <option value="author" selected>Author</option>
                        <option  value="name">Name</option>
                        <option value="cl_number">Cl Number</option>
                        <option value="publisher">Publisher</option>
                        <option value="edit_translate">Editor/Translator</option>
                        <option value="series">Series</option>
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
                <th class="col-md-2">Author</th>
                <th class="col-md-1">Cl Number</th>

                <th class="col-md-2">Editor/Translator</th>
                <th class="col-md-2">Series</th>
                <th class="col-md-1">Series No.</th>

                <th class="col-md-1">Available</th>   
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
    url: "/searchbooks",
    data: data,
     
     success : function(data){

                var body ="";


                for(var i=0;i<data.length; i++){

                    body+= '<tr> <td style="font-weight:400; font-size:110%">'+ data[i].name +'</td> <td style="font-weight:400; font-size:110%">'+ data[i].author +'</td> <td style="font-weight:400; font-size:110%"><center>'+ data[i].cl_number+'</center></td>   <td style="font-weight:400; font-size:110%">'+data[i].edit_translate+'</td> <td style="font-weight:400; font-size:110%">'+data[i].series+'</td> <td style="font-weight:400; font-size:110%"> <center>'+data[i].series_num+'</center></td> <td style="font-weight:400; font-size:110%"><center>'+ data[i].available+'</center></td> <td><a href="/singleBook?id='+data[i].id+'" class="btn btn-primary btn-block">View</a> </td></tr>';







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
            url: "/searchbooks",
            data: data,

            success : function(data){
                console.log(data);
                var body ="";


                for(var i=0;i<data.length; i++){

                    body+= '<tr> <td style="font-weight:400; font-size:110%">'+ data[i].name +'</td> <td style="font-weight:400; font-size:110%">'+ data[i].author +'</td> <td style="font-weight:400; font-size:110%"><center>'+ data[i].cl_number+'</center></td>   <td style="font-weight:400; font-size:110%">'+data[i].edit_translate+'</td> <td style="font-weight:400; font-size:110%">'+data[i].series+'</td> <td style="font-weight:400; font-size:110%"> <center>'+data[i].series_num+'</center></td> <td style="font-weight:400; font-size:110%"><center>'+ data[i].available+'</center></td> <td><a href="/singleBook?id='+data[i].id+'" class="btn btn-primary btn-block">View</a> </td></tr>';



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