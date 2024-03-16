@extends('padrao')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="widget style1 navy-bg">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-dollar fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span> Saldo Disponível</span>
                            <h2 class="font-bold">{{number_format(auth()->user()->SaldoDisponivel(),2, ',', '.')}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="widget style1 red-bg">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-dollar fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span> Total de Saques</span>
                            <h2 class="font-bold">{{number_format(auth()->user()->extratos->where('tipo',1)->sum('valor'),2,',','.')}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                @if(auth()->user()->SaldoDisponivel() > 0)
                    <div class="ibox">
                        <div class="ibox-content">
                            <form id="saqueForm" action="{{url('realizar-saque')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Valor solicitado</label>
                                    <input id="valorSolicitado" class="form-control" name="valor_solicitado" type="number" required>
                                </div>
                                <div class="form-group">
                                    <button id="btnSolicitarSaque" class="btn btn-block btn-primary">Solicitar Saque</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
            </div>

        </div>
    </div>
    <div class="container">
        <div class="ibox">
            <div class="ibox-title"><h3>Minhas Movimantações</h3></div>
            <div class="ibox-content">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Descrição</th>
                        <th>Tipo</th>
                        <th>Valor</th>
                        <th>Data Solicitação</th>
                        <th>Status</th>
                        <th>Data Pagamento</th>


                    </tr>
                    </thead>
                    <tbody>
                    @forelse(auth()->user()->extratos as $extrato)
                        <tr>
                            <td>{{$extrato->descricao}}</td>
                            <td>{{$extrato->tipo_formatado}}</td>
                            <td>R$ {{number_format($extrato->valor,2,',','.')}}</td>
                            <td>{{$extrato->created_at->format('d/m/Y')}}</td>
                            <td>{{$extrato->status_formatado}}</td>
                            <td>{{$extrato->data_pagamento_formatado}}</td>


                        </tr>

                    @empty
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
@section('js')
    <script>
        // Obtém uma referência para o formulário e o botão
        const form = document.getElementById('saqueForm');
        const btnSolicitarSaque = document.getElementById('btnSolicitarSaque');
        const valorSolicitadoInput = document.getElementById('valorSolicitado');

        // Adiciona um ouvinte de evento para o envio do formulário
        form.addEventListener('submit', function(event) {
            // Obtém o saldo disponível do usuário
            const saldoDisponivel = parseFloat({{ auth()->user()->SaldoDisponivel() }});

            // Obtém o valor solicitado pelo usuário
            const valorSolicitado = parseFloat(valorSolicitadoInput.value);

            // Verifica se o valor solicitado é maior que o saldo disponível
            if (valorSolicitado > saldoDisponivel) {
                // Se for maior, exibe uma mensagem de erro e impede o envio do formulário
                alert('O valor solicitado é maior que o saldo disponível.');
                event.preventDefault(); // Impede o envio do formulário
            } else {
                // Caso contrário, desativa o botão
                btnSolicitarSaque.disabled = true;
            }
        });
    </script>
@endsection
