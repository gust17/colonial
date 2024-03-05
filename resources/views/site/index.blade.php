@extends('site.padrao')
@section('title','VERTICALIZEJA')
@section('head')

    <meta name="description"
          content="Otimize seus estudos para concursos públicos com o poder do Edital Verticalizado! Acesse nossa ferramenta VerticalizeJa e maximize suas chances de aprovação.">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{url('/')}}">
@endsection

@section('content')
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
                <h2>O QUE VERTICALIZEJA OFERECE AO USUÁRIO</h2>
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
                <h2>BENEFÍCIOS DE TER O SEU VERTICALIZEJA</h2>
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
                    <small>VERTICALIZEJA</small>
                    <h2>
                        Organização e planejamento </h2>
                    <i class="fa fa-bar-chart big-icon pull-right"></i>
                    <p class="text-justify"> Com uma compreensão clara dos conteúdos programáticos, torna-se mais
                        simples
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
                        controle do progresso nos estudos, permitindo que o candidato acompanhe seu desempenho e
                        identifique
                        áreas que necessitam de mais atenção.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 col-lg-offset-1 features-text">
                    <small>VERTICALIZEJA</small>
                    <h2> Foco nos temas relevantes </h2>
                    <i class="fa fa-check big-icon pull-right"></i>

                    <p class="text-justify"> O edital verticalizado proporciona ao candidato uma identificação
                        organizada
                        dos tópicos mais
                        importantes, permitindo que ele direcione seus estudos de forma estratégica.</p>
                </div>
                <div class="col-lg-5 features-text">
                    <small>VERTICALIZEJA</small>
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
                                                             alt="Edital verticalizado VERTICALIZEJA {{$edital->orgao->name}} -- {{$edital->ano}}">
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
