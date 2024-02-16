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
@include('site.top')


<section id="features" class="container services">
    <div class="row">
        <div class="col-sm-3">
            <h2>O QUE É UM EDITAL VERTICALIZADO</h2>
            <p class="text-justify">
                É a organização e estruturação de um edital oficial de um concurso público. É a apresentação dos
                conteúdos programáticos de maneira vertical e simplificada, dividindo-os em tópicos e subtópicos. Esse
                formato facilita a compreensão e o acompanhamento do candidato auxiliando na criação de um plano de
                estudos eficiente e na identificação dos assuntos mais importantes para a prova.
            </p>

        </div>
        <div class="col-sm-3">
            <h2>O QUE VERTICALIZEJA OFERECE AO USUÁRIO</h2>
            <p class="text-justify">Nós organizamos e facilitamos o estudo do conteúdo programático, por meio do edital
                verticalizado, onde o
                usuário consegue avaliar o seu desempenho possibilitando que ele identifique a quantidade de questões
                feitas por conteúdo, permitindo que ele anote os acertos e erros.
            {{-- e ao fim saber o seu percentual de--}}
            {{--                acertos. </p>--}}

        </div>
        <div class="col-sm-3">
            <h2>POR QUE O VERTICALIZAJA É IMPORTANTE </h2>
            <p class="text-justify">
                Porque sem organização, o candidato não sabe nem por onde começar os seus estudos, o que diminui seu
                desempenho e consequentemente o seu resultado. É a ferramenta que ao mesmo tempo organiza o seu conteúdo
                programático e dá ao candidato um norte, dá parâmetros onde ele consegue visualizar onde está, como está
                em cada assunto, possibilitando a ele se sentir seguro naquilo que ele está acertando, e estudar mais
                nos temas que ainda precisa melhorar.
            </p>

        </div>
        <div class="col-sm-3">
            <h2>BENEFÍCIOS DE TER O SEU VERTICALIZEJA</h2>
            <p class="text-justify">O candidato que planeja seus estudos, que tem uma visão clara dos assuntos que
                precisa dominar, reduz a sua ansiedade, ganha confiança e tranquilidade, sabendo que está se preparando
                de forma eficaz para o concurso.</p>

        </div>
    </div>
</section>


<section class="features">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>Vantagens de utilizar o nosso edital verticalizado</h1>
                {{--                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. </p>--}}
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 col-lg-offset-1 features-text">
                <small>VERTICALIZEJA</small>
                <h2>
                    Organização e planejamento </h2>
                <i class="fa fa-bar-chart big-icon pull-right"></i>
                <p class="text-justify"> Com uma compreensão clara dos conteúdos programáticos, torna-se mais simples
                    criar um plano de
                    estudos eficaz e bem equilibrado.</p>
            </div>
            <div class="col-lg-5 features-text">
                <small>VERTICALIZEJA</small>
                <h2>Acompanhamento do progresso </h2>
                <i class="fa fa-calendar big-icon pull-right"></i>
                <p class="text-justify">Nossa ferramenta oferece uma estrutura que inclui campos como "estudado",
                    "revisado", "número de
                    questões feitas", "acertos", "erros". Essa abordagem do edital verticalizado facilita o
                    controle do progresso nos estudos, permitindo que o candidato acompanhe seu desempenho e identifique
                    áreas que necessitam de mais atenção.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 col-lg-offset-1 features-text">
                <small>VERTICALIZEJA</small>
                <h2> Foco nos temas relevantes </h2>
                <i class="fa fa-check big-icon pull-right"></i>

                <p class="text-justify"> O edital verticalizado proporciona ao candidato uma identificação organizada
                    dos tópicos mais
                    importantes, permitindo que ele direcione seus estudos de forma estratégica.</p>
            </div>
            <div class="col-lg-5 features-text">
                <small>VERTICALIZEJA</small>
                <h2>
                    Revisão Eficiente </h2>
                <i class="fa fa-book big-icon pull-right"></i>
                <p class="text-justify"> As revisões são essenciais para consolidar o conhecimento e garantir preparação
                    para a prova. Com o edital verticalizado, você pode identificar facilmente o que já estudou e
                    revisou. </p>
            </div>
        </div>
    </div>

</section>
<section id="pricing" class="pricing">
    <div class="container">
        <div class="row m-b-lg">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>Nossos Editais</h1>
                {{--                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>--}}
            </div>
        </div>
        <div class="row">
            @forelse($editals as $edital)

                <div class="ibox">
                    <div class="ibox-title">{{$edital->orgao->name}} - {{$edital->ano}}</div>
                    <div class="ibox-content">
                        <div class="row">


                            @forelse($edital->cargos as $cargo)
                                <div class="col-md-3">
                                    <div class="ibox">
                                        <div style="height: 500px" class="ibox-content product-box">

                                            <div
                                                style="background-image: url('{{ asset('concurso/' . $edital->img) }}'); background-size: cover; background-position: center center; width: 100%; height: 300px;"
                                                class="product-imitation">
                                            </div>
                                            <div class="product-desc">
                                <span class="product-price">
                                    R$9.70
                                </span>
                                                <small class="text-muted">{{$edital->orgao->name}}</small>
                                                <a href="#" class="product-name"> {{$cargo->name}}</a>


                                                <div class="small m-t-xs">
                                                    {{--                                                Many desktop publishing packages and web page editors now.--}}
                                                </div>
                                                <div class="m-t text-righ">


                                                </div>
                                            </div>
                                        </div>
                                        <div class="ibox-footer product-box">


                                            <a href="{{ url('comprar/'.$edital->id.'/cargo/'.$cargo->id) }}"
                                               class="btn btn-block btn-outline btn-primary">
                                                Comprar <i class="fa fa-long-arrow-right"></i>
                                            </a>
                                            <a href="{{ url('detalhes/'.$edital->id.'/cargo/'.$cargo->id) }}"
                                               class="btn btn-block btn-outline btn-warning">
                                                Detalhes <i class="fa fa-long-arrow-right"></i>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse


                        </div>

                    </div>
                </div>
            @empty
            @endforelse

        </div>
        <div class="row m-t-lg">
            <div class="col-lg-8 col-lg-offset-2 text-center m-t-lg">
                <p>*Não entregamos videoaula, resumos, PDF,s ou qualquer outro conteúdo de estudo.</p>
            </div>
        </div>
    </div>

</section>

<section id="contact" class="gray-section contact">
    <div class="container">
        <div class="row m-b-lg">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>Contate-nos</h1>
                {{--                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>--}}
            </div>
        </div>
        <div class="row m-b-lg">
            <div class="col-lg-3 col-lg-offset-3">
                <address>
                    <strong><span class="navy">VerticalizeJA</span></strong><br/>
                    {{--                    795 Folsom Ave, Suite 600<br/>--}}
                    {{--                    San Francisco, CA 94107<br/>--}}
                    {{--                    <abbr title="Phone">P:</abbr> (123) 456-7890--}}
                </address>
            </div>
            <div class="col-lg-4">
                <p class="text-color">
                    Se tiver alguma dúvida entre contato conosco pelo email
                    suporte@verticalizeja.com
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <a href="mailto:suport@verticalizeja.com" class="btn btn-primary">Nosso Email</a>
                {{--                <p class="m-t-sm">--}}
                {{--                    Or follow us on social platform--}}
                {{--                </p>--}}
                {{--                <ul class="list-inline social-icon">--}}
                {{--                    <li><a href="#"><i class="fa fa-twitter"></i></a>--}}
                {{--                    </li>--}}
                {{--                    <li><a href="#"><i class="fa fa-facebook"></i></a>--}}
                {{--                    </li>--}}
                {{--                    <li><a href="#"><i class="fa fa-linkedin"></i></a>--}}
                {{--                    </li>--}}
                {{--                </ul>--}}
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center m-t-lg m-b-lg">
                <p><strong>&copy; 2024 VerticalizeJa</strong><br/></p>
            </div>
        </div>
    </div>
</section>

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
