<?php

namespace App\Http\Controllers;

use App\Models\Cesta;
use Illuminate\Http\Request;

class CestaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cestas.store');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $uploadedFile = $request->file('image');
        //dd($uploadedFile);
        $nomeArquivo = $uploadedFile->getClientOriginalName(); // Obtém o nome original do arquivo
        $path = $uploadedFile->store();

        //$request->image = $path;
        //dd($request->all());
        Cesta::create([
            'name' => $request['name'],
            'price' => $request['price'],
            'description' => $request['description'],
            'image' => $path,
            'recorrencia' => $request['recorrencia'],
        ]);

        return redirect()->back()->with('success', 'Arquivo enviado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cesta $cesta)
    {

        return view('site.edital-detalhes', compact('cesta'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cesta $cesta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cesta $cesta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cesta $cesta)
    {
        //
    }
}
