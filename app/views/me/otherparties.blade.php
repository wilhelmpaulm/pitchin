@extends("layouts.me")
@section("main")
<?php
$user = Auth::user();
?>

<div class="container">
    <!-- Example row of columns -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-body">
                    <div id="profilehead" class="text-center c-lightblue fs50">
                        <i class="fa fa-search"></i>
                        <p>SEARCH PARTIES</p>
                    </div>
                    <div id="profilebody">
                        <table class="table table-condensed table-striped table-responsive">
                            <thead>
                                <tr >
                                    <th class="bg-lightblue"></th>
                                </tr>
                            </thead>
                            <tbody style="">
                                @foreach($parties as $p)
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
                                @endforeach
                            </tbody>
                        </table>

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