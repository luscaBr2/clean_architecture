<?php

namespace Domain\Entities;

require_once 'Domain\ValueObjects\Cpf.php';
require_once 'Domain\ValueObjects\Email.php';

use DateTimeInterface;
use Domain\ValueObjects\Cpf;
use Domain\ValueObjects\Email;

final class Registration
{
    private string $nome;
    private Email $email;
    private Cpf $registrationNumber;
    private DateTimeInterface $birthDate;
    private DateTimeInterface $registrationAt; // data na qual o registro foi feito

    // GETTERS e SETTERS
    public function getName(): string
    {
        return $this->nome;
    }

    // Em todos os SETTERS dessa classe, eles atribuem o valor desejado e retornam um Registration, 
    // para usar a propriedade de fluent Setters usada no index.php
    public function setName(string $nome): Registration
    {
        $this->nome = $nome;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): Registration
    {
        $this->email = new Email($email);
        return $this;
    }

    public function getRegistrationNumber(): Cpf
    {
        return $this->registrationNumber;
    }

    public function setRegistrationNumber(string $cpf): Registration
    {
        $this->registrationNumber = new Cpf($cpf);
        return $this;
    }

    public function getBirthDate(): DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(DateTimeInterface $birthDate): Registration
    {
        // Caso seja uma regra que o registro só é feito para pessoas 
        // com mais de 18 anos, a validação iria nessa parte do código

        $this->birthDate = $birthDate;
        return $this;
    }

    public function getRegistrationAt(): DateTimeInterface
    {
        return $this->registrationAt;
    }

    public function setRegistrationAt(DateTimeInterface $registrationAt): Registration
    {
        $this->registrationAt = $registrationAt;
        return $this;
    }



}