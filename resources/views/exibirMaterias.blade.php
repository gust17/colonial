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
</head>
<body>
<div class="container">
    <div id="accordion">

        @forelse($dados as $dado)
            <div class="card">
                <div class="card-header">
                    <a class="btn" data-bs-toggle="collapse" href="#collapse{{$dado['materia_id']}}">
                        {{$dado['materia']}}
                    </a>
                </div>
                <div id="collapse{{$dado['materia_id']}}" class="collapse" data-bs-parent="#accordion">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Conteudo</th>
                                <th>Estudado</th>
                                <th>Revisado</th>
                                <th>Questões</th>
                                <th>Acertos</th>
                                <th>Erros</th>
                                <th>%</th>

                            </tr>
                            </thead>
                            <tbody>


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


                    </div>
                </div>
            </div>
        @empty
        @endforelse


    </div>


</div>

</body>
</html>
