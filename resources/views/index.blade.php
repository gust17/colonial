@extends('padrao')
@section('content')
    <div class="container">
        <h1>Editais</h1>

        @forelse($editals as $edital)

            <div class="ibox">
                <div class="ibox-title">{{$edital->orgao->name}} - {{$edital->ano}}</div>
                <div class="ibox-content">
                    <div class="row">


                        @forelse($edital->cargos as $cargo)
                            <div class="col-md-3">
                                <div class="ibox">
                                    <div style="height: 500px" class="ibox-content product-box">

                                        <div style="background-image: url('{{ asset('concurso/' . $edital->img) }}'); background-size: cover; background-position: center center; width: 100%; height: 300px;" class="product-imitation">
                                        </div>
                                        <div  class="product-desc">
                                <span class="product-price">
                                    R$10
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


                                        @if($comprasAtivas->contains(function ($value) use ($edital, $cargo) {
                                            return $value->edital_id == $edital->id && $value->cargo_id == $cargo->id;
                                        }))
                                            <a target="_blank" href="{{ url('baixar/'.$comprasAtivas->where('edital_id', $edital->id)->where('cargo_id', $cargo->id)->first()->id) }}"
                                               class="btn btn-block btn-primary">
                                                Baixar <i class="fa fa-download"></i>
                                            </a>
                                        @else
                                            <a href="{{ url('comprar/'.$edital->id.'/cargo/'.$cargo->id) }}"
                                               class="btn btn-block btn-outline btn-primary">
                                                Comprar <i class="fa fa-long-arrow-right"></i>
                                            </a>
                                        @endif
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
@endsection
