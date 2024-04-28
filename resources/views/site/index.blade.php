@extends('site.padrao')
@section('title','CLUBCOLONIAL')
@section('head')

    <meta name="description"
          content="Otimize seus estudos para concursos públicos com o poder do Edital Verticalizado! Acesse nossa ferramenta ClubColonial e maximize suas chances de aprovação.">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{url('/')}}">
@endsection

@section('content')
    @include('site.top')
    <section id="features" class="container services">
        <div class="row">
            <div class="col-sm-3">
                <h2>Entregas de Produtos Frescos</h2>
                <p class="text-justify">
                    Oferecemos entregas de produtos frescos diretamente em sua porta, sem a necessidade de procurar em diversos lugares. Garantimos a qualidade e frescor de cada item em nosso kit.
                </p>

            </div>
            <div class="col-sm-3">
                <h2>Maior Diversidade de Produtos</h2>
                <p class="text-justify">Nosso kit oferece uma ampla variedade de produtos coloniais, desde queijos e embutidos até doces e conservas. Surpreenda-se com a diversidade de sabores que temos para oferecer!
                {{-- e ao fim saber o seu percentual de--}}
                {{--                acertos. </p>--}}

            </div>
            <div class="col-sm-3">
                <h2>Personalização do Kit</h2>
                <p class="text-justify">
                    Permitimos que você personalize seu próprio kit de acordo com suas preferências. Escolha os produtos que mais ama e monte um kit único e especial para você.
                    Experiência Exclusiva: Além dos produtos de alta qualidade, proporcionamos uma experiência exclusiva aos nossos membros, com acesso a eventos, degustações e conteúdo exclusivo sobre a cultura e tradição colonial.
                </p>

            </div>
            <div class="col-sm-3">
                <h2>Atendimento Personalizado:</h2>
                <p class="text-justify">Nossa equipe está sempre pronta para atendê-lo de forma personalizada, oferecendo suporte e assistência em todas as etapas, desde a escolha dos produtos até a entrega.</p>

            </div>
        </div>
    </section>


{{--    <section class="features">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12 text-center">--}}
{{--                    <div class="navy-line"></div>--}}
{{--                    <h1>Personalização do Kit</h1>--}}
{{--                    --}}{{--                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. </p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-5 col-lg-offset-1 features-text">--}}
{{--                    <small>ClubColonial</small>--}}
{{--                    <h2>--}}
{{--                        Organização e planejamento </h2>--}}
{{--                    <i class="fa fa-bar-chart big-icon pull-right"></i>--}}
{{--                    <p class="text-justify"> Com uma compreensão clara dos conteúdos programáticos, torna-se mais--}}
{{--                        simples--}}
{{--                        criar um plano de--}}
{{--                        estudos eficaz e bem equilibrado.</p>--}}
{{--                </div>--}}
{{--                <div class="col-lg-5 features-text">--}}
{{--                    <small>ClubColonial</small>--}}
{{--                    <h2>Acompanhamento do progresso </h2>--}}
{{--                    <i class="fa fa-calendar big-icon pull-right"></i>--}}
{{--                    <p class="text-justify">Nossa ferramenta oferece uma estrutura que inclui campos como "estudado",--}}
{{--                        "revisado", "número de--}}
{{--                        questões feitas", "acertos", "erros". Essa abordagem do edital verticalizado facilita o--}}
{{--                        controle do progresso nos estudos, permitindo que o candidato acompanhe seu desempenho e--}}
{{--                        identifique--}}
{{--                        áreas que necessitam de mais atenção.</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-5 col-lg-offset-1 features-text">--}}
{{--                    <small>ClubColonial</small>--}}
{{--                    <h2> Foco nos temas relevantes </h2>--}}
{{--                    <i class="fa fa-check big-icon pull-right"></i>--}}

{{--                    <p class="text-justify"> O edital verticalizado proporciona ao candidato uma identificação--}}
{{--                        organizada--}}
{{--                        dos tópicos mais--}}
{{--                        importantes, permitindo que ele direcione seus estudos de forma estratégica.</p>--}}
{{--                </div>--}}
{{--                <div class="col-lg-5 features-text">--}}
{{--                    <small>ClubColonial</small>--}}
{{--                    <h2>--}}
{{--                        Revisão Eficiente </h2>--}}
{{--                    <i class="fa fa-book big-icon pull-right"></i>--}}
{{--                    <p class="text-justify"> As revisões são essenciais para consolidar o conhecimento e garantir--}}
{{--                        preparação--}}
{{--                        para a prova. Com o edital verticalizado, você pode identificar facilmente o que já estudou e--}}
{{--                        revisou. </p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </section>--}}
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
                    <div class="panel">
                        <div class="panel-body">

                            @forelse($cestas as $cesta)
                                <div class="col-md-3">
                                    <div class="ibox">
                                        <div style="height: 300px"
                                             class="ibox-content product-box">
                                            <center>
                                                <img class="img img-responsive img-concurso"
                                                     src="{{ $cesta->image ? asset('storage/'.$cesta->image) : asset('logo.png') }}"
                                                     alt="ClubColonial {{$cesta->name}}">
                                            </center>
                                            <div class="product-desc">
                                                                    <span class="product-price">
                                                                        R$ {{$cesta->price}}
                                                                    </span>
                                                <small
                                                    class="text-muted"></small>

                                                <center>
                                                    <a href="{{ url('cesta'.$cesta) }}"
                                                       class="product-name">{{$cesta->name}}
                                                    </a>
                                                </center>

                                                <div class="small m-t-xs">
                                                    {{--                                                Many desktop publishing packages and web page editors now.--}}
                                                </div>
                                                <div class="m-t text-righ">


                                                </div>
                                            </div>
                                        </div>
                                        <div class="ibox-footer product-box">


                                            <a href="{{ url('cesta',$cesta) }}"
                                               class="btn btn-block btn-outline btn-primary">
                                                VEJA MAIS <i class="fa fa-long-arrow-right"></i>
                                            </a>

                                        </div>
                                    </div>
                                </div>

                                {{--                                        <div class="ibox">--}}
                                {{--                                            <div class="ibox-title">{{$cesta->orgao->name}} - {{$cesta->ano}}</div>--}}
                                {{--                                            <div class="ibox-content">--}}
                                {{--                                                <div class="row">--}}


                                {{--                                                    @forelse($cesta->cargos as $cargo)--}}

                                {{--                                                    @empty--}}
                                {{--                                                    @endforelse--}}


                                {{--                                                </div>--}}

                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>


            </div>
            <div class="row m-t-lg">
                <div class="col-lg-8 col-lg-offset-2 text-center m-t-lg">
{{--                    <p>*Não entregamos videoaula, resumos, PDF,s ou qualquer outro conteúdo de estudo.</p>--}}
                </div>
            </div>
        </div>

    </section>
@endsection
