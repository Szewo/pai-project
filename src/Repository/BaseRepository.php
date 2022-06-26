<?php

namespace App\Repository;

use App\Config;
use App\Database;

class BaseRepository
{
    protected Database $database;

    public function __construct()
    {
        $this->database = new Database(new Config());
    }

    protected function getPdo(): \PDO
    {
        return $this->database->getConnection();
    }

}