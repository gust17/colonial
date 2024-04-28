@extends('padrao')
@section('content')

    <div class="panel">
        <div class="panel-heading">Cadastre a cesta</div>
        <div class="panel-body">

            <form action="{{route('cadCesta')}}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Nome da Cesta</label>
                    <input type="text" class="form-control" name="name" id="">
                </div>
                <div class="form-group">
                    <label for="">Preço</label>
                    <input class="form-control" type="number" id="decimal" name="price" step="0.01">

                </div>
                <div class="form-group">
                    <label for="">Descrição</label>
                    <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Recorrência</label>
                    <input type="number" class="form-control" name="recorrencia" id="">
                </div>
                <div class="form-group">
                    <label for="">Imagem</label>
                    <input class="form-control" type="file" name="image" id="">
                </div>
                <div class="form-group">
                    <button class="btn btn-succes">Cadastrar</button>

                </div>
            </form>
        </div>
    </div>

@endsection
