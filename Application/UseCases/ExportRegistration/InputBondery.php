<?php

namespace Application\UseCases\ExportRegistration;

// Essa classe é um DTO, ou seja, uma classe pura 
// apenas para transferir dados entre as camadas da aplicação

// nesse caso, é uma classe de input, ou seja, vai entrar dados

// não é interessante usar tipos de objetos aqui, sempre usar tipos primitivos
final class InputBondery
{
    private string $registrationNumber;
    
    public function __construct(string $registrationNumber)
    {
        $this->registrationNumber = $registrationNumber;
    }

    public function getRegistrationNumber(): string
    {
        return $this->registrationNumber;
    }
}