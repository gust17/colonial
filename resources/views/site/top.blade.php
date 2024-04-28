<div class="navbar-wrapper">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
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
<div id="inSlider" class="carousel carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#inSlider" data-slide-to="0" class="active"></li>
        <li data-target="#inSlider" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <div class="container">
                <div class="carousel-caption">
                    <h1>CLUBCOLONIAL <br> </h1>
{{--                    <h1>CLUBCOLONIAL <br> A FERRAMENTA QUE VAI REVOLUCIONAR <br> A SUA FORMA DE ESTUDAR</h1>--}}

                    {{--                    <p>Lorem Ipsum is simply dummy text of the printing.</p>--}}
                    <p>
                        <a class="btn btn-lg btn-primary" href="{{route('register')}}" role="button">Cadastre-se</a>
                        <a class="btn btn-lg btn-success" href="{{route('login')}}" role="button">Login</a>
                    </p>
                </div>
                <div class="carousel-image wow zoomIn">
                    <img src="img/landing/laptop.png" alt="laptop"/>
                </div>
            </div>
            <!-- Set background for slide in css -->
            <div class="header-back one">

            </div>

        </div>
        {{--        <div class="item">--}}
        {{--            <div class="container">--}}
        {{--                <div class="carousel-caption blank">--}}
        {{--                    <h1>We create meaningful <br/> interfaces that inspire.</h1>--}}
        {{--                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>--}}
        {{--                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--            <!-- Set background for slide in css -->--}}
        {{--            <div class="header-back two"></div>--}}
        {{--        </div>--}}
    </div>

</div>
