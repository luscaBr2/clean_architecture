<?php

namespace Domain\ValueObjects;

use DomainException;

final class Email
{
    private string $email;

    // Validação de email, ou seja, se o email foi válido, insira-o no atributo
    // caso o email não seja válido, crie uma exception avisando o erro

    //o fato dessa validação estar no construct, faz com que toda 
    // vez que esse objeto é usado, essa validação aconteça
    public function __construct(string $email)
    {
        // Regex para garantir que o domínio seja válido
        $pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";

        //Validação básica do PHP
        if(
            !filter_var($email, FILTER_VALIDATE_EMAIL) 
            and 
            preg_match($pattern, $email) === 1 //comando para usar o Regex e validar se o domínio não tem nenhum caractere estranho
            )
            {
            throw new DomainException("O email não é válido");
        };

        $this->email = $email;
    }

    public function __toString(): string
    {
        return $this->email;
    }
}