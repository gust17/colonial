@extends('site.padrao')
@section('title','ClubColonial')
@section('head')

    <meta name="description"
          content="Otimize seus estudos para concursos públicos com o poder do Edital Verticalizado! Acesse nossa ferramenta ClubColonial e maximize suas chances de aprovação.">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{url('/')}}">
    <style>
        label{
            color: white;
        }
    </style>
@endsection

@section('content')
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
{{--                        <li><a class="page-scroll" href="{{url('privacidade')}}">Politíca de Privacidade</a></li>--}}
{{--                        <li><a class="page-scroll" href="{{url('reembolso')}}">Politica de Reembolso</a></li>--}}

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
                        <h1>{{$usuario->name}} <br> PARCEIRO DA ClubColonial <br>A FERRAMENTA QUE VAI REVOLUCIONAR <br> A SUA FORMA DE ESTUDAR</h1>

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

    <section id="features" class="container services">
        <div class="row">
            <div class="col-sm-3">
                <h2>O QUE É UM EDITAL VERTICALIZADO</h2>
                <p class="text-justify">
                    É a organização e estruturação de um edital oficial de um concurso público. É a apresentação dos
                    conteúdos programáticos de maneira vertical e simplificada, dividindo-os em tópicos e subtópicos.
                    Esse
                    formato facilita a compreensão e o acompanhamento do candidato auxiliando na criação de um plano de
                    estudos eficiente e na identificação dos assuntos mais importantes para a prova.
                </p>

            </div>
            <div class="col-sm-3">
                <h2>O QUE ClubColonial OFERECE AO USUÁRIO</h2>
                <p class="text-justify">Nós organizamos e facilitamos o estudo do conteúdo programático, por meio do
                    edital
                    verticalizado, onde o
                    usuário consegue avaliar o seu desempenho possibilitando que ele identifique a quantidade de
                    questões
                    feitas por conteúdo, permitindo que ele anote os acertos e erros.
                {{-- e ao fim saber o seu percentual de--}}
                {{--                acertos. </p>--}}

            </div>
            <div class="col-sm-3">
                <h2>POR QUE O VERTICALIZAJA É IMPORTANTE </h2>
                <p class="text-justify">
                    Porque sem organização, o candidato não sabe nem por onde começar os seus estudos, o que diminui seu
                    desempenho e consequentemente o seu resultado. É a ferramenta que ao mesmo tempo organiza o seu
                    conteúdo
                    programático e dá ao candidato um norte, dá parâmetros onde ele consegue visualizar onde está, como
                    está
                    em cada assunto, possibilitando a ele se sentir seguro naquilo que ele está acertando, e estudar
                    mais
                    nos temas que ainda precisa melhorar.
                </p>

            </div>
            <div class="col-sm-3">
                <h2>BENEFÍCIOS DE TER O SEU ClubColonial</h2>
                <p class="text-justify">O candidato que planeja seus estudos, que tem uma visão clara dos assuntos que
                    precisa dominar, reduz a sua ansiedade, ganha confiança e tranquilidade, sabendo que está se
                    preparando
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
                    <small>ClubColonial</small>
                    <h2>
                        Organização e planejamento </h2>
                    <i class="fa fa-bar-chart big-icon pull-right"></i>
                    <p class="text-justify"> Com uma compreensão clara dos conteúdos programáticos, torna-se mais
                        simples
                        criar um plano de
                        estudos eficaz e bem equilibrado.</p>
                </div>
                <div class="col-lg-5 features-text">
                    <small>ClubColonial</small>
                    <h2>Acompanhamento do progresso </h2>
                    <i class="fa fa-calendar big-icon pull-right"></i>
                    <p class="text-justify">Nossa ferramenta oferece uma estrutura que inclui campos como "estudado",
                        "revisado", "número de
                        questões feitas", "acertos", "erros". Essa abordagem do edital verticalizado facilita o
                        controle do progresso nos estudos, permitindo que o candidato acompanhe seu desempenho e
                        identifique
                        áreas que necessitam de mais atenção.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 col-lg-offset-1 features-text">
                    <small>ClubColonial</small>
                    <h2> Foco nos temas relevantes </h2>
                    <i class="fa fa-check big-icon pull-right"></i>

                    <p class="text-justify"> O edital verticalizado proporciona ao candidato uma identificação
                        organizada
                        dos tópicos mais
                        importantes, permitindo que ele direcione seus estudos de forma estratégica.</p>
                </div>
                <div class="col-lg-5 features-text">
                    <small>ClubColonial</small>
                    <h2>
                        Revisão Eficiente </h2>
                    <i class="fa fa-book big-icon pull-right"></i>
                    <p class="text-justify"> As revisões são essenciais para consolidar o conhecimento e garantir
                        preparação
                        para a prova. Com o edital verticalizado, você pode identificar facilmente o que já estudou e
                        revisou. </p>
                </div>
            </div>
        </div>

    </section>

    <section class="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="navy-line"></div>
                    <h1>Venha junto com {{$usuario->name}} utilizar o ClubColonial</h1>
                    {{--                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. </p>--}}
                </div>
            </div>
            <div class="row">
                <div class="panel black-bg">
                    <div class="panel-body">
                        <form class="m-t" method="POST" action="{{route('register')}}">
                            @csrf

                            <div class="form-group">
                                <label for="">Nome</label>
                                <input placeholder="Nome" id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                       name="name"
                                       value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="form-group">

                                <label for="">CPF</label>
                                <input data-mask="999.999.999-99" placeholder="CPF" id="cpf" type="text" class="form-control @error('cpf') is-invalid @enderror"
                                       name="cpf"
                                       value="{{ old('cpf') }}"  required autocomplete="cpf">

                                @error('cpf')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <input type="hidden" value="{{$usuario->code}}" name="direto">
                            <div class="form-group">

                                <label for="">Email</label>
                                <input placeholder="Email" id="email" type="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       name="email"
                                       value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="form-group">

                                <label for="">Whatsapp</label>
                                <input data-mask="(99)99999-9999" placeholder="Whatsapp ou Telefone" id="whatsapp" type="text"
                                       class="form-control @error('whatsapp') is-invalid @enderror"
                                       name="whatsapp"
                                       value="{{ old('whatsapp') }}" required autocomplete="whatsapp">

                                @error('whatsapp')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label for="">Senha</label>
                                <input placeholder="Senha" id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label for="">Confirme sua senha</label>
                                <input placeholder="Confirme a senha senha" id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation"
                                       required
                                       autocomplete="new-password">

                            </div>


                            <button type="submit" class="btn btn-primary btn-block">
                                Cadastrar
                            </button>

                        </form>
                    </div>
                </div>
            </div>

        </div>

    </section>
    <section id="pricing" class="pricing">
        <div class="container">
            <div class="row m-b-lg">
                <div class="col-lg-12 text-center">
                    <div class="navy-line"></div>
                    <h1>Nossas Cestas</h1>
                    {{--                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>--}}
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="tabs-container">
                        <ul class="nav nav-tabs" role="tablist">
                            <li><a class="nav-link active" data-toggle="tab" href="#tab-1"> Atuais</a></li>
                            <li><a class="nav-link" data-toggle="tab" href="#tab-2">Passados</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" id="tab-1" class="tab-pane active">
                                <div class="panel-body">

                                    @forelse($editals as $edital)
                                        <div class="col-md-3">
                                            <div class="ibox">
                                                <div style="height: 300px"
                                                     class="ibox-content product-box">
                                                    <center>
                                                        <img  class="img img-responsive img-concurso"
                                                             src="{{ $edital->img ? asset('concurso/' . $edital->img) : asset('logo.png') }}"
                                                             alt="ClubColonial {{$edital->orgao->name}} -- {{$edital->ano}}">
                                                    </center>
                                                    <div class="product-desc">
                                                                    <span class="product-price">
                                                                        R$9.70
                                                                    </span>
                                                        <small
                                                            class="text-muted"></small>

                                                        <center>
                                                            <a href="{{ url('edital/detalhes/'.$edital->id) }}"
                                                               class="product-name">{{$edital->orgao->name}}
                                                                - {{$edital->ano}} </a>
                                                        </center>

                                                        <div class="small m-t-xs">
                                                            {{--                                                Many desktop publishing packages and web page editors now.--}}
                                                        </div>
                                                        <div class="m-t text-righ">


                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ibox-footer product-box">


                                                    <a href="{{ url('edital/detalhes/'.$edital->slug) }}"
                                                       class="btn btn-block btn-outline btn-primary">
                                                        VEJA MAIS <i class="fa fa-long-arrow-right"></i>
                                                    </a>

                                                </div>
                                            </div>
                                        </div>

                                        {{--                                        <div class="ibox">--}}
                                        {{--                                            <div class="ibox-title">{{$edital->orgao->name}} - {{$edital->ano}}</div>--}}
                                        {{--                                            <div class="ibox-content">--}}
                                        {{--                                                <div class="row">--}}


                                        {{--                                                    @forelse($edital->cargos as $cargo)--}}

                                        {{--                                                    @empty--}}
                                        {{--                                                    @endforelse--}}


                                        {{--                                                </div>--}}

                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                            <div role="tabpanel" id="tab-2" class="tab-pane">
                                <div class="panel-body">
                                    @forelse($passados as $passado)

                                        <div class="ibox">
                                            <div class="ibox-title">{{$passado->orgao->name}} - {{$passado->ano}}</div>
                                            <div class="ibox-content">
                                                <div class="row">


                                                    @forelse($passado->cargos as $cargo)
                                                        <div class="col-md-3">
                                                            <div class="ibox">
                                                                <div style="height: 500px"
                                                                     class="ibox-content product-box">

                                                                    <div
                                                                        style="background-image: url('{{ $passado->img ? asset('concurso/' . $passado->img) : asset('logo.png') }}'); background-size: cover; background-position: center center; width: 100%; height: 80px;"
                                                                        class="product-imitation">
                                                                    </div>
                                                                    <div class="product-desc">
                                <span class="product-price">
                                    R$9.70
                                </span>
                                                                        <small
                                                                            class="text-muted">{{$passado->orgao->name}}</small>
                                                                        <a href="#"
                                                                           class="product-name"> {{$cargo->name}}</a>


                                                                        <div class="small m-t-xs">
                                                                            {{--                                                Many desktop publishing packages and web page editors now.--}}
                                                                        </div>
                                                                        <div class="m-t text-righ">


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="ibox-footer product-box">


                                                                    <a href="{{ url('comprar/'.$passado->id.'/cargo/'.$cargo->id) }}"
                                                                       class="btn btn-block btn-outline btn-primary">
                                                                        Comprar <i class="fa fa-long-arrow-right"></i>
                                                                    </a>
                                                                    <a href="{{ url('detalhes/'.$passado->id.'/cargo/'.$cargo->id) }}"
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
                            </div>
                        </div>


                    </div>
                </div>


            </div>
            <div class="row m-t-lg">
                <div class="col-lg-8 col-lg-offset-2 text-center m-t-lg">
                    <p>*Não entregamos videoaula, resumos, PDF,s ou qualquer outro conteúdo de estudo.</p>
                </div>
            </div>
        </div>

    </section>
@endsection
@section('js')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <script src="//code.jivosite.com/widget/7IlpzCWHxS" async></script>
    <script>
        $(document).ready(function() {
            $('#phone').mask('(00)00000-0000'); // Aplica a máscara ao campo de telefone
            $('#cpf').mask('000.000.000-00'); // Aplica a máscara ao campo de telefone
        });
    </script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-QQGRZ34LGM"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-QQGRZ34LGM');
    </script>
@endsection
