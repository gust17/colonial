<!doctype html>
<html lang="en">
<head>

    <title>Conteúdo liberado usuario: {{auth()->user()->name}}</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #000000;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        /* Estilos para o rodapé */
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            padding: 10px;
            background-color: #f2f2f2;
            border-top: 1px solid #dddddd;
            z-index: 1000; /* Garante que o rodapé fique sobre o conteúdo */
        }

        /* Garante que o rodapé não se sobreponha ao conteúdo principal */
        .main-content {
            padding-bottom: 60px; /* Altura do rodapé + margem para espaçamento */
        }

        .page-break {
            page-break-after: always;
        }

        /* Marca d'água */
        @page {
            background-color: transparent; /* Define a cor de fundo da página como transparente */
        }

        body::after {
            content: "Não ceder"; /* Define o texto da marca d'água */
            position: fixed; /* Define a posição fixa para o texto */
            top: 40%; /* Centraliza verticalmente */
            left: 20%; /* Centraliza horizontalmente */
            transform: translate(-40%, -40%) rotate(-45deg); /* Centraliza e rotaciona o texto */
            font-size: 10em; /* Tamanho da fonte */
            color: rgba(0, 0, 0, 0.1); /* Cor do texto - ajuste a opacidade conforme necessário */
            z-index: 9999; /* Define o texto sobre o conteúdo */
        }
    </style>
</head>
<body>
<div class="main-content">

    @forelse($dados as $dado)
        <h2>{{$dado['materia']}}</h2>
        <table>
            <tr>
                <th>Conteúdo</th>
                <th>Estudado</th>
                <th>Revisado</th>
                <th>Questões</th>
                <th>Acertos</th>
                <th>Erros</th>

            </tr>
            @forelse($nomeEdital->conteudos->where('materia_id',$dado['materia_id'])->where('cargo_id',$nomeCargo->id) as $conteudo)

                <tr>
                    <td>{{$conteudo->conteudo}}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>

                </tr>

            @empty
            @endforelse

        </table>
    @empty
    @endforelse

</div>
<div class="footer">
    <p>Não compartilhe - Código: {{$randomCode}}</p>
</div>
<!-- Rodapé -->

</body>
</html>
