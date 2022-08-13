<?php

class Comment
{
    private $id;
    private $body;

    public function __construct($id = 0, $body = "")
    {
        $this->id = $id;
        $this->body = $body;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setBody($body)
    {
       $this->body = $body;
    }

    public function getBody()
    {
        return $this->body;
    }
}