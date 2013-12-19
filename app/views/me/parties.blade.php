@extends("layouts.me")
@section("main")
<?php
$user = Auth::user();
?>

<div class="container">
    <!-- Example row of columns -->
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-danger">
                <div class="panel-body">
                    <div id="profilehead" class="text-center c-wisteria fs50">
                        <i class="fa fa-gift"></i>
                        <p>MY PARTIES</p>
                    </div>
                    <div id="profilebody">
                        <table class="table table-condensed table-striped table-responsive">
                            <thead>
                                <tr >
                                    <th class="bg-wisteria"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($my_parties as $p)
                                <tr>
                                    <td>

                                        <div class="row">
                                            <div  class="col-md-6">
                                                <img src="{{URL::to('party/picture/'.$p->picture)}}" class="img-thumbnail pull-left" style=" width:100%"/>
                                            </div>

                                            <div  class="col-md-6">
                                               
                                                <a href="{{URL::to('party/manage/'.$p->id)}}"><h3 class="c-teal">{{$p->name}}</h3></a>
                                                
                                                <hr>
                                                <h5 class="c-brown">{{$p->description}}</h5>
                                                <h5 class="c-pumpkin ">{{$p->date_start." until ". $p->date_end}}</h5>
                                                @if($p->status != "ended") 
                                                <form action="{{URL::to('party/end-party')}}" method="POST">
                                                    <input type="hidden" value="{{$p->id}}" name="id">
                                                    <button class="btn btn-default c-alizarin pull-right"><i class="glyphicon glyphicon-off"></i></button>

                                                </form>
                                                 <form action="{{URL::to('party/delete-party')}}" method="POST">
                                                    <input type="hidden" value="{{$p->id}}" name="id">
                                                    <button class="btn btn-default c-alizarin pull-right"><i class="glyphicon glyphicon-trash"></i></button>

                                                </form>
                                                @endif
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            
            
            
            
            <div class="panel panel-info">
                <div class="panel-body">
                    <div id="otherhead" class="text-center c-lightblue fs50">
                        <i class="fa fa-ticket"></i>
                        <p>GOING TO</p>
                    </div>
                    <div id="otherbody">
                        <table class="table table-condensed table-striped table-responsive">
                            <thead>
                                <tr >
                                    <th class="bg-lightblue"></th>
                                </tr>
                            </thead>
                            <tbody style="">
                                @foreach($parties as $p)
                                @if(!PartyController::isPartyMember($p->id, Auth::user()->id))
                                
                                @else
                                <tr>
                                    <td>

                                        <div class="row" >
                                            <div class="col-lg-6">
                                                @if(!PartyController::isPartyMember($p->id, Auth::user()->id))
                                                <a href="#"><img src="{{URL::to('party/picture/'.$p->picture)}}" class="img-thumbnail pull-left" style=" width: 100%"/></a>
                                                @else
                                                <a href="{{URL::to('party/manage/'.$p->id)}}"><img src="{{URL::to('party/picture/'.$p->picture)}}" class="img-thumbnail pull-left" style=" width: 100%"/></a>
                                                @endif
                                            </div>
                                            <div class="col-lg-6">
                                                @if(!PartyController::isPartyMember($p->id, Auth::user()->id))
                                                <a href="#"><h3 class="c-teal">{{$p->name}}</h3></a>
                                                @else
                                                <a href="{{URL::to('party/manage/'.$p->id)}}"><h3 class="c-teal">{{$p->name}}</h3></a>
                                                @endif
                                                <hr>
                                                <h5 class="c-brown">{{$p->description}}</h5>
                                                <h5 class="c-pumpkin ">{{$p->date_start." until ". $p->date_end}}</h5>
                                                
                                                @if($p->status != "ended")
                                                @if(!PartyController::isPartyMember($p->id, Auth::user()->id))
                                                <form action="{{URL::to('party/join-party')}}" method="POST">
                                                    <input type="hidden" name="party_id" value="{{$p->id}}" />
                                                    <input type="submit" class="btn btn-success btn-block" value="Join" />
                                                </form>
                                                @else
                                                <form action="{{URL::to('party/leave-party')}}" method="POST">
                                                    <input type="hidden" name="party_id" value="{{$p->id}}" />
                                                    <input type="submit" class="btn btn-danger btn-block" value="Leave" />
                                                </form>
                                                @endif
                                                @endif
                                            </div>

                                        </div>


                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-success">
                <div class="panel-body">
                    <div id="remindershead" class="text-center c-teal fs50">
                        <i class="glyphicon glyphicon-pencil"></i>
                        <p>NEW PARTY</p>
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
        $("#otherbody").hide();

        $("#otherhead").on("click", function() {
            $("#otherbody").toggle("slow")
        });
        $("#profilebody").hide();

        $("#profilehead").on("click", function() {
            $("#profilebody").toggle("slow")
        });
        $("#remindersbody").hide();
        $("#remindershead").on("click", function() {
            $("#remindersbody").toggle("slow");
        });

        $("table").dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": true,
            "bSort": false,
            "bInfo": false,
            "bAutoWidth": false
        });


    </script>
    @stop