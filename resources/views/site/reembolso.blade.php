<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>VerticalizeJa</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Animation CSS -->
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <style>
        .landing-page .header-back.one {
            background: url('{{url('sitebase/header_one.jpg')}}') 50% 0 no-repeat;
        }

        .landing-page .header-back.two {
            background: url('../img/landing/header_two.jpg') 50% 0 no-repeat;
        }
    </style>
</head>
<body id="page-top" class="landing-page">
<div class="navbar-wrapper">
    <nav style="background-color: #c0c6d3" class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/')}}">{{env('APP_NAME')}}</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="page-scroll" href="{{url('/')}}">Inicio</a></li>
                    <li><a class="page-scroll" href="{{url('privacidade')}}">Politíca de Privacidade</a></li>
                    <li><a class="page-scroll" href="{{url('reembolso')}}">Politica de Reembolso</a></li>

                </ul>
            </div>
        </div>
    </nav>
</div>


<section id="features" class="container services">
    <div class="row">

        <br>
        <h2>Política de Devolução e Reembolsos</h2>
        <div class="col-sm-12">
            <h2>Devolução e Reembolsos</h2>
            <p class="text-justify">Se você solicitar o cancelamento de sua compra do edital verticalizado dentro do
                prazo de 7 (sete) dias e antes de fazer o download do arquivo, você receberá o reembolso integral do
                valor pago.</p>
            <p class="text-justify"> No entanto, se você já tiver feito o download do arquivo, não será possível
                cancelar a compra e não haverá restituição de valores, pois você já teve acesso ao material.</p>
            <p class="text-justify"> É importante observar que o período de 7 dias começa a contar a partir do momento
                em que a compra do material é efetuada e possui acesso ao serviço/material.
            </p>

        </div>



    </div>
</section>


<section class="features">
    <div class="container">

    </div>

</section>


@include('site.footer')

<!-- Mainly scripts -->
<script src="{{asset('js/jquery-2.1.1.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{asset('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

<!-- Custom and plugin javascript -->
<script src="{{asset('js/inspinia.js')}}"></script>
<script src="{{asset('js/plugins/pace/pace.min.js')}}"></script>
<script src="{{asset('js/plugins/wow/wow.min.js')}}"></script>


<script>

    $(document).ready(function () {

        $('body').scrollspy({
            target: '.navbar-fixed-top',
            offset: 80
        });

        // Page scrolling feature
        $('a.page-scroll').bind('click', function (event) {
            var link = $(this);
            $('html, body').stop().animate({
                scrollTop: $(link.attr('href')).offset().top - 50
            }, 500);
            event.preventDefault();
            $("#navbar").collapse('hide');
        });
    });

    var cbpAnimatedHeader = (function () {
        var docElem = document.documentElement,
            header = document.querySelector('.navbar-default'),
            didScroll = false,
            changeHeaderOn = 200;

        function init() {
            window.addEventListener('scroll', function (event) {
                if (!didScroll) {
                    didScroll = true;
                    setTimeout(scrollPage, 250);
                }
            }, false);
        }

        function scrollPage() {
            var sy = scrollY();
            if (sy >= changeHeaderOn) {
                $(header).addClass('navbar-scroll')
            } else {
                $(header).removeClass('navbar-scroll')
            }
            didScroll = false;
        }

        function scrollY() {
            return window.pageYOffset || docElem.scrollTop;
        }

        init();

    })();

    // Activate WOW.js plugin for animation on scrol
    new WOW().init();

</script>
<script src="//code.jivosite.com/widget/7IlpzCWHxS" async></script>

</body>
</html>
