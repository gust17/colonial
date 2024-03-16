<?php

namespace App\Http\Controllers;

use App\Models\Extrato;
use Illuminate\Http\Request;

class ExtratoController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'valor_solicitado' => [
                'required',
                'numeric',
                'min:0.01', // Garante que o valor seja maior que zero
                function ($attribute, $value, $fail) {
                    if ($value > auth()->user()->SaldoDisponivel()) {
                        $fail('O valor solicitado não pode ser maior que o saldo disponível.');
                    }
                },
            ],
        ]);


        $grava = [
            'tipo' => 1,
            'user_id' => auth()->user()->id,
            'valor' => floatval($request->valor_solicitado),
            'descricao' => 'Solicitação de Saque',
            'status' => 0
        ];

        $extrato = Extrato::create($grava);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Extrato $extrato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Extrato $extrato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Extrato $extrato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Extrato $extrato)
    {
        //
    }
}
