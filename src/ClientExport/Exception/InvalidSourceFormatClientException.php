<?php

namespace App\ClientExport\Exception;

class InvalidSourceFormatClientException extends \InvalidArgumentException
{
    public function __construct()
    {
        parent::__construct("The input argument has invalid format");
    }
}