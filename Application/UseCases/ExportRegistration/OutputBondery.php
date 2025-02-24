<?php

namespace Application\UseCases\ExportRegistration;

// Essa classe é um DTO, ou seja, uma classe pura 
// apenas para transferir dados entre as camadas 
// da aplicação

// nesse caso é uma classe de output, ou seja, vai sair dados 

// não é interessante usar tipos de objetos aqui, sempre usar tipos primitivos
final class OutputBondery
{
    // são os mesmos atributos de Registrantion porém com tipos primitivos(string)

    private string $nome;
    private string $email;
    private string $registrationNumber;
    private string $birthDate;
    private string $registrationAt; // data na qual o registro foi feito

    public function __construct(array $values)
    {
        // existem jeitos melhores de fazer isso mas para fins didáticos deixarei assim mesmo :)

        $this->nome = $values["nome"] ?? '';
        $this->email = $values["email"] ?? '';
        $this->registrationNumber = $values["registrationNumber"] ?? '';
        $this->birthDate = $values["birthDate"] ?? '';
        $this->registrationAt = $values["registrationAt"] ?? '';
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome($nome): static
    {
        $this->nome = $nome;

        return $this;
    }
    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail($email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getRegistrationNumber(): string
    {
        return $this->registrationNumber;
    }

    public function setRegistrationNumber($registrationNumber): static
    {
        $this->registrationNumber = $registrationNumber;

        return $this;
    }

    public function getBirthDate(): string
    {
        return $this->birthDate;
    }

    public function setBirthDate($birthDate): static
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function getRegistrationAt(): string
    {
        return $this->registrationAt;
    }

    public function setRegistrationAt($registrationAt): static
    {
        $this->registrationAt = $registrationAt;

        return $this;
    }
}