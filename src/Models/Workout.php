<?php

namespace App\Models;

use DateTime;
use Exception;

class Workout
{
    private string $name;
    private DateTime $date;
    private int $userId;
    private ?int $id;

    /**
     * @param string $name
     * @param string $date
     * @throws Exception
     */
    public function __construct(string $name, string $date, int $userId, int $id = NULL)
    {
        $this->name = $name;
        $this->date = new DateTime($date);
        $this->userId = $userId;
        $this->id = $id;
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

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }


}