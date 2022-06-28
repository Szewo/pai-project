<?php

namespace App\Models;

class Exercise
{
    private string $name;
    private int $sets;
    private int $repetitions;
    private string $weight;
    private int $break;
    private ?int $workout_id;
    private ?int $id;

    /**
     * @param string $name
     * @param int $sets
     * @param int $repetitions
     * @param string $weight
     * @param int $break
     * @param int|null $workout_id
     * @param int|null $id
     */
    public function __construct(string $name, int $sets, int $repetitions, string $weight, int $break, ?int $workout_id = null, ?int $id = null)
    {
        $this->name = $name;
        $this->sets = $sets;
        $this->repetitions = $repetitions;
        $this->weight = $weight;
        $this->break = $break;
        $this->workout_id = $workout_id;
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
     * @return int
     */
    public function getSets(): int
    {
        return $this->sets;
    }

    /**
     * @param int $sets
     */
    public function setSets(int $sets): void
    {
        $this->sets = $sets;
    }

    /**
     * @return int
     */
    public function getRepetitions(): int
    {
        return $this->repetitions;
    }

    /**
     * @param int $repetitions
     */
    public function setRepetitions(int $repetitions): void
    {
        $this->repetitions = $repetitions;
    }

    /**
     * @return string
     */
    public function getWeight(): string
    {
        return $this->weight;
    }

    /**
     * @param string $weight
     */
    public function setWeight(string $weight): void
    {
        $this->weight = $weight;
    }

    /**
     * @return int
     */
    public function getBreak(): int
    {
        return $this->break;
    }

    /**
     * @param int $break
     */
    public function setBreak(int $break): void
    {
        $this->break = $break;
    }

    /**
     * @return int|null
     */
    public function getWorkoutId(): ?int
    {
        return $this->workout_id;
    }

    /**
     * @param int|null $workout_id
     */
    public function setWorkoutId(?int $workout_id): void
    {
        $this->workout_id = $workout_id;
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