<?php

namespace App\ClientExport\Entity;

class Client
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $email;
    /**
     * @var string
     */
    private $phone;
    /**
     * @var string
     */
    private $companyName;

    /**
     * Client constructor.
     * @param string $name
     * @param string $email
     * @param string $phone
     * @param string $companyName
     */
    public function __construct(string $name, string $email, string $phone, string $companyName)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->companyName = $companyName;
    }

    public function toArray()
    {
        return [
            $this->name,
            $this->email,
            $this->phone,
            $this->companyName
        ];
    }

}