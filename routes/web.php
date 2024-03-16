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
Route::prefix('admin')->middleware(['admin'])->group(function () {
    // Rotas que requerem admin
    Route::get('users', function () {
        $users = \App\Models\User::all();
        return view('adm.user.index', compact('users'));
    });
    Route::get('compras', function () {
        $compras = \App\Models\Compra::all();
        return view('adm.compras.index', compact('compras'));
    });
    Route::get('compras/ativa/{id}', function ($id) {
        $compras = \App\Models\Compra::find($id);
        $compras->update(['status' => 1]);
        $user = $compras->user; // Supondo que $purchase seja a instância do modelo de compra
        $link = url('baixar', $compras->id);
        //dd($link);
        // Link para a página de conta do usuário

        \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\ObrigadoEmail($user, $link));


        return redirect()->back();
        //return view('adm.compras.index', compact('compras'));
    });
    Route::get('compras/deletar/{id}', function ($id) {
        $compras = \App\Models\Compra::find($id);

        $compras->delete();


        return redirect()->back();
        //return view('adm.compras.index', compact('compras'));
    });
    // Exemplo de rota dentro do grupo admin
//    Route::get('dashboard', 'AdminController@dashboard')->name('admin.dashboard');
//    Route::get('users', 'AdminController@listUsers')->name('admin.users.list');
//    Route::get('settings', 'AdminController@settings')->name('admin.settings');
    // Outras rotas admin...
});

Route::get('/home', function () {
    $comprasAtivas = auth()->user()->compras->where('status', 1);
    $editals = \App\Models\Edital::with(['cargos' => function ($query) {
        $query->orderBy('name');

        //dd($compraAtivas);
    }])->where('ativo', 1)->get();

    //dd($comprasAtivas);

    return view('index', compact('editals', 'comprasAtivas'));
})->middleware(['auth', 'verified']);
Route::get('/', function () {
    $editals = \App\Models\Edital::with(['cargos' => function ($query) {
        $query->orderBy('name');
    }])->where('ativo', 1)->get();
    $passados = \App\Models\Edital::with(['cargos' => function ($query) {
        $query->orderBy('name');
    }])->where('ativo', 0)->get();
    return view('site.index', compact('editals', 'passados'));
});


####### Filiados ##############

Route::get('/meu-link/{code}', function ($code) {
    $usuario = \App\Models\User::where('code', $code)->first();
    if (!$usuario) {
        return redirect(url('/'));
    }
    $usuario->update(['clique' => $usuario->clique + 1]);
    Session::put('code', $usuario->code);

    $code = Session::get('code');

    //dd($code);

    $editals = \App\Models\Edital::with(['cargos' => function ($query) {
        $query->orderBy('name');
    }])->where('ativo', 1)->get();
    $passados = \App\Models\Edital::with(['cargos' => function ($query) {
        $query->orderBy('name');
    }])->where('ativo', 0)->get();
    return view('site.parceiro', compact('editals', 'passados', 'usuario'));
});

####################################
use Smalot\PdfParser\Parser;

Route::post('orgao/create', function (\Illuminate\Http\Request $request) {
    $orgao = \App\Models\Orgao::create($request->all());
    return redirect()->back();
});
Route::post('cargo/create', function (\Illuminate\Http\Request $request) {
    $cargo = \App\Models\Cargo::create($request->all());
    return redirect()->back();
});
Route::post('edital/create', function (\Illuminate\Http\Request $request) {
    $edital = \App\Models\Edital::create($request->all());
    return redirect()->back();
});
Route::post('materia/create', function (\Illuminate\Http\Request $request) {
    $materia = \App\Models\Materia::create($request->all());
    return redirect()->back();
});


Route::get('teste', function () {

    $cargos = \App\Models\Cargo::all();
    $editals = \App\Models\Edital::all();
    $materias = \App\Models\Materia::all();
    $orgaos = \App\Models\Orgao::all();
    return view('testeindex', compact('editals', 'cargos', 'materias', 'orgaos'));
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
Route::post('gravaConteudo', function (\Illuminate\Http\Request $request, \App\Service\SepararService $separarService) {


    $texto = $request->conteudo;
    //dd($texto);


    $texto = $separarService->formatarTexto($texto);

    //dd($texto);

    //dd($request->all());

    $edital_id = $request->edital_id;
    $cargo_id = $request->cargo_id;
    $material_id = $request->material_id;
    // dd($edital_id,$cargo_id,$material_id);
    preg_match_all("/(?:\d+\.\d+|n\. \d+\/\d+|[^.()]+(?:\([^)]+\))?)\s*/s", $texto, $matches);


    return view('conteudo', compact('matches', 'edital_id', 'cargo_id', 'material_id'));
});


Route::post('finalizaEdital', function (\Illuminate\Http\Request $request) {
    $conteudos = array_filter($request->conteudo, function ($value) {
        return !is_null($value);
    });
    //dd($request->all());
    //dd($conteudos);
    foreach ($conteudos as $conteudo) {

        //$buscaconteudo = \App\Models\Conteudo::where('conteudo',$conteudo)->first();
        //dd($buscaconteudo);
        //$buscaconteudo->delete();
        $gravar = [

            'edital_id' => $request->edital_id,
            'cargo_id' => $request->cargo_id,
            'materia_id' => $request->material_id,
            'conteudo' => $conteudo
        ];
        //dd($gravar);
        \App\Models\Conteudo::create($gravar);
    }

    return redirect(url('teste'));

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


    if (!$user->asaas_client) {
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


    $buscaEdital = \App\Models\Edital::find($edital);


    $compra = \App\Models\Compra::where('cargo_id', $cargo)->where('edital_id', $edital)->where('user_id', auth()->user()->id)->first();

    if (!$compra) {
        $compra = \App\Models\Compra::create(
            [
                'edital_id' => $edital,
                'cargo_id' => $cargo,
                'user_id' => auth()->user()->id,
                'valor' => $buscaEdital->valor
            ]
        );

        //dd($compra);
    } else {
        //return redirect(url('minhascompras'));
    }


    $orgaoCobra = $compra->edital->orgao->name;

    $cargoCobra = $compra->cargo->name;
    $compra = \App\Models\Compra::find($compra->id);
    if (!$compra->asaas_id) {


        $dadosCobranca = array(
            'customer' => $user->asaas_client,
            'name' => 'Pagamento Referente a verticalização do Edital',
            'description' => "Edital do $orgaoCobra $cargoCobra",
            'dueDate' => \Carbon\Carbon::now()->addDays(2)->format('Y-m-d'),
            'value' => $compra->valor,

            'billingType' => 'UNDEFINED', //required

            'chargeType' => 'DETACHED', //required

            'dueDateLimitDays' => '1',

            'maxInstallmentCount' => '1'


        );


        $cobranca = $asaas->Cobranca()->create($dadosCobranca);
        //dd($cobranca);
        $compra->update(['asaas_id' => $cobranca->id]);

    }


    $conteudos = \App\Models\Conteudo::selectRaw('ANY_VALUE(materias.name) as name, materia_id')
        ->join('materias', 'conteudos.materia_id', '=', 'materias.id')
        ->where('conteudos.edital_id', $edital)
        ->where('conteudos.cargo_id', $cargo)
        ->groupBy('conteudos.materia_id')
        ->get();


    return view('checkout', compact('compra', 'conteudos'));

})->middleware(['auth', 'verified']);
Route::get('detalhes/{edital}/cargo/{cargo}', function ($edital, $cargo) {


    $cargoBusca = \App\Models\Cargo::find($cargo);
    $editalBusca = \App\Models\Edital::find($edital);
    $conteudos = \App\Models\Conteudo::selectRaw('ANY_VALUE(materias.name) as name, materia_id')
        ->join('materias', 'conteudos.materia_id', '=', 'materias.id')
        ->where('conteudos.edital_id', $edital)
        ->where('conteudos.cargo_id', $cargo)
        ->groupBy('conteudos.materia_id')
        ->get();


    return view('detalhes', compact('cargoBusca', 'editalBusca', 'conteudos'));

})->middleware(['auth', 'verified']);

Route::get('edital/detalhes/{slug}', function ($slug) {

    //dd($slug);
    $edital = \App\Models\Edital::where('slug', $slug)->first();

    if (!$edital) {
        return redirect()->route('acesso.negado');
    }

    $cargosOrdenados = $edital->cargos()->orderBy('name')->get();;


    return view('site.edital-detalhes', compact('cargosOrdenados', 'edital'));

});
Route::get('open/detalhes/{edital}/cargo/{cargo}', function ($edital, $cargo) {


    $cargoBusca = \App\Models\Cargo::find($cargo);
    $editalBusca = \App\Models\Edital::find($edital);
    $conteudos = \App\Models\Conteudo::selectRaw('ANY_VALUE(materias.name) as name, materia_id')
        ->join('materias', 'conteudos.materia_id', '=', 'materias.id')
        ->where('conteudos.edital_id', $edital)
        ->where('conteudos.cargo_id', $cargo)
        ->groupBy('conteudos.materia_id')
        ->get();


    return view('site.detalhes', compact('cargoBusca', 'editalBusca', 'conteudos'));

});
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

Route::get('duplica', function () {
    $materias = \App\Models\Materia::whereIn('id', [4, 5, 55])->get();
    $cargos = \App\Models\Cargo::whereIn('id', [57])->get();
    //dd($cargos);
    foreach ($materias as $materia) {
        $conteudos = \App\Models\Conteudo::where('edital_id', 5)->where("cargo_id", 36)->where('materia_id', $materia->id)->get();

        foreach ($conteudos as $conteudo) {
            foreach ($cargos as $cargo) {
                $gravar = [

                    'edital_id' => 5,
                    'cargo_id' => $cargo->id,
                    'materia_id' => $materia->id,
                    'conteudo' => $conteudo->conteudo
                ];
                \App\Models\Conteudo::create($gravar);

            }

            //

        }


    }


});
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


})->middleware(['auth', 'verified']);


Auth::routes(['verify' => true]);


Route::get('baixar/{id}', function ($id) {
    $compra = \App\Models\Compra::find($id);

    if (auth()->user()->id == $compra->user_id && $compra->status == 1) {
        $compra->update(['contador' => ($compra->contador + 1)]);
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
    } else {
        return redirect()->route('acesso.negado');
    }


    return $pdf->stream($nome_arquivo);

})->middleware(['auth', 'verified']);
Route::get('minhascompras', function () {
    return view('minhascompras');
})->middleware(['auth', 'verified']);
Route::get('meusdados', function () {
    return view('meusdados');
})->middleware(['auth', 'verified']);


Route::get('proibido', function () {
    return view('acesso.negado');
})->name('acesso.negado');

Route::get('privacidade', function () {
    return view('site.privacidade');
});
Route::get('reembolso', function () {
    return view('site.reembolso');
});

Route::get('gerar-slug', function () {
    $editals = \App\Models\Edital::all();
    foreach ($editals as $edital) {
        //dd($edital);
        $slug = \Illuminate\Support\Str::slug($edital->orgao->name . '-' . $edital->ano);
        $edital->update(['slug' => $slug]);
    }
});

Route::get('meus-filiados', function () {
    return view('filiados.index');
});

Route::get('extrato', function () {
    return view('filiados.extrato');
})->middleware(['auth', 'verified']);;
Route::post('realizar-saque', [\App\Http\Controllers\ExtratoController::class, 'store'])->middleware(['auth', 'verified']);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
