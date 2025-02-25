<?php

require "Domain/Entities/Registration.php";
use Application\UseCases\ExportRegistration\ExportRegistration;
use Application\UseCases\ExportRegistration\InputBondery;
use Domain\Entities\Registration;

$registration = new Registration();

// o ato de setar os valores em cascata tem o name de "fluent setter"
$registration->setName("Lucas Santos")
    ->setEmail("lucas.ifsp387@gmail.com")
    ->setBirthDate(new DateTimeImmutable("2004-01-01"))
    ->setRegistrationAt(new DateTimeImmutable("")) //se não colocar nada, o php pega a data atual
    ->setRegistrationNumber("01234567890"); 

// echo "<pre>"; print_r($registration); echo "</pre>";

$exportRegistrationUseCases = new ExportRegistration();

$inputBoundery = new InputBondery("01234567890", );

$outputBoundery = $exportRegistrationUseCases->handle($inputBoundery);

echo "<pre>"; print_r($outputBoundery); echo "</pre>";