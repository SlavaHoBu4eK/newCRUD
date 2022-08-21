<?php

class Client
{
    private int $id;
    private ?string $last_name;
    private ?string $name;
    private ?string $middle_name;
    private ?string $birthday;
    private ?string $phone;



    public function __construct(
        ?string $last_name = null,
        ?string $name = null,
        ?string $middle_name = null,
        ?string $birthday = null,
        ?string $phone = null


    )
    {
        $this->last_name = $last_name;
        $this->name = $name;
        $this->middle_name = $middle_name;
        $this->birthday = $birthday;
        $this->phone = $phone;

    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setLastName(string $last_name): void
    {
        $this->last_name = $last_name;
    }

    public function getLastName(): string
    {
        return $this->last_name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setMiddleName(string $middle_name): void
    {
        $this->middle_name = $middle_name;
    }

    public function getMiddleName(): string
    {
        return $this->middle_name;
    }

    public function setBirthday(string $birthday): void
    {
        $this->birthday = $birthday;
    }

    public function getBirthday(): string
    {
        return $this->birthday;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }
}

