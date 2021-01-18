<?php

require_once __DIR__.'/../../Database.php';

class Repository {
    protected $connection;

    public function __construct()
    {
        $database = new Database();
        $this->connection = $database->connect();
    }
}