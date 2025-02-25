<?php

namespace Application\UseCases\ExportRegistration;

// Essa classe é um DTO, ou seja, uma classe pura 
// apenas para transferir dados entre as camadas 
// da aplicação

// nesse caso é uma classe de output, ou seja, vai sair dados 

// não é interessante usar tipos de objetos aqui, sempre usar tipos primitivos
final class OutputBondery
{
    private string $fullPathName;

    public function __construct(string $fullPathName){
        $this->name = $fullPathName;
    }
}