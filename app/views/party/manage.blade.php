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
                    <div id="profilehead" class="text-center c-lightblue fs50 ">
                        <img id="partyimage" src="{{URL::to('party/picture/'.$party->picture)}}" class="img-rounded" style=" width: 100px"/>
                        <br>
                        <p>{{$party->name}}</p>
                    </div>
                    <div id="profilebody">


                        <div>

                            <legend>Description</legend>
                            <h5 class="c-brown">{{$party->description}}</h5>
                            <legend>Address</legend>
                            <h5 class="c-magenta ">{{$party->address}}</h5>
                            <legend>Date</legend>
                            <h5 class="c-pumpkin ">{{$party->date_start." until ". $party->date_end}}</h5>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6" >
            <div class="panel panel-success">
                <div class="panel-body">
                    <div id="shoutboxhead" class="text-center c-teal fs50">
                        <i class="glyphicon glyphicon-bullhorn"></i>
                        <p>SHOUTBOX</p>
                    </div>
                    <div id="shoutboxbody" >
                        <div class="well" style="max-height: 350px;overflow-y: scroll; overflow-style: auto">
                            @foreach($chats as $c)
                            <?php $uc = User::find($c->user_id); ?>
                            <div class="media">
                                @if(Auth::user()->id == $c->user_id)
                                <a class="pull-right" href="#">
                                    @else
                                    <a class="pull-left" href="#">
                                        @endif
                                        <img class="media-object img-circle " src="{{URL::asset('users/picture/'.$uc->picture)}}" alt="{{$uc->first_name." ".$uc->last_name}}" style="width: 64px; height: 64px; display: block">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{$uc->first_name." ".$uc->last_name}} <small>{{$c->created_at}}</small></h4>
                                        {{$c->message}}
                                    </div>


                            </div>


                            @endforeach
                        </div>

                        <div >
                            <form action="{{URL::to('chat/add-chat')}}" method="POST">
                                <input type="hidden" value="{{$party->id}} " name="party_id">

                                <div class="input-group">
                                    <input type="text" class="form-control input-lg c-teal"  name="message">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default c-teal input-lg" type="submit">Go!</button>
                                    </span>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-warning">
                <div class="panel-body">
                    <div id="membershead" class="text-center c-carrot fs50">

                        <i class="glyphicon glyphicon-glass"></i>
                        <p>PARTY MEMBERS</p>


                    </div>
                    <div id="membersbody">
                        @foreach($party_members as $pm)
                        <?php $um = User::find($pm->user_id) ?>
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object img-circle" src="{{URL::asset('users/picture/'.$um->picture)}}" alt="{{$um->first_name." ".$pm->last_name}}" style="width: 64px; height: 64px; display: block">
                            </a>
                            <div class="media-body well">
                                <h4 class="media-heading c-pumpkin  lead">{{$um->first_name." ".$um->last_name}} <span class="c-brown">[ {{$pm->role}} ]</span></h4>

                                <div class="c-carrot ">
                                    <table class="dtold">
                                        <thead>
                                            <tr>
                                                <th>TYPE</th>
                                                <th>QTY</th>
                                                <th>NAME</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $u_contributions = Party_contribution::where("party_id", "=", $party->id)->where("user_id", "=", $um->id)->get() ?>
                                            @foreach($u_contributions as $mc)
                                            <tr>
                                                <?php $c = Contribution::find($mc->contribution_id) ?>
                                                <td title="{{$c->description}}">{{$c->name}}</td>
                                                <td>{{$mc->quantity}}</td>
                                                <td>{{$mc->name}}</td>

                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6" >
            <div class="panel panel-danger">
                <div class="panel-body">
                    <div id="contributionhead" class="text-center c-alizarin fs50">
                        <i class="glyphicon glyphicon-gift"></i>
                        <p>MY PART</p>
                    </div>
                    <div id="contributionbody" >
                        <div class="c-alizarin well">
                            <table class="dt">
                                <thead>
                                    <tr>
                                        <th>TYPE</th>
                                        <th>QTY</th>
                                        <th>NAME</th>
                                        <th width='5%'></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($my_contributions as $mc)
                                    <tr>
                                        <?php $c = Contribution::find($mc->contribution_id) ?>
                                        <td title="{{$c->description}}">{{$c->name}}</td>
                                        <td>{{$mc->quantity}}</td>
                                        <td>{{$mc->name}}</td>
                                        <td>
                                            <form method='post' action="{{URL::to('contributions/delete-contribution')}}">
                                                <input type="hidden" value="{{$mc->id}}" name="id">
                                                <button type="submit" class="btn btn-default c-alizarin"><i class="glyphicon glyphicon-trash"></i></button> 
                                            </form>

                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <button id="addcontributionhead" class=" btn btn-default btn-block text-center c-nephritis ">Add Contribution</button>
                        <hr>
                        <button id="rolehead" class=" btn btn-default btn-block text-center c-nephritis ">My Role</button>
                        <div id="rolebody">
                            <form action="{{URL::to('party/edit-role')}}" method="POST">
                                <div class="form-group c-nephritis ">
                                    <label for="role">Role</label>
                                    <select class="form-control c-nephritis " id="role" name="role">
                                        @foreach($roles as $c)
                                        <option value="{{$c->name}}">{{$c->name}} --- "{{$c->description}}"</option>
                                        @endforeach
                                    </select>
                                </div>

                                <input  type="hidden" name="party_id" value="{{$party->id}}" />
                                <input class="btn btn-block btn-default  c-nephritis "  type="submit" value="Submit" />
                            </form>
                        </div>
                        <div id="addcontributionbody">
                            <br>
                            <form action="{{URL::to('contributions/add-contribution')}}" method="POST">
                                <div class="form-group c-nephritis ">
                                    <label for="type">Type</label>
                                    <select class="form-control c-nephritis " id="type" name="contribution_id">
                                        @foreach($contributions as $c)
                                        <option value="{{$c->id}}">{{$c->name}} --- "{{$c->description}}"</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group c-nephritis ">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control c-nephritis " id="name" name="name"  value="">
                                </div>
                                <div class="form-group c-nephritis ">
                                    <label for="quantity">Quantity</label>
                                    <input type="number" class="form-control c-nephritis " id="quantity" min="1" name="quantity"  value="">
                                </div>
                                <input  type="hidden" name="party_id" value="{{$party->id}}" />
                                <input class="btn btn-block btn-default  c-nephritis "  type="submit" value="Submit" />
                            </form>

                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div id="remindershead" class="text-center c-lime fs50">
                        <i class="glyphicon glyphicon-book"></i>
                        <p>REMINDERS</p>
                    </div>
                    <div id="remindersbody">
                        <div>
                            <form action="{{URL::to('reminders/add-reminder')}}" method="POST">
                                <div class="form-group c-nephritis ">
                                    <label for="to">Send to</label>
                                    <select class="form-control  c-nephritis " id="to" name="user_id">
                                        @foreach($party_members as $pm)
                                        <?php $u = User::find($pm->user_id) ?>
                                        <option value="{{$pm->user_id}}">{{$u->first_name ." ".$u->last_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                    <input type="hidden" class="form-control  c-nephritis " id="subject" name="subject"  value="{{$party->name}}">

                               
                                <div class="form-group c-nephritis ">
                                    <label for="message">Message</label>
                                    <input type="text" class="form-control  c-nephritis " id="message" name="message"  value="">
                                </div>
                                <input type="submit" class="btn btn-block btn-success " value="Send" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <div class="col-md-6">
            <div class="panel panel-warning">
                <div class="panel-body">
                    <div id="badgehead" class="text-center c-pink fs50">

                        <i class="fa fa-trophy"></i>
                        <p>MEMBERS CRED</p>


                    </div>
                    <div id="badgebody">
                        @foreach($party_members as $pm)
                        <?php $um = User::find($pm->user_id) ?>
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object img-circle" src="{{URL::asset('users/picture/'.$um->picture)}}" alt="{{$um->first_name." ".$pm->last_name}}" style="width: 64px; height: 64px; display: block">
                            </a>
                            <div class="media-body well">
                                <h4 class="media-heading c-pink lead">{{$um->first_name." ".$um->last_name}} <span class="c-brown">[ {{$pm->role}} ]</span></h4>
                                
                                
                                <?php $user_badges = User_badge::where("user_id", "=", $pm->user_id)->get()?>
                                @foreach($user_badges as $ub)
                                <?php $b = Badge::find($ub->badge_id)?>
                                <span>
                                <img src="{{URL::asset('party/badges/'.$b->picture)}}" title="{{$b->title}} --- {{$b->conditions}}" class="img-circle" style=" width: 10%">
                                </span>
                                @endforeach
                                
                            </div>
                        </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $("#addcontributionbody").hide();
        $("#profilebody").hide();
        $("#remindersbody").hide();
        $("#shoutboxbody").hide();
        $("#membersbody").hide();
        $("#contributionbody").hide();
        $("#rolebody").hide();
        $("#badgebody").hide();


        $("#rolehead").on("click", function() {
            $("#rolebody").toggle("slow");
        });
        $("#addcontributionhead").on("click", function() {
            $("#addcontributionbody").toggle("slow");
        });
        $("#profilehead").on("click", function() {
            $("#profilebody").toggle("slow");
        });

        $("#membershead").on("click", function() {
            $("#membersbody").toggle("slow")
        });

        $("#badgehead").on("click", function() {
            $("#badgebody").toggle("slow")
        });





        $(".dtold").dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": false,
            "bInfo": false,
            "bAutoWidth": false
        });

        $(".dt").dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": true,
            "bSort": false,
            "bInfo": false,
            "bAutoWidth": false
        });


    </script>
    @if(PartyController::isPartyMember($party->id, Auth::user()->id))
    <script>
        $("#remindershead").on("click", function() {
            $("#remindersbody").toggle("slow");
        });
        $("#shoutboxhead").on("click", function() {
            $("#shoutboxbody").toggle("slow");
        });
    </script>
    @if($party->status != "ended")
    <script>
        $("#contributionhead").on("click", function() {
            $("#contributionbody").toggle("slow");
        });
    </script>
    @endif

    @else
    @endif


    @stop