@extends('padrao')
@section('content')
    <div class="container">
        <h1>Editais</h1>

        @forelse($editals as $edital)
            <div class="ibox">
                <div class="ibox-title">{{$edital->orgao->name}} - {{$edital->ano}}</div>
                <div class="ibox-content">
                    <div class="row">

                        @php
                            // Filtra os conteúdos para ter apenas cargos únicos
                            $cargosUnicos = $edital->conteudos->unique('cargo_id')->sortBy('name');
                            //dd($cargosUnicos);

                        @endphp
                        @foreach($cargosUnicos as $conteudo)
                            <div class="col-md-3">
                                <div class="ibox">
                                    <div style="height: 400px" class="ibox-content product-box">

                                        <div class="product-imitation">
                                            [ INFO ]
                                        </div>
                                        <div class="product-desc">
                                <span class="product-price">
                                    R$10
                                </span>
                                            <small class="text-muted">{{$conteudo->edital->orgao->name}}</small>
                                            <a href="#" class="product-name"> {{$conteudo->cargo->name}}</a>


                                            <div class="small m-t-xs">
                                                Many desktop publishing packages and web page editors now.
                                            </div>
                                            <div class="m-t text-righ">


                                            </div>
                                        </div>
                                    </div>
                                    <div class="ibox-footer product-box">
                                        <a href="{{url('comprar/'.$edital->id.'/cargo/'.$conteudo->cargo->id)}}" class="btn btn-block  btn-outline btn-primary">Comprar <i
                                                class="fa fa-long-arrow-right"></i> </a>
                                    </div>
                                </div>
                            </div>

                            {{--                        <a href="{{url('edital/'.$edital->id.'/cargo/'.$conteudo->cargo->id)}}">{{$conteudo->cargo->name}}</a>--}}
                            {{--                        <br>--}}
                        @endforeach


                    </div>

                </div>
            </div>
        @empty
        @endforelse

    </div>
@endsection
