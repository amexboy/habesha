<!DOCTYPE html>
<html>
<head>
    <title>Meda - @yield('title', 'Home')</title>
    @include('layout.imports')
</head>

<body data-spy="scroll" data-target="#main" data-offset="70">
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#main">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Habesha Cultural Restaurant</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="main">

            <ul class="nav navbar-nav navbar-right">
                <li><a href="#home">Home</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#menu">Menu</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<div class="row" id="home"><!--Content-->
    <hr/>
    <hr/>
    <div id="slider" class="carousel slide center-block" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#cslider" data-slide-to="0" class="active"></li>
            <li data-target="#sliderc" data-slide-to="1"></li>
            <li data-target="#slider" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="{{url('/images/1')}}" alt="">

                <div class="carousel-caption">
                    Habesha
                </div>
            </div>
            @forelse($images as $image)
                <div class="item">
                    <img src="{{url('/images/'.$image->id)}}" alt="{{$image->alt}}">

                    <div class="carousel-caption">
                        {!! $image->description !!}
                    </div>
                </div>
            @empty

                <div class="item">
                    <img src="" alt="No Images">

                    <div class="carousel-caption">
                        No Images
                    </div>
                </div>

            @endforelse
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#slider" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#slider" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<div class="row" id="services">
    <div class="">{{$services}}</div>
</div>
<div class="row" id="menu">
    <a class="left carousel-control" id="prev" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" id="next" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>

    <div class="menu" id="menu_wrapper">
        @forelse($images as $image)
            <div class="item thumbnail">
                <img src="{{url('/images/'.$image->id)}}" class="img-responsive" alt="{{$image->alt}}">

                <div class="caption">
                    <h3>{!! $image->alt !!}</h3>
                    {!! $image->description !!}
                </div>
            </div>
        @empty

            <div class="item">
                <img src="" alt="No Images">

                <div class="carousel-caption">
                    No Images
                </div>
            </div>

        @endforelse
    </div>
</div>

<div class="row" id="contact">
</div>
<script>
    $('#next').click(function () {
        $('#menu_wrapper').animate({scrollLeft: '+=350px'}, 1000);
        return false;
    });
    $('#prev').click(function () {
        $('#menu_wrapper').animate({scrollLeft: '-=350px'}, 1000);
        return false;
    });
    $(document).ready(function () {
        var height = $(window).height();
        $('.row').height(height)
//        $(window).resize(function () {
//            console.log($(this).height());
//            $('.row').height($(this).height() - 50)
//        });
//
        $('.nav a').click(function () {
            var href = $(this).attr('href');
            $('.row').not(href).css({'z-index': 0})
            $(href).css({top: height, left: 0, 'z-index': 10});

            $('.row').not(href).animate({top: 0 - height}, 3000);
            $(href).animate({top: 0, left: 0}, 1500);
            return false;
        });

        $('a[href=#home]').click();
    })
</script>
</body>

</html>
