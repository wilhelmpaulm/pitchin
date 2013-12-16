
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="wilhelm paul martinezz">
        <link rel="shortcut icon" href="{{URL::asset('apple-touch-icon-144.png')}}">

        <title>PITCHIN</title>

        <!-- Bootstrap core CSS -->
        {{HTML::style("css/bootstrap.css")}}
        {{HTML::style("css/wilhelmpaulm.css")}}
        {{HTML::script("js/jquery.js")}}
        {{HTML::script("js/bootstrap.min.js")}}
        <style>
            body {
                padding-top: 60px;
                padding-bottom: 20px;
            }

        </style>

    </head>

    <body>

        <div class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{URL::to("/")}}"><span class="c-teal"> PITCH <i class="glyphicon glyphicon-inbox"></i> IN</span></a>
                </div>
                <div class="navbar-collapse collapse">
                    <!--                    <ul class="nav navbar-nav navbar-right">
                    
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="c-lightblue"><i class="glyphicon glyphicon-log-in"></i> LOGIN</span></a>
                                                <ul class="dropdown-menu well">
                                                    <div class="" >
                                                        <form  class="" action="{{URL::to("login")}}" method="POST">
                                                            <input class="form-control" placeholder="username"  type="text" name="username" value="" /><br>
                                                            
                                                            <input class="form-control" placeholder="password" type="password" name="password" value="" /><br>
                                                            <input class="btn btn-info btn-block " type="submit" value="login" />
                                                        </form>
                                                    </div>
                                                </ul>
                                            </li>
                                        </ul>-->
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><span class="c-amethyst"><i class="glyphicon glyphicon-calendar"></i> EVENTS</span></a></li>
                        <li><a href="#"><span class="c-carrot"><i class="glyphicon glyphicon-comment"></i> ABOUT</span></a></li>
                        <li><a href="#"><span class="c-greensea"><i class="glyphicon glyphicon-bullhorn"></i> TEAM</span></a></li>
                        @if(Auth::user())
                        <li><a href="{{URL::to('logout')}}"><span class="c-belizehole"><i class="glyphicon glyphicon-lock"></i> LOGOUT</span></a></li>
                        @endif
                    </ul>
                </div><!--/.navbar-collapse -->
            </div>
        </div>
        @yield("main")
        <!-- Main jumbotron for a primary marketing message or call to action -->


        <hr>

        <footer>
            <p class="c-lime">&copy; <span class="c-teal"> PITCH <i class="glyphicon glyphicon-inbox"></i> IN</span> (powered by HUCOMIN)</p>
        </footer>
    </div> <!-- /container -->



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

<!--        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="../../dist/js/bootstrap.min.js"></script>-->
</body>
</html>
