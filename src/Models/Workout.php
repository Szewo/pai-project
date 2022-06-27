<?php

namespace App\Models;

use DateTime;
use Exception;

class Workout
{
    private string $name;

    private DateTime $date;

    private int $userId;

    /**
     * @param string $name
     * @param string $date
     * @throws Exception
     */
    public function __construct(string $name, string $date, int $userId)
    {
        $this->name = $name;
        $this->date = new DateTime($date);
        $this->userId = $userId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return DateTime
     */
    public function getDate(): DateTime
    {
        return $this->date;
    }

    /**
     * @param string $date
     * @throws Exception
     */
    public function setDate(string $date): void
    {
        $this->date = new DateTime($date);
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }
}