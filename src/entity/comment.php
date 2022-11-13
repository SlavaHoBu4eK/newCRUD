<?php

class Comment
{
    private int $id;
    private ?int $client_id;
    private ?string $body;


    public function __construct(
        ?string $body = null,
        ?int $client_id  = null
    )
    {
        $this->body = $body;
        $this->client_id = $client_id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setBody(string $body): void
    {
        $this->body = $body;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function setClientId(int $clientId): void
    {
        $this->client_id = $clientId;
    }

    public function getClientId(): int
    {
        return $this->client_id;
    }
}