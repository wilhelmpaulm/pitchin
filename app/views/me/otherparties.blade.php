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
                        <i class="fa fa-gift"></i>
                        <p>MY PARTIES</p>
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
                                        
                                        <div >
                                            <img src="{{URL::to('party/picture/'.$p->picture)}}" class="img-thumbnail pull-left" style=" width: 25%"/>
                                            <div style="padding-left: 10px" class="pull-left">
                                                <a href="{{URL::to('party/manage/'.$p->id)}}"><h3 class="c-teal">{{$p->name}}</h3></a>
                                                <hr>
                                                <h5 class="c-brown">{{$p->description}}</h5>
                                                <h5 class="c-pumpkin ">{{$p->date_start." until ". $p->date_end}}</h5>
                                                    {{!PartyController::isPartyMember($p->id, Auth::user()->id)}}
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