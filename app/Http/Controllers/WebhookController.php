<?php

namespace App\Http\Controllers;


use App\Models\Compra;
use App\Services\WhatsappService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WebhookController extends Controller
{

    public function recebe(Request $request)
    {
        //dd($request->all());
        try {
            // Obtenha os dados brutos da requisição
            $data = $request->getContent();

            // Verifique se os dados não estão vazios
            if (!empty($data)) {
                // Decodifique os dados, independentemente do formato
                $decodedData = json_decode($data, true);

                // Verifique se a decodificação foi bem-sucedida
                if ($decodedData !== null) {
                    // Verifique se a chave 'event' existe no JSON decodificado
                    if (isset($decodedData['event'])) {
                        if ($decodedData['event'] == 'PAYMENT_RECEIVED' || $decodedData['event'] == 'PAYMENT_CONFIRMED') {

                            $id = $decodedData['payment']['id'];

                            //($id);

                            $fatura = Compra::where("asaas_id", $id)->first();
                            if (!$fatura){
                                return response()->json(['message' => 'sem retorno'], 200);
                            }
                            $fatura->update(['status' => 1]);
                            $hoje = Carbon::now();
                            $fatura->update(['data_pagamento' => $hoje]);
                            $user = $fatura->user;


                            $link = url('baixar', $fatura->id);
                            \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\ObrigadoEmail($user, $link));



                        } elseif ($decodedData['event'] == 'PAYMENT_CREATED') {
                            // Execute algo específico para 'PAYMENT_CREATED'
                        }
                    }
                }
            }


            // Qualquer valor de 'event' (ou se 'event' não está definido) retorna um status 200 OK
            return response()->json(['message' => 'Webhook received and processed agora'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error processing the webhook'], 500);
        }
    }
}
