@extends('padrao')
@section('content')
    <div class="col-lg-12">

        <div class="ibox product-detail">
            <div class="ibox-content">

                <div class="row">
                    <div class="col-md-5">

                        <img class="img img-responsive" src="{{asset('concurso/'.$editalBusca->img)}}" alt="">
                    </div>
                    <div class="col-md-7">

                        <h2 class="font-bold m-b-xs">
                            {{$cargoBusca->name}}
                        </h2>
                        <small> {{$editalBusca->orgao->name}}</small>
                        <div class="m-t-md">
                            <h2 class="product-main-price">R$ {{ number_format($editalBusca->valor, 2, ',', '.') }} <small class="text-muted"></small></h2>
                        </div>
                        <hr>

                        <h4>Descrição do Produto</h4>

                        <div class="small text-muted">
                            <h4>Você encontrará o conteúdo programatico das seguintes Matérias</h4>

                            @forelse($conteudos as $conteudo)
                                <p>{{$conteudo->name}}</p>
                            @empty
                            @endforelse
                            <br>
                            <br>

                        </div>

                        <hr>

                        <div>

                            <div class="btn-group">
                                <a target="_blank" href="{{url('comprar/'.$editalBusca->id.'/cargo/'.$cargoBusca->id)}}"
                                   class="btn btn-primary btn-block"><i class="fa fa-cart-plus"></i> COMPRAR</a>



                            </div>
                        </div>


                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
