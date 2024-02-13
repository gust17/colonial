@extends('padrao')
@section('content')
    <div class="col-lg-12">

        <div class="ibox product-detail">
            <div class="ibox-content">

                <div class="row">
                    <div class="col-md-5">

                        <img class="img img-responsive" src="{{asset('concurso/'.$compra->edital->img)}}" alt="">
                    </div>
                    <div class="col-md-7">

                        <h2 class="font-bold m-b-xs">
                            {{$compra->cargo->name}}
                        </h2>
                        <small> {{$compra->edital->orgao->name}}</small>
                        <div class="m-t-md">
                            <h2 class="product-main-price">R$10 <small class="text-muted"></small></h2>
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
                            <h3>Método de Pagamento</h3>
                            <div class="btn-group">
                                <a target="_blank" href="{{url('checkout/'.$compra->id."/metodo/3")}}"
                                   class="btn btn-primary btn-sm"><i class="fa fa-cart-plus"></i> PIX</a>
                                <a target="_blank" href="{{url('checkout/'.$compra->id."/metodo/2")}}"
                                   class="btn btn-warning btn-sm"><i class="fa fa-cart-plus"></i> CREDITO|DEBITO</a>


                            </div>
                        </div>


                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
