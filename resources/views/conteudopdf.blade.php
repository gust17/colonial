<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
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

        /* Marca d'água */
        @page {
            background-color: transparent; /* Define a cor de fundo da página como transparente */
        }

        body::after {
            content: "Não ceder"; /* Define o texto da marca d'água */
            position: fixed; /* Define a posição fixa para o texto */
            bottom: 0;
            top: 150px;
            left: 0;
            width: 100%;
            height: 100%;
            font-size: 5em; /* Tamanho da fonte */
            color: rgba(0,0,0,0.1); /* Cor do texto - ajuste a opacidade conforme necessário */
            z-index: -1; /* Define o texto atrás do conteúdo */
            transform: rotate(-45deg); /* Rotaciona o texto em 45 graus */
            transform-origin: center center; /* Define o ponto de origem da rotação */
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
                <th>%</th>
            </tr>
            @forelse($nomeEdital->conteudos->where('materia_id',$dado['materia_id'])->where('cargo_id',$nomeCargo->id) as $conteudo)

                <tr>
                    <td>{{$conteudo->conteudo}}</td>
                    <td></td>
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

<!-- Rodapé -->
<div class="footer">
    <p>Mensagem no rodapé do PDF - Código: {{$randomCode}}</p>
</div>
</body>
</html>
