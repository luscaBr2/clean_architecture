<?php
declare(strict_types=1);
namespace Application\UseCases\ExportRegistration;

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
        return new OutputBondery();
    }
}