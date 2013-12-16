@extends("layouts.me")
@section("main")
<?php 
    $user = Auth::user();
?>

<div class="container">
    <!-- Example row of columns -->
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-info">
                <div class="panel-body">
                    <div id="profilehead" class="text-center c-lightblue fs50">
                        @if($user->picture)
                        <img src="{{URL::asset('users/picture/'.$user->picture)}}" class="img-thumbnail" style="width: 100px"/>
                        @else
                        <i class="glyphicon glyphicon-pencil"></i>
                        @endif
                        <p>{{$user->first_name ." ".$user->last_name }} </p>
                    </div>
                    <div id="profilebody">
                        <div class="row">
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-success">
                <div class="panel-body">
                    <div id="remindershead" class="text-center c-lime fs50">
                        <i class="glyphicon glyphicon-book"></i>
                        <p>REMINDERS</p>
                    </div>
                    <div id="remindersbody">
                        
                    </div>
                </div>
            </div>
        </div>

    </div>
<script>
        $("#profilebody").hide();
 
        $("#profilehead").on("click", function() {
            $("#profilebody").toggle("slow")
        });
        $("#remindersbody").hide();
        $("#remindershead").on("click", function() {
            $("#remindersbody").toggle("slow");
        });


        

    </script>
    @stop