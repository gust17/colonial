@extends('site.padrao')
@section('head')

    <meta name="description"
          content="Edital verticalizado do concurso {{$edital->orgao->name}} - {{$edital->ano}}">
@endsection
@section('content')
    <div class="container">
        <div class="row m-b-lg">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>{{$edital->orgao->name}} - {{$edital->ano}}</h1>
                {{--                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>--}}
            </div>
        </div>

        <div class="row">


            @forelse($cargosOrdenados as $cargo)
                <div class="col-md-3">
                    <div class="ibox">
                        <div style="height: 300px" class="ibox-content product-box">

                            <center>

                                <img style="height: 150px" class="img img-responsive"
                                     src="{{ $edital->img ? asset('concurso/' . $edital->img) : asset('logo.png') }}"
                                     alt="Edital verticalizado VERTICALIZEJA {{$edital->orgao->name}} -- {{$edital->ano}} -- {{$cargo->name}}">
                            </center>
                            <div class="product-desc">
                                <span class="product-price">
                                    R$ {{ number_format($edital->valor, 2, ',', '.') }}
                                </span>

                                <center>
                                    <small class="text-muted">{{$edital->orgao->name}}</small>
                                    <a href="#" class="product-name"> {{$cargo->name}}</a>
                                </center>

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


                            <a href="{{ url('open/detalhes/'.$edital->id.'/cargo/'.$cargo->id) }}"
                               class="btn btn-block btn-outline btn-warning">
                                Detalhes <i class="fa fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse


            <div class="col-md-12 text-center">
                <a href="{{url('/')}}" class="btn btn-primary">Voltar</a>
            </div>

        </div>

    </div>

@endsection
