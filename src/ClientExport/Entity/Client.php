<?php

namespace App\ClientExport\Entity;

use App\ClientExport\Exception\InvalidSourceFormatClientException;

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

    /**
     * @param array $client
     * @return static
     * @throws InvalidSourceFormatClientException
     */
    public static function fromJson(array $client): self
    {
        if (
            !isset($client['name']) ||
            !isset($client['email']) ||
            !isset($client['phone']) ||
            !isset($client['company']) ||
            !isset($client['company']['name'])
        ) {
            throw new InvalidSourceFormatClientException();
        }

        return new static(
            $client['name'],
            $client['email'],
            $client['phone'],
            $client['company']['name']
        );
    }

    public static function fromXml(\SimpleXMLElement $client): self
    {
        if (
            !isset($client->attributes()['name']) ||
            !isset($client->attributes()['phone']) ||
            !isset($client->attributes()['company']) ||
            empty($client->__toString())
        ) {
            throw new InvalidSourceFormatClientException();
        }

        return new static(
            $client->attributes()['name'],
            $client,
            $client->attributes()['phone'],
            $client->attributes()['company']
        );
    }

}