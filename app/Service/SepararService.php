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

    function formatarTexto($texto) {
        // Divide o texto em um array de strings usando o ponto e o ponto e vírgula como delimitadores
        $arrayTexto = preg_split('/[.;]/', $texto);

        // String para armazenar o texto formatado
        $textoFormatado = '';

        // Percorre o array e formata o texto
        foreach ($arrayTexto as $frase) {
            // Remove espaços em branco extras do início e do final da frase
            $frase = trim($frase);

            // Se a frase não estiver vazia, adiciona um ponto no final
            if (!empty($frase)) {
                $textoFormatado .= $frase . '. ';
            }
        }

        // Retorna o texto formatado removendo o espaço extra no final
        return rtrim($textoFormatado);
    }




}
