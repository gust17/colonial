<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{env('APP_NAME')}} | Dashboard v.4</title>

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

</head>

<body class="top-navigation">

<div id="wrapper">
    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom white-bg">
            <nav class="navbar navbar-static-top" role="navigation">
                <div class="navbar-header">
                    <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse"
                            class="navbar-toggle collapsed" type="button">
                        <i class="fa fa-reorder"></i>
                    </button>
                    <a href="#" class="navbar-brand">{{env('APP_NAME')}}</a>
                </div>
                <div class="navbar-collapse collapse" id="navbar">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a aria-expanded="false" role="button" href="layouts.html"> Back to main Layout page</a>
                        </li>
                        <li class="dropdown">
                            <a aria-expanded="false" role="button" href="#" class="dropdown-toggle"
                               data-toggle="dropdown"> Menu item <span class="caret"></span></a>
                            <ul role="menu" class="dropdown-menu">
                                <li><a href="">Menu item</a></li>
                                <li><a href="">Menu item</a></li>
                                <li><a href="">Menu item</a></li>
                                <li><a href="">Menu item</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a aria-expanded="false" role="button" href="#" class="dropdown-toggle"
                               data-toggle="dropdown"> Menu item <span class="caret"></span></a>
                            <ul role="menu" class="dropdown-menu">
                                <li><a href="">Menu item</a></li>
                                <li><a href="">Menu item</a></li>
                                <li><a href="">Menu item</a></li>
                                <li><a href="">Menu item</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a aria-expanded="false" role="button" href="#" class="dropdown-toggle"
                               data-toggle="dropdown"> Menu item <span class="caret"></span></a>
                            <ul role="menu" class="dropdown-menu">
                                <li><a href="">Menu item</a></li>
                                <li><a href="">Menu item</a></li>
                                <li><a href="">Menu item</a></li>
                                <li><a href="">Menu item</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a aria-expanded="false" role="button" href="#" class="dropdown-toggle"
                               data-toggle="dropdown"> Menu item <span class="caret"></span></a>
                            <ul role="menu" class="dropdown-menu">
                                <li><a href="">Menu item</a></li>
                                <li><a href="">Menu item</a></li>
                                <li><a href="">Menu item</a></li>
                                <li><a href="">Menu item</a></li>
                            </ul>
                        </li>

                    </ul>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <a href="login.html">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="wrapper wrapper-content">

        @yield('content')
        </div>
        <div class="footer">
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2024
            </div>
        </div>

    </div>
</div>


<!-- Mainly scripts -->
<script src="js/jquery-2.1.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>


</body>

</html>
