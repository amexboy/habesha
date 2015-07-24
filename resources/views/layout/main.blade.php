<!DOCTYPE html>
<html>
<head>
    <title>Meda - @yield('title', 'Home')</title>
    @include('layout.imports')
</head>

<body class="container"><!--400px-->
<header class="row"><!--Header-->
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-2">
            <img class="img-responsive center-block" src="{{url('/')}}/images/placeholder.png"/>
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
        @if(Auth::check())
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
        @endif
    </nav>
</header>
<!--/Header-->

<div class="row"><!--Content-->
    <hr/>
    <div class='col-md-8'>
        @section('content')
            {{-- If you want to add more to the default content area maybe the sidebar--}}
        @show
    </div>
    <div class='col-md-4'>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">@yield('side1-title')</h3>
            </div>
            <div class="panel-body">
                @yield('side1-body')
            </div>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">@yield('side2-title')</h3>
            </div>
            <div class="panel-body">
                @yield('side1-body')
            </div>
        </div>
    </div>
</div>

</div>
<!--/Content-->

<div class="row"><!--Content-->
    <div class="">Some footer section</div>
</div>
<!--/Content-->

</body>

</html>
