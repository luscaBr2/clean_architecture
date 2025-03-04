<?php

namespace Domain\Entities;

require_once 'Domain\ValueObjects\Cpf.php';
require_once 'Domain\ValueObjects\Email.php';

use DateTimeInterface;
use Domain\ValueObjects\Cpf;
use Domain\ValueObjects\Email;

final class Registration
{
    private string $name;
    private Email $email;
    private Cpf $registrationNumber;
    private DateTimeInterface $birthDate;
    private DateTimeInterface $registrationAt; // data na qual o registro foi feito

    // GETTERS e SETTERS
    public function getName(): string
    {
        return $this->name;
    }

    // Em todos os SETTERS dessa classe, eles atribuem o valor desejado e retornam um Registration, 
    // para usar a propriedade de fluent Setters usada no index.php
    public function setName(string $name): Registration
    {
        $this->name = $name;
        return $this;
    }

    public function getEmail(): Email
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