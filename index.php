<?php

require "Domain/Entities/Registration.php";
use Domain\Entities\Registration;

$registration = new Registration();

// o ato de setar os valores em cascata tem o nome de "fluent setter"
$registration->setName("Lucas Santos")
    ->setEmail("lucas.ifsp387@gmail.com")
    ->setBirthDate(new DateTimeImmutable("2004-01-01"))
    ->setRegistrationAt(new DateTimeImmutable("")) //se não colocar nada, o php pega a data atual
    ->setRegistrationNumber("01234567890"); 

// echo "<pre>"; print_r($registration); echo "</pre>";

