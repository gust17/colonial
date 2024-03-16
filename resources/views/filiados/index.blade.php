@extends('padrao')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="widget style1 navy-bg">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span> Filiados</span>
                            <h2 class="font-bold">{{auth()->user()->filiados->count()}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="widget style1 white-bg">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-dollar fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span> Cliques</span>
                            <h2 class="font-bold">{{auth()->user()->clique}}</h2>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <div class="container">
        <div class="ibox">
            <div class="ibox-title"><h3>Meu Link</h3></div>
            <div class="ibox-content">
                <div class="form-group">
                    <input id="linkInput" class="form-control" type="text"
                           value="{{url('meu-link',auth()->user()->code)}}" readonly>
                </div>
                <div class="form-group">
                    <button id="btnCopiar" class="btn btn-primary btn-block">Copiar</button>
                </div>
            </div>
        </div>
        <div class="ibox">
            <div class="ibox-title"><h3>Meus Filiados</h3></div>
            <div class="ibox-content">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Whats</th>
                        <th>Data de Cadastro</th>


                    </tr>
                    </thead>
                    <tbody>
                    @forelse(auth()->user()->filiados as $filiado)
                        <tr>
                            <td>{{ $filiado->name }}</td>
                            <td>{{$filiado->whatsapp}}</td>
                            <td>{{$filiado->created_at->format('d/m/y')}}</td>


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
        // Função para copiar o conteúdo do input para a área de transferência
        function copiarTexto() {
            var input = document.getElementById('linkInput');
            input.select();
            document.execCommand('copy');
            alert('O link foi copiado para a área de transferência.');
        }

        // Adiciona um ouvinte de evento para o clique do botão
        document.getElementById('btnCopiar').addEventListener('click', copiarTexto);
    </script>
@endsection
