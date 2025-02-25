<?php

namespace Application\UseCases\ExportRegistration;

// Essa classe é um DTO, ou seja, uma classe pura 
// apenas para transferir dados entre as camadas da aplicação

// nesse caso, é uma classe de input, ou seja, vai entrar dados

// não é interessante usar tipos de objetos aqui, sempre usar tipos primitivos
final class InputBondery
{
    private string $registrationNumber;
    private string $pdfFileName; // o nome do pdf vem aqui para que o use case não tenha essa informação
    private string $path;
    
    public function __construct(
        string $registrationNumber, 
        string $pdfFileName)
    {
        $this->registrationNumber = $registrationNumber;
        $this->pdfFileName = $pdfFileName;
    }

    public function getRegistrationNumber(): string
    {
        return $this->registrationNumber;
    }
    public function getPdfFileName(): string    
    {
        return $this->pdfFileName;
    }

    public function getPath()
    {
        return $this->path;
    }

}