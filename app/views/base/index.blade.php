@extends("layouts.base")
@section("main")
<div class="jumbotron">
    <div class="container well">
        <h1 class="text-center"><span class="c-teal"> PITCH <i class="glyphicon glyphicon-inbox"></i> IN</span></h1>
        <p class="c-lime text-center">A <strong>social centric event planning application </strong> designed to make small to medium scale gatherings more collaborative</p>

    </div>
</div>

<div class="container">
    <!-- Example row of columns -->
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-info">
                <div class="panel-body">

                    <div id="signuphead" class="text-center c-lightblue fs50">
                        <i class="glyphicon glyphicon-pencil"></i>
                        <p>SIGN UP</p>
                    </div>


                    <div id="signupbody">
                        <form  class="" action="{{URL::to("sign-up")}}" enctype="multipart/form-data"  method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group c-lightblue ">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control c-lightblue " id="email" name="email"  value="">
                                    </div>
                                    <div class="form-group c-lightblue ">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control c-lightblue " id="password" name="password"  value="">
                                    </div>
                                    <div class="form-group c-lightblue">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" class="form-control c-lightblue" id="last_name" name="last_name" placeholder="Dela Cruz" value="">
                                    </div>
                                    <div class="form-group c-lightblue">
                                        <label for="first_name">First Name</label>
                                        <input type="text" class="form-control c-lightblue" id="first_name" name="first_name" placeholder="Juanito" value="">
                                    </div>
                                    <div class="form-group c-lightblue ">
                                        <label for="gender">Gender</label>
                                        <select class="form-control c-lightblue " id="gender" name="gender">
                                            <option>male</option>
                                            <option>female</option>
                                        </select>
                                    </div>
                                    <div class="form-group c-lightblue ">
                                        <label for="birthdate">Birthdate</label>
                                        <input type="date" class="form-control c-lightblue " id="birthdate" name="birthdate"  value="">
                                    </div>
                                    <div class="form-group c-lightblue ">
                                        <label for="picture">Picture</label>
                                        <input type="file" class="form-control c-lightblue " id="picture" name="picture"  value="">
                                        <br>

                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group c-lightblue ">
                                        <label for="description">Description</label>
                                        <textarea name="description" class="form-control c-lightblue " id="description"  rows="2" cols="20"></textarea>
                                    </div>
                                    <div class="form-group c-lightblue ">
                                        <label for="mobile">Mobile</label>
                                        <input type="text" class="form-control c-lightblue " id="mobile" name="mobile"  value="">
                                    </div>
                                    <div class="form-group c-lightblue ">
                                        <label for="address">Address</label>
                                        <textarea name="address" class="form-control c-lightblue " id="address"  rows="2" cols="20"></textarea>
                                    </div>
                                    <div class="form-group c-lightblue ">
                                        <label for="x">X Coordinates</label>
                                        <input type="text" class="form-control c-lightblue " id="x" name="x"  value="">
                                    </div>
                                    <div class="form-group c-lightblue ">
                                        <label for="y">Y Coordinates</label>
                                        <input type="text" class="form-control c-lightblue " id="y" name="y"  value="">
                                        <br>

                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <button id="geoLoc" class="btn btn-default btn-block">Auto GeoLoc</button>
                                </div>
                                <div class="col-md-6">
                                    <input class="btn btn-info btn-block" type="submit" value="Save Changes" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-success">
                <div class="panel-body">
                    <div id="loginhead" class="text-center c-lime fs50">
                        <i class="glyphicon glyphicon-user"></i>
                        <p>LOG IN</p>
                    </div>
                    <div id="loginbody">
                        <form  class="" action="{{URL::to("login")}}" method="POST">
                            <div class="row ">
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="input-group">
                                        <span class="input-group-addon  c-lime"><i class="glyphicon glyphicon-envelope"></i></span>
                                        <input class="form-control  c-lime" placeholder="username"  type="text" name="username" value="" /><br>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="input-group">
                                        <span class="input-group-addon  c-lime"><i class="glyphicon glyphicon-lock "></i></span>
                                        <input class="form-control  c-lime" placeholder="password" type="password" name="password" value="" /><br>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <input class="btn btn-success btn-block " type="submit" value="login" />
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <style>
        #signuphead, #loginhead :hover{
            cursor: pointer;
        }

    </style>
    <script>
        $("#signupbody").hide();

        $("#signuphead").on("click", function() {
            $("#signupbody").toggle("slow")
        });
        $("#loginbody").hide();
        $("#loginhead").on("click", function() {
            $("#loginbody").toggle("slow");
        });

        $("#geoLoc").on("click", function() {
            getLocation();
            return false;
        });

        function getLocation()
        {
            if (navigator.geolocation)
            {
                navigator.geolocation.getCurrentPosition(showPosition);
            }
            else {
                alert("Geolocation is not supported here");
            }
        }
        function showPosition(position)
        {
            $("#x").val(position.coords.latitude);
            $("#y").val(position.coords.longitude);

        }


    </script>
    @stop