<?php

namespace App\Models;

use DateTime;
use Exception;

class Workout
{
    private string $name;

    private DateTime $date;

    /**
     * @param string $name
     * @param string $date
     * @throws Exception
     */
    public function __construct(string $name, string $date)
    {
        $this->name = $name;
        $this->date = new DateTime($date);
        $this->date->format('Y-m-d');
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




}