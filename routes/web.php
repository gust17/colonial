<?php

use Illuminate\Support\Facades\Route;
use CodePhix\Asaas\Asaas;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $comprasAtivas = auth()->user()->compras->where('status', 1);
    $editals = \App\Models\Edital::with(['cargos' => function ($query) {
        $query->orderBy('name');

        //dd($compraAtivas);
    }])->where('ativo',1)->get();

    //dd($comprasAtivas);

    return view('index', compact('editals', 'comprasAtivas'));
})->middleware(['auth','verified']);

use Smalot\PdfParser\Parser;

Route::get('teste', function () {

    return view('testeindex');
    // Caminho completo para o arquivo PDF
    $pdfPath = public_path('edital.pdf');

    // Verifique se o arquivo PDF existe
    if (!file_exists($pdfPath)) {
        return 'O arquivo PDF não foi encontrado.';
    }

    // Instancie o parser do PDF
    $parser = new Parser();

    try {
        // Parse o arquivo PDF
        $pdf = $parser->parseFile($pdfPath);

        // Recupere todas as páginas do arquivo PDF
        $pages = $pdf->getPages();

        // Inicialize uma variável para armazenar o texto
        $fullText = '';

        // Loop sobre cada página para extrair o texto
        foreach ($pages as $page) {
            // Adicione o texto da página à variável $fullText
            $fullText .= $page->getText();
        }


        preg_match_all("/\d+\.\s*[^.]+/", $fullText, $matches);

// $matches[0] agora contém todas as partes correspondentes
        foreach ($matches[0] as $parte) {
            echo $parte . "<br>";
        }

        // Retorne o texto extraído
        //return $fullText;
    } catch (\Exception $e) {
        // Se ocorrer algum erro durante o processamento do PDF, exiba uma mensagem de erro
        return 'Erro ao processar o arquivo PDF: ' . $e->getMessage();
    }
});
Route::post('gravaConteudo', function (\Illuminate\Http\Request $request) {
    $texto = $request->conteudo;

    //preg_match_all("/(?:\d+\.\s*)?[^.()]+(?:\([^)]+\))?|(?:n\. \d+\/\d+)/s", $texto, $matches);
    //preg_match_all("/(?:\d+\.\d+|n\. \d+\/\d+|[^.()]+)/s", $texto, $matches);
    preg_match_all("/(?:\d+\.\d+|n\. \d+\/\d+|[^.()]+(?:\([^)]+\))?)\s*/s", $texto, $matches);
    //preg_match_all("/(?:\d+\.\d+|n\. \d+\/\d+|\d+(?:\/\d+)?|[^.()]+(?:\([^)]+\))?)\s*/s", $texto, $matches);


    //preg_match_all("/(?:\d+\.\d+|n\. \d+\/\d+|\d+(?:\.\d+)?(?:\/\d+)?|[^.()]+(?:\([^)]+\))?)\s*/s", $texto, $matches);


//dd($matches[0]);
    return view('conteudo', compact('matches'));
});

Route::post('finalizaEdital', function (\Illuminate\Http\Request $request) {
    $conteudos = array_filter($request->conteudo, function ($value) {
        return !is_null($value);
    });
    //dd($conteudos);
    foreach ($conteudos as $conteudo) {

        //$buscaconteudo = \App\Models\Conteudo::where('conteudo',$conteudo)->first();
        //dd($buscaconteudo);
        //$buscaconteudo->delete();
        $gravar = [

            'edital_id' => 2,
            'cargo_id' => 9,
            'materia_id' => 35,
            'conteudo' => $conteudo
        ];
        \App\Models\Conteudo::create($gravar);
    }


    //return view('conteudofiltro', compact('conteudo'));

});

//Route::get('edital/{edital}/cargo/{cargo}', function ($edital, $cargo) {
//    $conteudos = \App\Models\Conteudo::selectRaw('ANY_VALUE(materias.name) as name, materia_id')
//        ->join('materias', 'conteudos.materia_id', '=', 'materias.id')
//        ->where('conteudos.edital_id', $edital)
//        ->where('conteudos.cargo_id', $cargo)
//        ->groupBy('conteudos.materia_id')
//        ->get();
//
//    $dados = [];
//    $nomeEdital = \App\Models\Edital::find($edital);
//    $nomeCargo = \App\Models\Cargo::find($cargo);
//    foreach ($conteudos as $conteudo) {
//        $dados[] = ['edital' => $edital,
//            'cargo' => $cargo,
//            'materia' => $conteudo->name,
//            'materia_id' => $conteudo->materia_id,
//        ];
//
//    }
//
//
//    return view('exibirMaterias', compact('dados', 'nomeCargo', 'nomeEdital'));
//
//});

Route::get('comprar/{edital}/cargo/{cargo}', function ($edital, $cargo) {

    $user = auth()->user();
    $asaas = new Asaas(env('ASAAS_TOKEN'), env('ASAAS_AMBIENTE'));
    if ($user->asaas_client) {

    } else {
        $dadosCliente = [
            'name' => $user->name,
            'cpfCnpj' => $user->cpf,
            'email' => $user->email,
            'phone' => $user->whatsapp,
            'notificationDisabled' => true
        ];
        $clientes = $asaas->Cliente()->create($dadosCliente);

        //dd($clientes);
        $user->fill(['asaas_client' => $clientes->id]);
        $user->save();
    }

    $compra = \App\Models\Compra::where('cargo_id', $cargo)->where('edital_id', $edital)->where('user_id', auth()->user()->id)->first();

    if (!$compra) {
        $compra = \App\Models\Compra::create(
            ['edital_id' => $edital,
                'cargo_id' => $cargo,
                'user_id' => auth()->user()->id]
        );
    }

    $orgaoCobra = $compra->edital->orgao->name;
    //dd($compra);
    $cargoCobra = $compra->cargo->name;
    if (!$compra->asaas_id) {
        $dadosCobranca = array(
            'customer' => $user->asaas_client,
            'name' => 'Pagamento Referente a verticalização do Edital',
            'description' => "Edital do $orgaoCobra $cargoCobra",
            'dueDate' => \Carbon\Carbon::now()->addDays(2)->format('Y-m-d'),
            'value' => 10.00,

            'billingType' => 'UNDEFINED', //required

            'chargeType' => 'DETACHED', //required

            'dueDateLimitDays' => '1',

            'maxInstallmentCount' => '1'


        );
        $cobranca = $asaas->Cobranca()->create($dadosCobranca);
        //dd($cobranca);
        $compra->fill(['asaas_id' => $cobranca->id]);
        $compra->save();
    }
    //dd($compra);

    //dd($compra);
    $conteudos = \App\Models\Conteudo::selectRaw('ANY_VALUE(materias.name) as name, materia_id')
        ->join('materias', 'conteudos.materia_id', '=', 'materias.id')
        ->where('conteudos.edital_id', $edital)
        ->where('conteudos.cargo_id', $cargo)
        ->groupBy('conteudos.materia_id')
        ->get();


    return view('checkout', compact('compra', 'conteudos'));

})->middleware(['auth','verified']);
//Route::get('pdf/edital/{edital}/cargo/{cargo}', function ($edital, $cargo) {
//    $conteudos = \App\Models\Conteudo::selectRaw('ANY_VALUE(materias.name) as name, materia_id')
//        ->join('materias', 'conteudos.materia_id', '=', 'materias.id')
//        ->where('conteudos.edital_id', $edital)
//        ->where('conteudos.cargo_id', $cargo)
//        ->groupBy('conteudos.materia_id')
//        ->get();
//
//    $dados = [];
//    $nomeEdital = \App\Models\Edital::find($edital);
//    $nomeCargo = \App\Models\Cargo::find($cargo);
//    foreach ($conteudos as $conteudo) {
//        $dados[] = ['edital' => $edital,
//            'cargo' => $cargo,
//            'materia' => $conteudo->name,
//            'materia_id' => $conteudo->materia_id,
//        ];
//
//    }
//    $randomCode = mt_rand(100000, 999999);
//    $pdf = PDF::loadView('conteudopdf', compact('dados', 'nomeCargo', 'nomeEdital', 'randomCode'))
//        ->setPaper('a4', 'landscape');
//
//    // Gera um código aleatório de 6 dígitos
//    $message = "Mensagem no rodapé do PDF";
//    $pdf->setOption('footer-html', "<p>$message - Código: $randomCode</p>");
//
//
//    return $pdf->stream();
//
//    //return view('exibirMaterias',compact('dados','nomeCargo','nomeEdital'));
//
//})->middleware(['auth','verified']);

//Route::get('duplica', function () {
//    $conteudos = \App\Models\Conteudo::where('edital_id', 2)->where("cargo_id", 4)->where('materia_id', 8)->get();
//    foreach ($conteudos as $conteudo) {
//        $gravar = [
//
//            'edital_id' => 2,
//            'cargo_id' => 9,
//            'materia_id' => 8,
//            'conteudo' => $conteudo->conteudo
//        ];
//        \App\Models\Conteudo::create($gravar);
//
//    }
//});
Route::get('checkout/{id}/metodo/{metodo}', function ($id, $motodo, \App\Service\AsaasService $asaasService) {
    $compra = \App\Models\Compra::find($id);
    $opcao = $asaasService->opcao($motodo);

    $asaas = new Asaas(env('ASAAS_TOKEN'), env('ASAAS_AMBIENTE'));
    $cobranca = $asaas->Cobranca()->getById($compra->asaas_id);
    $dadosCobranca = array(
        'billingType' => $opcao //required
    );

    //dd($dadosCobranca);


    $cobranca = $asaas->Cobranca()->update($compra->asaas_id, $dadosCobranca);

    return redirect($cobranca->invoiceUrl);


})->middleware(['auth','verified']);



Auth::routes(['verify' => true]);


Route::get('baixar/{id}', function ($id) {
    $compra = \App\Models\Compra::find($id);
    $edital = $compra->edital_id;
    $cargo = $compra->cargo_id;

    $conteudos = \App\Models\Conteudo::selectRaw('ANY_VALUE(materias.name) as name, materia_id')
        ->join('materias', 'conteudos.materia_id', '=', 'materias.id')
        ->where('conteudos.edital_id', $edital)
        ->where('conteudos.cargo_id', $cargo)
        ->groupBy('conteudos.materia_id')
        ->get();

    $dados = [];
    $nomeEdital = \App\Models\Edital::find($edital);
    $nomeCargo = \App\Models\Cargo::find($cargo);
    foreach ($conteudos as $conteudo) {
        $dados[] = ['edital' => $edital,
            'cargo' => $cargo,
            'materia' => $conteudo->name,
            'materia_id' => $conteudo->materia_id,
        ];


    }
    $nome_arquivo = 'Edital Verticalizado - Acesso ' . auth()->user()->name . " " . auth()->user()->cpf;
    $randomCode = $compra->asaas_id . ' acesso ' . auth()->user()->name . " " . auth()->user()->cpf;
    $pdf = PDF::loadView('conteudopdf', compact('dados', 'nomeCargo', 'nomeEdital', 'randomCode'))
        ->setPaper('a4', 'landscape');


    return $pdf->stream($nome_arquivo);

})->middleware(['auth','verified']);
Route::get('minhascompras', function () {
    return view('minhascompras');
})->middleware(['auth','verified']);
Route::get('meusdados',function (){
    return view('meusdados');
})->middleware(['auth','verified']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
