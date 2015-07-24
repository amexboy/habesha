<!DOCTYPE html>
<html>
<head>
    <script src="scripts/jquery-2.1.1.min.js"></script>
    <script src="scripts/jquery-ui.min.js"></script>
    <script src="scripts/bootstrap.min.js"></script>
    <script src="scripts/lean-slider.js"></script>
    <link href="styles/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="styles/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
    <link href="styles/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="styles/lean-slider.css" rel="stylesheet" type="text/css"/>
    <link href="styles/sample-styles.css" rel="stylesheet" type="text/css"/>
</head>

<body class="container"><!--400px-->
<header class="row"><!--Header-->
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-2">
            <img class="img-responsive center-block" src="images/placeholder.png"/>
        </div>
        <div class="col-md-8">
            <h1>Meda Sports</h1>
            <h3>Global Sprots News in Amharic</h3>
        </div>
        <div></div>
    </div>
    <hr/>
    <nav class="row">
        <ul class="pull-left nav nav-pills">
            <li>&nbsp;&nbsp;&nbsp;</li>
            <li><a href="#">Home<span class="sr-only">(current)</span></a></li>
            <li class="active"><a href="#">News</a></li>
            <li><a href="#">Biographies</a></li>
            <li><a href="#">Time Line</a></li>
            <li><a href="#">Shcedules</a></li>
            <li><a href="#">Scores</a></li>
            <li><a href="#">Archive</a></li>
            <li><a href="#">About Us</a></li>
        </ul>
        <ul class="pull-right nav nav-pills">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                role="button" aria-expanded="false">Amanuel Nega
                <span class="fa fa-sliders"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Change Password</a></li>
                    <li><a href="#">Edit Info</a></li>
                    <li class="divider"></li>
                    <li><a href="#" class="">Logout</a></li>
                </ul>
            </li>
            <li>&nbsp;&nbsp;&nbsp;&nbsp;</li>
        </ul>
    </nav>
</header>
<!--/Header-->

<div class="row"><!--Content-->
    <hr/>
    <div class="col-md-8">
        <div class="slider-wrapper col-md-12" id="">
            <div id="slider">
                <div class="slide1">
                    <a href="#">
                        <img  class="img-responsive" width="100%" height="100%" src="images/placeholder.png"/>
                        <div class="title">
                            <h1 >Manchester 4 - 2 Arsenal</h1>
                            <hr/>
                        </div>

                        <p class="disc ">
                            Manchester won arsenal by 3 goals difference on last thursday's game.
                            Some say Man United won because ... <a href="#">read more</a>
                        </p>
                    </a>
                </div>
                <!-- <div class="slide1">
                    <a href="#">
                        <img class="img-responsive" width="100%" height="100%" src="images/placeholder.png"/>
                        <div class="title">
                            <h1>Roony back to the field</h1>
                            <hr/>
                        </div>

                        <p class="disc ">After days of struggle, Roony finall recovered from his injuries
                        and will be back to the field on Sunday's game. He had... <a href="#">read more</a></p>

                    </a>
                </div> -->
            </div>
            <div id="slider-direction-nav" class="slider-direction-nav"></div>
            <div id="slider-control-nav" class="slider-control-nav"></div>
        </div>
        <div class="">
            <div class="col-md-12">
            <hr/></div>
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Events</h3>
                    </div>
                    <div class="panel-body">
                        <ul>
                            <li>Game Tomorow</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Events</h3>
                    </div>
                    <div class="panel-body">
                        <ul>
                            <li>Game Tomorow</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Events</h3>
                    </div>
                    <div class="panel-body">
                        <ul>
                            <li>Game Tomorow</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Events</h3>
                    </div>
                    <div class="panel-body">
                        <ul>
                            <li>Game Tomorow</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Ranks</h3>
            </div>
            <div class="panel-body">
                <ul>
                    <li>FA: 18 pt 3</li>
                    <li>CL: 18 pt 3</li>
                    <li>PL: 18 pt 3</li>
                </ul>
            </div>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Events</h3>
            </div>
            <div class="panel-body">
                <ul>
                    <li>Game Tomorow</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--/Content-->

<div class="row"><!--Content-->
    <div class="">Some footer section</div>
</div>
<!--/Content-->

<script type="text/javascript">
    $(document).ready(function () {
        var slider = $('#slider').leanSlider({
            directionNav: '#slider-direction-nav',
            controlNav: '#slider-control-nav',
            pauseTime: 7000
        });
    });
</script>
</body>

</html>
