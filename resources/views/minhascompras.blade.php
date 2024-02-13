@extends('padrao')
@section('content')

    <div class="container">
        <h1>Minhas Compras</h1>
        <div class="ibox">
            <div class="ibox-title"></div>
            <div class="ibox-content">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Edital</th>
                        <th>Valor</th>
                        <th>Data de Compra</th>
                        <th>Status</th>
                        <td>Ação</td>


                    </tr>
                    </thead>

                    <tbody>

                    @forelse(auth()->user()->compras as $compra)

                        @csrf
                        <tr>
                            <td>{{$compra->id}}</td>
                            <td>{{$compra->edital->orgao->name}} - {{$compra->cargo->name}}</td>
                            <td>R$ {{ number_format($compra->valor, 2, ',', '.') }}</td>
                            <td>{{$compra->created_at->format('d/m/Y')}}</td>
                            <td>{{$compra->status_formated}}</td>
                            <td>
                                @if($compra->status == 1)
                                    <a target="_blank" href="{{ url('baixar',$compra->id)}}"
                                       class="btn btn-block btn-primary">
                                        Baixar <i class="fa fa-download"></i>
                                    </a>
                                @else
                                    <a href="{{ url('comprar/'.$compra->edital_id.'/cargo/'.$compra->cargo_id) }}"
                                       class="btn btn-block btn-outline btn-danger">
                                        Pagar <i class="fa fa-long-arrow-right"></i>
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
@endsection
