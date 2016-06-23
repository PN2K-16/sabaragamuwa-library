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
  
 
    
    
    
    
<div class="container-fluid">
    <div class="row" id="show_book">
 
<fieldset>
    <legend>Main Info </legend>
    <div hidden>


    </div>
    
        <div style="width:50%;float:left">
    <table style="margin-left:8%">
    <tr>
    
        <td style="width:200px"><h4 class="control-label">First Name</h4></td>
        <td><h5 style="font-weight:600;font-size:110%"> {{$member_name->name}}</h5></td>
        
    </tr>
    <tr>
    
        <td style="width:200px"><h4 class="control-label">Type</h4></td>
        <td><h5 style="font-weight:600;font-size:110%"> {{$member_name->typee}}</h5></td>
        
    </tr>
        
      <tr>
    
        <td style="width:200px"><h4 class="control-label">Nic</h4></td>
        <td><h5 style="font-weight:600;font-size:110%"><?php if($member_name->nic=="" ||$member_name->nic==null){
                            echo "None";

                        } 
else {
    echo $member_name->nic;

}
                        ?></h5></td>
        
    </tr>
    
    </table>
        </div>
        
        <div style="width:50%;float:left">
         <table style="margin-left:8%">
    <tr>
    
        <td style="width:200px"><h4 class="control-label">Last Name</h4></td>
        <td><h5 style="font-weight:600;font-size:110%"> {{$member_name->Last_Name}}</h5></td>
        
    </tr>
             
     <tr>
    
        <td style="width:200px"><h4 class="control-label">Ref. Number</h4></td>
        <td><h5 style="font-weight:600;font-size:110%"><?php if($member_name->Ref_Num=="" ||$member_name->Ref_Num==null){
                            echo "None";

                        } 
else {
    echo $member_name->Ref_Num;

}
                        ?></h5></td>
        
    </tr>
    
    </table>
        </div>
   
      <legend>Contact Info </legend>
    <div hidden>


    </div>
    
      <div style="width:50%;float:left">
    <table style="margin-left:8%">
    <tr>
    
        <td style="width:200px"><h4 class="control-label">Mobile Phone</h4></td>
        <td><h5 style="font-weight:600;font-size:110%"> {{$member_name->Mobile_Number}}</h5></td>
        
    </tr>
    <tr>
    
        <td style="width:200px"><h4 class="control-label">E-mail</h4></td>
        <td><h5 style="font-weight:600;font-size:110%"><?php if($member_name->email=="" ||$member_name->email==null){
                            echo "None";

                        } 
else {
    echo $member_name->email;

}
                        ?></h5></td>
        
    </tr>
    
    </table>
        </div>
       
     <div style="width:50%;float:left">
         <table style="margin-left:8%">
    <tr>
    
        <td style="width:200px"><h4 class="control-label">Land Phone</h4></td>
        <td><h5 style="font-weight:600;font-size:110%"><?php if($member_name->Land_Number=="" ||$member_name->Land_Number==null){
                            echo "None";

                        } 
else {
    echo $member_name->Land_Number;

}
                        ?></h5></td>
        
    </tr>
             
     <tr>
    
        <td style="width:200px"><h4 class="control-label">Address</h4></td>
        <td><h5 style="font-weight:600;font-size:110%">{{$member_name->address}}</h5></td>
        
    </tr>
    
    </table>
        </div>
    
     <legend>Other Info</legend>
    <div hidden>


    </div>
    
     
        
        <div style="width:50%;float:left">
         <table style="margin-left:8%">
    <tr>
    
        <td style="width:200px"><h4 class="control-label">Status</h4></td>
        <td><h5 style="font-weight:600;font-size:110%"> {{$member_name->status}}</h5></td>
        
    </tr>
             
  
    
    </table>
        </div>
        
              <div style="width:50%;float:left">
         <table style="margin-left:8%">
    <tr>
    
        <td style="width:200px"><h4 class="control-label">Remarks</h4></td>
        <td><h5 style="font-weight:600;font-size:110%"><?php if($member_name->	remarks=="" ||$member_name->	remarks==null){
                            echo "None";

                        } 
else {
    echo $member_name->	remarks;

}
                        ?></h5></td>
        
    </tr>
             
  
    
    </table>
        </div>

</fieldset>
        
         <div class="form-group">
              <div class="col-lg-11" style="margin-top:3%">
                    <div class="btn-toolbar">
                  <div   class="col-lg-10" id="ad">
                     <button type="button" class="btn btn-danger pull-right" data-toggle="modal" data-target="#deleteM" style="width:4cm;border-radius: 5px;">Remove</button>
                  </div>
                  
                
                  <div class="col-lg-2" id="ad">
                     <button type="button" class="btn btn-primary pull-right" onclick="edit()" style="width:4cm;border-radius: 5px;">Edit</button>
                  </div>
                  </div>
        </div>
    </div>
        
        
    </div>
    
      <div class="modal fade" id="deleteM">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Confirm Delete</h4>
            </div>
            <div class="modal-body" id="memberDelSuccess">

                Are you Sure you want to Delete <b>{{$member_name->name}} {{$member_name->Last_Name}}  </b>?
                <br>
                <b> This cannot be reverted Later.</b>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="DelSinglemember('{{$member_name->id}}')">Delete</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

            </div>
        </div>
    </div>
</div>
   
       
    
    
      
      
      <script>
          
          
          function rset(){
          
          
          location.href="searchBooks";
          
          }
          
          
          </script>
      
     
      
  </fieldset>
</div>
        </form>
    <
    
    
    
    
   
 
        

    
  
    </div>
    

<script>

    function edit(){
    
    window.location = "/singleMemberedit?id={{$member_name->id}}";
      //  window.location = "/addMembers";
       
        
    }

    
    
      function DelSinglemember(a) {



        $.ajax({
            type: "get",
            url: "/deletemember",
            data: {

                id: a

            },

            success: function (data) {

                document.getElementById("memberDelSuccess").innerHTML = '<div class="alert alert-dismissible alert-warning">  <button type="button" class="close" data-dismiss="alert">×</button>  <p> Successfully Deleted.</p> </div>';
                
                setTimeout(function(){  location.href="searchMembers"; }, 1500);
                
           

            },
            error: function (xhr, ajaxOptions, thrownError) {
                //document.getElementById("copyerror").removeAttribute("hidden", false);
                $("#copyerror").show();
            }
        });




    }    
    
    
 
</script>

    
@stop