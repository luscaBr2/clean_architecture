<?php

declare(strict_types= 1);

namespace Domain\ValueObjects;

use DomainException;

final class Cpf
{
    private string $cpf;

    public function __construct(string $cpf)
    {
        // Aqui vai a validação de um CPF

        // Caso o CPF informado seja válido, insira o cpf
        // Caso não seja válido, crie uma Exception alegando o CPF não ser válido
        if (!$this->validaCPF($cpf)) 
        {
            throw new DomainException("O CPF não é válido");
        }

        // Atribuição do cpf caso
        $this->cpf = $cpf;
    }

    public function __tostring(): string
    {
        return $this->cpf;
    }

    private function validaCPF($cpf): bool 
    {
        // Extrai somente os números
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
         
        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }
    
        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
    
        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    }
}