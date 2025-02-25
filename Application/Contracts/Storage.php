<?php

declare(strict_types=1);

namespace Application\UseCases\ExportRegistration;


// responsável por crie e armazene o PDF
interface Storage
{
    public function store(string $fileName, string $path ,string $content);
}