<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{env('APP_NAME')}} </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">


    <link rel="apple-touch-icon" sizes="150x150" href="{{asset('icon/ms-icon-150x150.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="/{{asset('icon/ms-icon-150x150.png')}}">
    {{--    <link rel="manifest" href="/site.webmanifest">--}}
    {{--    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">--}}
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">


    <meta name="description"
          content="Otimize seus estudos para concursos públicos com o poder do Edital Verticalizado! Acesse nossa ferramenta ClubColonial e maximize suas chances de aprovação.">

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
                    <a href="{{url('/home')}}" class="navbar-brand">{{env('APP_NAME')}}</a>
                </div>
                <div class="navbar-collapse collapse" id="navbar">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a aria-expanded="false" role="button" href="{{url('/home')}}"> Inicio</a>
                        </li>
                        <li>
                            <a aria-expanded="false" role="button" href="{{url('minhascompras')}}">Minhas Compras</a>
                        </li>
                        <li>
                            <a aria-expanded="false" role="button" href="{{url('meusdados')}}"> Meus Dados</a>
                        </li>

                        @if(auth()->user()->code)
                            <li>
                                <a aria-expanded="false" role="button" href="{{url('meus-filiados')}}"> Meus
                                    Filiados</a>
                            </li>
                            <li>
                                <a aria-expanded="false" role="button" href="{{url('extrato')}}">
                                    Extrato</a>
                            </li>

                        @endif


                    </ul>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>

                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out"></i> Sair
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="wrapper wrapper-content">

            <div class="row  border-bottom white-bg dashboard-header">

                <div class="col-sm-3">
                    <h2>Bem-vindo, {{auth()->user()->name}}</h2>


                </div>


            </div>


            @yield('content')
        </div>
        <div class="footer">
            <div class="pull-right">

            </div>
            <div>
                <strong>Copyright</strong> CodeGus &copy; 2024
            </div>
        </div>

    </div>
</div>


<!-- Mainly scripts -->
<script src="{{asset('js/jquery-2.1.1.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{asset('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

<!-- Custom and plugin javascript -->
<script src="{{asset('js/inspinia.js')}}"></script>
<script src="{{asset('js/plugins/pace/pace.min.js')}}"></script>


@if(auth()->user()->is_admin !=1)

    <script src="//code.jivosite.com/widget/7IlpzCWHxS" async></script>

@endif
<script async src="https://www.googletagmanager.com/gtag/js?id=G-QQGRZ34LGM"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'G-QQGRZ34LGM');
</script>

@yield('js')

</body>

</html>
