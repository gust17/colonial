<?php

namespace App\Service;

class AsaasService
{
    public function opcao($id)
    {
        switch ($id) {

            case 1:
                return 'BOLETO';
                break;
            case 2:
                return 'CREDIT_CARD';
                break;
            case 3:
                return 'PIX';
                break;
        }
    }
}
