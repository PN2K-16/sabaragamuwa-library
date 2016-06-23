@extends('master')


@section('header')
kushal
@stop

@section('page header')
<h3>History of Copy ID <?php echo $bid; ?></h3>
@stop

@section('searchmembers')

<li class="active">
@stop

@section('content')
 <div class="container-fluid">   
<div >

            <table class="table table-striped table-hover" id="retable">

                <thead>

                    <th> Client Name</th>
                    <th> Client Id</th>
                    <th> Borrowed Date</th>
                    <th> Returned Date </th>
                 
                    <th class="col-lg-1"> </th>
                    <th class="col-lg-1"> </th>
                    <th class="col-lg-1"> </th>
                    <th class="col-lg-1"> </th>

                </thead>
                <tbody id="copytable">

                    @foreach ($info as $b)

                    <tr>
                        <td> {{$b->name}} {{$b->Last_Name}}</td>
                        <td>{{$b->id}} </td>
                        <td>{{$b->borrowed_date}} </td>
                        <td>{{$b->returned_date}}<?php if ($b->returned_date==""||$b->returned_date=="Null"){ echo "Pending"; } ?>  </td>


                    </tr>



                    @endforeach
                </tbody>


            </table>

        </div>   
    </div>
    
@stop