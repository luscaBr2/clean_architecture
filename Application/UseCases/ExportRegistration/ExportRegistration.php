<?php
declare(strict_types=1);
namespace Application\UseCases\ExportRegistration;

use Application\Contracts\PdfExporter;
use DateTime;
use Domain\Repositories\LoadRegistrationRepository;
use Domain\ValueObjects\Cpf;

final class ExportRegistration
{
    //LoadRegistrationRepository é uma abstração, uma interface, localizada em Domain/Repositories/LoadRegistrationRepository.php

    private LoadRegistrationRepository $repository;
    private PdfExporter $pdfExporter;
    private Storage $storage;
    public function __construct(
        LoadRegistrationRepository $repository,
        PdfExporter $pdfExporter, // responsável por exportar o PDF
        Storage $storage //responsável por armazenar o PDF em algum lugar
        )
    {
        $this->pdfExporter = $pdfExporter;
        $this->storage = $storage;
        $this->repository = $repository;
    }
    public function handle(InputBondery $input): OutputBondery
    {
        // é interessante colocar um try catch aqui para tratar exceções envolvendo o CPF e email

        $cpf = new Cpf($input->getRegistrationNumber());
        $registration = $this->repository->loadbyRegistrationNumber($cpf);

        $registrationArray = [
            "name"=> $registration->getName(),
            "email"=> (string)$registration->getEmail(),
            "birthDate"=> $registration->getBirthDate()->format(DateTime::ATOM), // DATETIME do formato ISO
            "registrationNumber"=> (string)$registration->getRegistrationNumber(),
            "registrationAt"=> $registration->getRegistrationAt()->format(DateTime::ATOM)
        ];

        $fileContent = $this->pdfExporter->generate($registrationArray);
        $this->storage->store($input->getPdfFileName(), $input->getPath(), $fileContent);

        return new OutputBondery($input->getPath() . DIRECTORY_SEPARATOR . $input->getPdfFileName());
    }
}