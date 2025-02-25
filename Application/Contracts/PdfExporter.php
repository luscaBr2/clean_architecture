<?php
declare(strict_types=1);
namespace Application\Contracts;

interface PdfExporter
{
    public function generate(array $data): string
    {
        
    }
}