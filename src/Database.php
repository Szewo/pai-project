<?php

namespace App;

use PDO;
use PDOException;

class Database
{
    private PDO $connection;

    public function __construct(Config $config)
    {
        try {
            $this->connection = new PDO($config->getDbConfig(), $config->getDbUser(), $config->getDbPassword(),
                $this->getPdoOptions());
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    private function getPdoOptions(): array
    {
        return [
            "sslmode"  => "prefer"
        ];
    }

    /**
     * @return PDO
     */
    public function getConnection(): PDO
    {
        return $this->connection;
    }


}