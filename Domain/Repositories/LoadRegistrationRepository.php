<?php
declare(strict_types=1);
namespace Domain\Repositories;

use Domain\Entities\Registration;

interface LoadRegistrationRepository
{
    public function loadbyRegistrationNumber(Cpf $cpf): Registration
    {
        
    }
}