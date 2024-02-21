<?php

namespace App\Service;

class SepararService
{
    function separarPorTopicos($texto) {
        $topicos = [];
        $topicoAtual = '';

        // Dividir o texto em linhas
        $linhas = explode("\n", $texto);

        // Iterar sobre cada linha
        foreach ($linhas as $linha) {
            // Verificar se a linha começa com um número seguido de ponto
            if (preg_match('/^\d+\.\s*/', $linha)) {
                // Se o tópico atual não estiver vazio, adicione-o aos tópicos
                if (!empty($topicoAtual)) {
                    $topicos[] = trim($topicoAtual);
                }
                // Inicie um novo tópico com a linha atual
                $topicoAtual = $linha;
            } else {
                // Adicione a linha ao tópico atual
                $topicoAtual .= "\n" . $linha;
            }
        }

        // Adicione o último tópico aos tópicos
        if (!empty($topicoAtual)) {
            $topicos[] = trim($topicoAtual);
        }

        return $topicos;
    }




}
