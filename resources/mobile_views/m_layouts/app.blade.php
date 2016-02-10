<!DOCTYPE HTML>
<html class="no-js">
<head>
    <!-- Basic Page Needs
      ================================================== -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Халява -  @yield('title')</title>
    <meta property="og:title" content="@yield('og_title')" />
    <meta property="og:description" content="@yield('og_description')" />
    <meta property="og:image" content="@yield('og_image')" />
    <!-- Mobile Specific Metas
      ================================================== -->
    <meta http-equiv="cleartype" content="on">
    <meta name="MobileOptimized" content="320">
    <meta name="HandheldFriendly" content="True">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <!-- CSS
      ================================================== -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="/css/all.css" rel="stylesheet" type="text/css">
    <link href="/css/fav.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/css/board.css"/>
    <link rel="stylesheet" href="/css/jivo.css"/>
    <link href="/css/slideout.css" rel="stylesheet" type="text/css">
    <link href="/css/mobile_style.css" rel="stylesheet" type="text/css">
    <link href="/css/search.css" rel="stylesheet" type="text/css">
    <!--[if lte IE 9]>
    <link rel="stylesheet" type="text/css" href="css/ie.css" media="screen"/>
    <![endif]-->

    <!--GA-->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-65336930-1', 'auto');
        ga('send', 'pageview');

    </script>
    <!--End GA-->

</head>
<body class="home">
<!--[if lt IE 7]>
<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser
    today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better
    experience this site.</p>
<![endif]-->

<!--SliderLeftSide-->
<nav id="menu">
    @include('layoutBlocks.left_aside')
</nav>

<main id="panel">
    <div class="body">
    <!-- Start Site Header -->
    <header class="site-header">
        <div>
            <nav role="navigation" class="navbar navbar-default">
                <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <h6>
                        <a href="/" class="navbar-brand" style="font-size: 16px; margin-left: 16px;"><img class="logo" src="/img/logo/m_logo.png">ХаЛяВа-
                            @if(isset($_GET['city_id']) && $_GET['city_id'] != 'null' && isset($ad))
                                "{{ $ad->city->city_name }}"
                            @else
                                "hlv24.ru"
                            @endif </a>
                        </h6>
                        <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <button type="button" class="navbar-toggle" id="slidemenu" style="position: absolute; left: 0; top: 15px;"><i class="fa fa-chevron-right"></i> </button>
                    </div>
                <!-- Collection of nav links and other content for toggling -->
                <div id="navbarCollapse" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav" id="navigate">
                        @foreach($items as $item)
                            @if(Auth::guest() && $item->link == '/')

                                <li><a href="/auth/login"> {{$item->name}}</a></li>

                            @else

                                <li><a href="{{ $item->link }}"> {{$item->name}}</a></li>

                            @endif

                        @endforeach
                        <li><a href="/services">Услуги</a></li>
                        <li><a href="/rules">Правила</a></li>
                        <li><a href="/about">О проекте</a></li>
                       {{-- <li><a href="/faq">FAQ</a></li>--}}
                        <li><a href="/contacts  ">Контакты</a></li>
                        {{--<li><a href="javascript:jivo_api.open();">Cвязаться</a></li>--}}

                            @if(\Auth::check())
                        <li><a href="/auth/logout">Выйти</a></li>
                            @endif
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!-- End Site Header -->
    @if(Request::is('/'))
        @include('slider.slider')
    @else
        @include('layoutBlocks.pageHead')
    @endif

    <div class="main" role="main">

        <div id="content" class="content full">
            <div class="well">
                {!! Form::open(['route'=>['welcome'] ,'method' => 'GET']) !!}
                {!! Form::text('search', '', ['class' => 'form-control input-sm', 'maxlength'=>'64','placeholder'=>'Поиск по объявлениям'] ) !!}
                <button type="submit" class="btn btn-primary btn-sm" id="bs" style="position: inherit">Поиск</button>
                {!! Form::close() !!}
            </div>

            <div class="container">
                <div class="row">
                    <!-- Start Sidebar -->
                    @include('layoutBlocks.aside')

                    @yield('content')

                </div>

            </div>
        </div>
    </div>


    <!-- Banner -->
    @include('layoutBlocks.footer')
    <a id="back-to-top"><i class="fa fa-angle-double-up"></i></a>

    </div>
</main>
    <script src="{{ asset('js/components.js') }}"></script>
    <script src="{{ asset('js/shop.js') }}"></script>

<script src="//code.jquery.com/jquery-2.1.3.min.js"></script>


<script src="/js/handlebars.min.js"></script>

<script src="/js/app.js"></script>
<!-- Jquery Library Call -->
<script src="/plugins/prettyphoto/js/prettyPhoto.js"></script>
<!-- PrettyPhoto Plugin -->
<script src="/plugins/owl-carousel/js/owl.carousel.min.js"></script>
<!-- Owl Carousel -->
<script src="/plugins/flexslider/js/jquery.flexslider.js"></script>
<!-- FlexSlider -->
<script src="/js/helper-plugins.js"></script>
<!-- Plugins -->
<script src="/js/bootstrap.js"></script>
<!-- UI -->
<script src="/js/waypoints.js"></script>
<!-- Waypoints -->
<script src="/js/init.js"></script>

<script src="/upload/js/jquery.knob.js"></script>

<script src="/upload/js/jquery.ui.widget.js"></script>
<script src="/upload/js/jquery.iframe-transport.js"></script>
<script src="/upload/js/jquery.fileupload.js"></script>


<!-- main JS file -->
<script src="/upload/js/script.js"></script>
<script src="/js/ads.js"></script>
<script src="/js/nottifications.js"></script>
<script src="/zaweb/js/brain-socket.min.js"></script>
<script src="/zaweb/js/chat/chat.js"></script>
<script src="/zaweb/js/chat/resources/messages.js"></script>
<script src="/zaweb/js/chat/controllers/messages.js"></script>


    <!-- BEGIN JIVOSITE CODE {literal} -->
    {{--<script type='text/javascript'>
        (function(){ var widget_id = 'Ha16wHx5OA';
            var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);})();
    </script>--}}
    <!--{/literal} END JIVOSITE CODE -->

<!--Slideout-->
<script src="/js/slideout.min.js"></script>

<script>
    var slideout = new Slideout({
        'panel': document.getElementById('panel'),
        'menu': document.getElementById('menu'),
        'padding': 256,
        'tolerance': 70,
        'touch': false
    });

    // Then, use the slideout `open` and `close` events
    slideout.on('open', slideout.enableTouch);
    slideout.on('close', slideout.disableTouch);

    document.querySelector('#slidemenu').addEventListener('click', function() {
        slideout.toggle();
    });

</script>



<!-- All Scripts -->
<!--[if lte IE 9]>
<script src="/js/script_ie.js"></script><![endif]-->
<script type="text/javascript" charset="utf-8">
    $(document).ready(function () {
        $("a[rel^='prettyPhoto']").prettyPhoto({});


    });
</script>
    <script>
        $(document).ready(function() {
            // Configure/customize these variables.
            var showChar = 300;  // How many characters are shown by default
            var ellipsestext = "...";
            var moretext = "Читать далее >>>";
            var lesstext = "Свернуть <<<";


            $('.more').each(function() {
                var content = $(this).html();

                if(content.length > showChar) {

                    var c = content.substr(0, showChar);
                    var h = content.substr(showChar, content.length - showChar);

                    var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

                    $(this).html(html);
                }

            });

            $(".morelink").click(function(){
                if($(this).hasClass("less")) {
                    $(this).removeClass("less");
                    $(this).html(moretext);
                } else {
                    $(this).addClass("less");
                    $(this).html(lesstext);
                }
                $(this).parent().prev().toggle();
                $(this).prev().toggle();
                return false;
            });
        });
    </script>

@yield('js')
</main>
</body>
</html>
