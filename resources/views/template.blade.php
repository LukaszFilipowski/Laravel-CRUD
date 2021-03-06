<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>siteTitleToSet</title>
        <link rel="icon" href="{{ url('img') }}/fav.png" type="image/x-icon">

        <!-- Bootstrap -->
        <link href="{{ url('css') }}/bootstrap.min.css" rel="stylesheet">
        <link href="{{ url('ionicons') }}/css/ionicons.min.css" rel="stylesheet">

        <!-- main css -->
        <link href="{{ url('css') }}/style.css" rel="stylesheet">

        <!-- modernizr -->
        <script src="{{ url('js') }}/modernizr.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

<body>

    <!-- Preloader -->
    <div id="preloader">
        <div class="pre-container">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
    </div>
    <!-- end Preloader -->

    <div class="container-fluid">
        <!-- box header -->
        <header class="box-header">
            <div class="box-logo">
                <a href="index.html"><img src="{{ url('img') }}/logo.png" width="80" alt="Logo"></a>
            </div>
            <!-- box-nav -->
            <a class="box-primary-nav-trigger" href="#0">
                <span class="box-menu-text">Menu</span><span class="box-menu-icon"></span>
            </a>
            <!-- box-primary-nav-trigger -->
        </header>
        <!-- end box header -->

        <!-- nav -->
        <nav>
            <ul class="box-primary-nav">
                <li class="box-label">type something here</li>

                <li><a href="{{ route('homepage') }}">Home</a> <i class="ion-ios-circle-filled color"></i></li>
                <li><a href="{{ route('blog') }}">Blog</a></li>
                <li><a href="{{ route('instagram') }}">Instagram</a></li>
                <li><a href="{{ route('artists.index') }}">Artyści</a></li>




                <li class="box-label">Follow me</li>

                <li class="box-social"><a href="#0"><i class="ion-social-facebook"></i></a></li>
                <li class="box-social"><a href="#0"><i class="ion-social-instagram-outline"></i></a></li>
                <li class="box-social"><a href="#0"><i class="ion-social-twitter"></i></a></li>
                <li class="box-social"><a href="#0"><i class="ion-social-dribbble"></i></a></li>
            </ul>
        </nav>
        <!-- end nav -->
    </div>

    <div class="top-bar">
        <h1>pageTitletoSet</h1>
        <p><a href="#">Home</a> / About me</p>
    </div>

    @yield('content')

    <!-- footer -->
    <footer>
        <div class="container-fluid">
            <p class="copyright">Copyright to set</p>
        </div>
    </footer>
    <!-- end footer -->

    <!-- back to top -->
    <a href="#0" class="cd-top"><i class="ion-android-arrow-up"></i></a>
    <!-- end back to top -->

    <script src="{{ url('js') }}/jquery-2.1.1.js"></script>
    <script src="{{ url('js') }}/bootstrap.min.js"></script>
    <script src="{{ url('js') }}/menu.js"></script>
    <script src="{{ url('js') }}/animated-headline.js"></script>
    <script src="{{ url('js') }}/isotope.pkgd.min.js"></script>
    <script src="{{ url('js') }}/custom.js"></script>

</body>

</html>