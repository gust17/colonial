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
    <form action="{{url('gravaConteudo')}}" method="post">
        @csrf
        <div class="form-group">

            <label for="">Materia</label>
            <input type="text" name="materia" class="form-control">
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

</body>
</html>
