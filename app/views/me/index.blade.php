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
                        <h3 class="c-blue text-center">BADGES</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="well">
                                @foreach($user_badges as $ub)
                                <?php $b = Badge::find($ub->badge_id)?>
                                <span>
                                <img src="{{URL::asset('party/badges/'.$b->picture)}}" title="{{$b->title}} --- {{$b->conditions}}" class="img-circle" style=" width: 20%">
                                </span>
                                @endforeach
                                </div>
                            </div>
                            
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
                        <div class="well" style="max-height: 350px;overflow-y: scroll; overflow-style: auto">
                            @foreach($reminders as $r)
                            <?php $ur = User::find($r->sender_id); ?>
                            <div class="media">
                                @if(Auth::user()->id == $r->user_id)
                                <a class="pull-left" href="#">
                                    @else
                                    <a class="pull-left" href="#">
                                        @endif
                                        <img class="media-object img-circle " src="{{URL::asset('users/picture/'.$ur->picture)}}" alt="{{$ur->first_name." ".$ur->last_name}}" style="width: 64px; height: 64px; display: block">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{$ur->first_name." [ ".$r->subject." ]"}} <small>{{$r->created_at}}</small></h4>
                                        {{$r->message}}
                                        <form action="{{URL::to('reminders/delete-reminder')}}" method="POST">
                                            <input type="hidden" value="{{$r->id}}" name="id">
                                            <button class="btn btn-default c-alizarin pull-right"><i class="glyphicon glyphicon-trash"></i></button>

                                        </form>
                                    </div>
                            </div>
                            @endforeach
                        </div>
                        <hr>
                        <div >
                            <form action="{{URL::to('reminders/add-reminder')}}" method="POST">
                                <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                                <input type="text" class="form-control  c-lime" placeholder="subject" name="subject"><br>
                                <input type="text" class="form-control  c-lime" placeholder="message" name="message"><br>
                                <input type="submit" class="btn btn-block btn-success " value="Send" />
                            </form>
                        </div>
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