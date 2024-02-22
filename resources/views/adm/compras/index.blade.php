@extends('padrao')

@section('content')
    <div class="container">
        <h1>Minhas Compras</h1>
        <div class="ibox">
            <div class="ibox-title"></div>
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Usuário</th>
                            <th>Edital</th>
                            <th>Valor</th>
                            <th>Data de Compra</th>
                            <th>Status</th>
                            <th>Contador</th>
                            <td>Ação</td>


                        </tr>
                        </thead>

                        <tbody>

                        @forelse($compras as $compra)

                            <tr>
                                <td>{{$compra->id}}</td>
                                <td>{{$compra->user->name}}</td>
                                <td>{{$compra->edital->orgao->name}} - {{$compra->cargo->name}}</td>
                                <td>R$ {{ number_format($compra->valor, 2, ',', '.') }}</td>
                                <td>{{$compra->data_pagamento}}</td>
                                <td>{{$compra->status_formated}}</td>
                                <td>{{$compra->contador}}</td>
                                <td>
                                    @if($compra->status == 1)

                                        <a href="{{ url('admin/compras/ativa',$compra->id) }}"
                                           class="btn btn-block btn-outline btn-success">
                                            Enviar <i class="fa fa-long-arrow-right"></i></a>
                                        {{--                                    <a target="_blank" href="{{ url('baixar',$compra->id)}}"--}}
                                        {{--                                       class="btn btn-block btn-primary">--}}
                                        {{--                                        Enviar  <i class="fa fa-download"></i>--}}
                                        {{--                                    </a>--}}
                                    @else
                                        <a href="{{ url('enviar/'.$compra->edital_id.'/cargo/'.$compra->cargo_id) }}"
                                           class="btn btn-block btn-outline btn-danger">
                                            Enviar Cobrança <i class="fa fa-long-arrow-right"></i>
                                        </a>
                                        <a href="{{ url('admin/compras/deletar',$compra->id) }}"
                                           class="btn btn-block btn-outline btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    @endif
                                </td>


                            </tr>

                        @empty
                        @endforelse


                        </tbody>


                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
