<?php

namespace App;

require_once '../config.php';

class Config
{
    public function getDbConfig(): string
    {
        return "pgsql:host=" . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME;
    }

    public function getDbUser(): string {
        return DB_USER;
    }

    public function getDbPassword(): string {
        return DB_PASSWORD;
    }
}