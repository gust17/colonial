@extends('site.padrao')
@section('title','Edital Verticalizado '.$cesta->name)
@section('head')

    <meta name="description"
          content="Edital verticalizado do concurso {{$cesta->name}}">
    <meta property="og:title" content="ClubColonial">

@endsection
@section('content')
    @include('site.top')

    <div class="ibox product-detail">
        <div class="ibox-content">

            <div class="row">
                <div class="col-md-5">

                    <img width="60%" class="img img-responsive"
                         src="{{ $cesta->image ? asset('storage/'.$cesta->image) : asset('logo.png') }}"
                         alt="">
                </div>
                <div class="col-md-7">

                    <h2 class="font-bold m-b-xs">
                        {{$cesta->name}}
                    </h2>
                    <small> {{$cesta->name}}</small>
                    <div class="m-t-md">
                        <h2 class="product-main-price">R$ {{ number_format($cesta->price, 2, ',', '.') }}
                            <small class="text-muted"></small></h2>
                    </div>
                    <hr>

                    <h4>Descrição do Produto</h4>

                    <div class="small text-muted">
                        <h4>Você receberá</h4>

                        <p style="color: black" ">{{$cesta->description}}</p>
                        <br>
                        <br>

                    </div>

                    <hr>

                    <div>

                        <div class="btn-group">
                            <a target="_blank" href="{{url('comprar/'.$cesta->id)}}"
                               class="btn btn-primary btn-block"><i class="fa fa-cart-plus"></i> COMPRAR</a>


                        </div>
                    </div>


                </div>
            </div>

        </div>

    </div>


@endsection
