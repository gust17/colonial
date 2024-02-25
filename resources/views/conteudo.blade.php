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
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Conteudo</th>

        </tr>
        </thead>
        <form action="{{url('finalizaEdital')}}" method="post">
            <tbody>
            <input type="hidden" value="{{$edital_id}}" name="edital_id">
            <input type="hidden" value="{{$cargo_id}}" name="cargo_id">
            <input type="hidden" value="{{$material_id}}" name="material_id">

            @forelse($matches[0] as $index => $parte)

                @csrf
                <tr>
                    <td><input id="input_{{$index}}" class="form-control" name="conteudo[]" value="{{$parte}}"></td>

                </tr>
            @empty
            @endforelse


            </tbody>
            <button class="btn btn-success">Salvar</button>
        </form>

    </table>
</div>



</body>
<script
    src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
    crossorigin="anonymous"></script>

<script>
    function adicionarLinha(index) {
        // Obtenha a referência para a tabela
        var table = document.querySelector('tbody');

        // Crie uma nova linha
        var newRow = document.createElement('tr');

        // Crie as células da nova linha
        var cell1 = document.createElement('td');
        var cell2 = document.createElement('td');
        var cell3 = document.createElement('td');

        // Crie o input da nova linha
        var newInput = document.createElement('input');
        newInput.className = 'form-control';
        newInput.name = 'conteudo[]';
        newInput.id = 'input_' + index; // ID único para o input

        // Crie o botão "Adicionar Linha" para a nova linha
        var addButton = document.createElement('button');
        addButton.type = 'button';
        addButton.className = 'btn btn-primary';
        addButton.textContent = 'Adicionar Linha';
        addButton.id = 'add_button_' + index; // ID único para o botão Adicionar Linha
        addButton.addEventListener('click', function() {
            adicionarLinha(index + 1); // Adiciona uma linha abaixo da atual
            atualizarIndices();
        });

        // Crie o botão "Mesclar com Linha Anterior" para a nova linha
        var mergeButton = document.createElement('button');
        mergeButton.type = 'button';
        mergeButton.className = 'btn btn-secondary';
        mergeButton.textContent = 'Mesclar com Linha Anterior';
        mergeButton.id = 'merge_button_' + index; // ID único para o botão Mesclar com Linha Anterior
        mergeButton.addEventListener('click', function() {
            mesclarComLinhaAnterior(index);
            atualizarIndices();
        });

        // Adicione o input à primeira célula da nova linha
        cell1.appendChild(newInput);

        // Adicione os botões às outras células da nova linha
        cell2.appendChild(addButton);
        cell3.appendChild(mergeButton);

        // Adicione as células à nova linha
        newRow.appendChild(cell1);
        newRow.appendChild(cell2);
        newRow.appendChild(cell3);

        // Adicione a nova linha imediatamente abaixo da linha atual
        table.insertBefore(newRow, table.rows[index + 1]);
    }

    function mesclarComLinhaAnterior(index) {
        // Verifique se há uma linha anterior
        if (index > 0) {
            // Obtenha o input da linha atual
            var currentInput = document.getElementById('input_' + index);

            // Verifique se o input foi encontrado
            if (currentInput) {
                var currentInputValue = currentInput.value;

                // Obtenha o input da linha anterior
                var previousInput = document.getElementById('input_' + (index - 1));

                // Mesclar os valores dos inputs
                previousInput.value += ' ' + currentInputValue;

                // Remover a linha atual
                currentInput.parentNode.parentNode.remove();

                // Atualizar os índices dos inputs após a mesclagem
                atualizarIndices();
            } else {
                console.log("Input não encontrado.");
            }
        } else {
            console.log("Não há linha anterior para mesclar.");
        }
    }

    function criarOnClickHandler(index) {
        return function() {
            if (this.id.startsWith('add_button_')) {
                adicionarLinha(index);
            } else if (this.id.startsWith('merge_button_')) {
                mesclarComLinhaAnterior(index);
            }
            atualizarIndices(); // Após a ação, atualize os índices novamente
        };
    }

    function atualizarIndices() {
        // Obtenha todos os inputs e botões
        var inputs = document.querySelectorAll('input[name="conteudo[]"]');
        var buttons = document.querySelectorAll('button');

        // Atualize os IDs e os atributos dos inputs
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].id = 'input_' + i;
        }

        // Atualize os IDs e os atributos dos botões
        for (var i = 0; i < buttons.length; i++) {
            // Atualize os IDs dos botões
            if (buttons[i].id.startsWith('add_button_')) {
                buttons[i].id = 'add_button_' + i;
            } else if (buttons[i].id.startsWith('merge_button_')) {
                buttons[i].id = 'merge_button_' + i;
            }

            // Atualize os atributos onclick dos botões
            buttons[i].onclick = criarOnClickHandler(i);
        }
    }





</script>








</html>
