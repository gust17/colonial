@extends('padrao')
@section('content')


        <div class="ibox product-detail">
            <div class="ibox-content">

                <div class="row">
                    <div class="col-md-5">

                        <img width="60%" class="img img-responsive" src="{{asset('storage/'.$compra->cesta->image)}}" alt="">
                    </div>
                    <div class="col-md-7">

                        <h2 class="font-bold m-b-xs">
                            {{$compra->name}}
                        </h2>
                        <small> {{$compra->name}}</small>
                        <div class="m-t-md">
                            <h2 class="product-main-price">R$ {{ number_format($compra->valor, 2, ',', '.') }} <small
                                    class="text-muted"></small></h2>
                        </div>
                        <hr>

                        <h4>Descrição do Produto</h4>

                        <div class="small text-muted">
                            <h4>Você encontrará o conteúdo programatico das seguintes Matérias</h4>
                            <p style="color: black">{{$compra->cesta->description}}</p>
                            <br>
                            <br>

                        </div>

                        <hr>

                        <div>
                            <h3>Método de Pagamento</h3>
                            <div class="btn-group">
                                <a target="_blank" href="{{url('checkout/'.$compra->id."/metodo/3")}}"
                                   class="btn btn-primary btn-lg"><i class="fa fa-cart-plus"></i> PIX</a>
                                <a target="_blank" href="{{url('checkout/'.$compra->id."/metodo/2")}}"
                                   class="btn btn-warning btn-lg"><i class="fa fa-cart-plus"></i> CREDITO|DEBITO</a>


                            </div>
                        </div>


                    </div>
                </div>

            </div>

        </div>


@endsection

@section('js')

    @if($compra->status ==0)
        <script>

            function verificarStatus(id) {
                $.ajax({
                    url: '{{url('api/verifica')}}/' + id,
                    method: 'GET',
                    success: function (response) {
                        if (response.status === 1) {
                            window.location.href = '/minhascompras';
                        } else {
                            $('#status').text('Aguardando...');
                        }
                    },
                    error: function () {
                        console.log('Erro ao verificar o status.');
                    }
                });
            }

            $(document).ready(function () {
                var id = {{$compra->id}}; // Substitua pelo ID correto que você deseja verificar

                setInterval(function () {
                    verificarStatus(id);
                }, 10000); // 10 segundos
            });
        </script>
    @endif

@endsection
