<?php
declare(strict_types=1);
namespace Application\UseCases\ExportRegistration;

use DateTime;
use Domain\Repositories\LoadRegistrationRepository;
use Domain\ValueObjects\Cpf;

final class ExportRegistration
{
    //LoadRegistrationRepository é uma abstração, uma interface, localizada em Domain/Repositories/LoadRegistrationRepository.php

    private LoadRegistrationRepository $repository;
    public function __construct(LoadRegistrationRepository $repository)
    {
        $this->repository = $repository;
    }
    public function handle(InputBondery $input): OutputBondery
    {
        // é interessante colocar um try catch aqui para tratar exceções envolvendo o CPF e email

        $cpf = new Cpf($input->getRegistrationNumber());
        $registration = $this->repository->loadbyRegistrationNumber($cpf);

        // Como outputBondery recebe um array, então criei um array implicito em seus parametros
        return new OutputBondery([
            "name"=> $registration->getName(),
            "email"=> (string)$registration->getEmail(),
            "birthDate"=> $registration->getBirthDate()->format(DateTime::ATOM), // DATETIME do formato ISO
            "registrationNumber"=> (string)$registration->getRegistrationNumber(),
            "registrationAt"=> $registration->getRegistrationAt()->format(DateTime::ATOM)
        ]);
    }
}