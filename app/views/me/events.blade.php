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
                        <i class="fa fa-ticket"></i>
                        <p>MY EVENTS</p>
                    </div>
                    <div id="profilebody">

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-success">
                <div class="panel-body">
                    <div id="remindershead" class="text-center c-teal fs50">
                        <i class="glyphicon glyphicon-pencil"></i>
                        <p>NEW EVENT</p>
                    </div>
                    <div id="remindersbody">
                        <form action="{{URL::to('party/add-party')}}" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group c-teal ">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control c-teal " id="name" name="name"  value="">
                                    </div>
                                    <div class="form-group c-teal ">
                                        <label for="description">Description</label>
                                        <textarea name="description" class="form-control c-teal " id="description"  rows="2" cols="20"></textarea>
                                    </div>
                                    
                                    <div class="form-group c-teal ">
                                        <label for="address">Address</label>
                                        <textarea name="address" class="form-control c-teal " id="address"  rows="2" cols="20"></textarea>
                                    </div>
                                    <div class="form-group c-teal ">
                                        <label for="type">Type</label>
                                        <select class="form-control c-teal " id="type" name="type">
                                            @foreach($types as $t)
                                            <option value="{{$t->name}}">{{$t->name}} - {{$t->description}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group c-teal ">
                                        <label for="date_start">Date start</label>
                                        <input type="date" class="form-control c-teal " id="date_start" name="date_start"  value="">
                                    </div>
                                    <div class="form-group c-teal ">
                                        <label for="date_end">Date end</label>
                                        <input type="date" class="form-control c-teal " id="date_end" name="date_end"  value="">
                                    </div>
                                    <div class="form-group c-teal ">
                                        <label for="picture">Picture</label>
                                        <input type="file" class="form-control c-teal " id="picture" name="picture"  value="">
                                        <br>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                               
                                <div class="col-md-6 col-md-offset-3">
                                    <input class="btn btn-default btn-block" type="submit" value="Save Changes" />
                                </div>
                            </div>

                        </form>
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