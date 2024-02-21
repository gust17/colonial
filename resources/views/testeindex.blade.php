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
    <div class="card">
        <div class="card-body">
            <form action="{{url('cargo/create')}}" method="post">
                @csrf
                <div class="form-group">

                    <label for="">Cargo</label>
                    <input class="form-control" name="name">
                </div>
                <div class="form-group">
                    <button>Salvar</button>
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{url('materia/create')}}" method="post">
                @csrf
                <div class="form-group">

                    <label for="">Materia</label>
                    <input class="form-control" name="name">
                </div>
                <div class="form-group">
                    <button>Salvar</button>
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{url('orgao/create')}}" method="post">
                @csrf
                <div class="form-group">

                    <label for="">Orgão</label>
                    <input class="form-control" name="name">
                </div>
                <div class="form-group">
                    <button>Salvar</button>
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{url('edital/create')}}" method="post">
                @csrf
                <div class="form-group">

                    <label for="">Orgão</label>
                    <select class="form-control" name="orgao_id" id="">
                        @forelse($orgaos as $orgao)
                            <option value="{{$orgao->id}}">{{$orgao->name}}</option>
                        @empty
                        @endforelse
                    </select>

                </div>
                <div class="form-group">

                    <label for="">Ano</label>
                    <input type="number" class="form-control" name="ano" id="">

                </div>
                <div class="form-group">
                    <button>Salvar</button>
                </div>
            </form>
        </div>
    </div>
    <br>
    <br>
    <br>
    <div class="card">
        <div class="card-body">
            <form action="{{url('gravaConteudo')}}" method="post">
                @csrf
                <div class="form-group">

                    <label for="">Edital</label>
                    <select class="form-control" name="edital_id" id="">
                        @forelse($editals as $edital)
                            <option value="{{$edital->id}}">{{$edital->orgao->name}} - {{$edital->ano}}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
                <div class="form-group">

                    <label for="">Cargo</label>
                    <select class="form-control" name="cargo_id" id="">
                        @forelse($cargos as $cargo)
                            <option value="{{$cargo->id}}">{{$cargo->name}}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
                <div class="form-group">

                    <label for="">Materia</label>
                    <select class="form-control" name="material_id" id="">
                        @forelse($materias as $materia)
                            <option value="{{$materia->id}}">{{$materia->name}}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
                <div class="form-group">

                    <label for="">Submeta apenas o texto do conteudo do edital</label>
                    <textarea class="form-control" name="conteudo" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-success">Salvar</button>
                </div>
            </form>
        </div>
    </div>

</div>

</body>
</html>
