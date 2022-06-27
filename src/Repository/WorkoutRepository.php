<?php

namespace App\Repository;

use App\Models\Workout;
use Exception;
use PDO;

class WorkoutRepository extends BaseRepository
{
    public function addWorkout(Workout $workout): void
    {
        $sql = 'INSERT INTO workouts(name, date, id_user) VALUES (?,?,?)';
        $db = $this->getPdo()->prepare($sql);
        $db->execute([
            $workout->getName(),
            $workout->getDate()->format('Y-m-d'),
            $workout->getUserId(),
        ]);
    }

    /**
     * @throws Exception
     */
    public function getAllWorkouts(): array {
        $sql = 'SELECT * FROM workouts';
        $workouts = $this->getPdo()->query($sql)->fetchAll();
        $workoutsArray = [];

        foreach ($workouts as $key => $value) {
            $workoutsArray[$key] = new Workout($value['name'], $value['date'], $value['id_user'], $value['id']);
        }

        return $workoutsArray;
    }

    /**
     * @throws Exception
     */
    public function getWorkoutById(int $workoutId): ?Workout {
        $sql = 'SELECT * FROM workouts WHERE id = :id';
        $db = $this->getPdo()->prepare($sql);
        $db->bindValue(':id', $workoutId);
        $db->execute();

        $workout = $db->fetch(PDO::FETCH_ASSOC);

        if (!$workout) {
            return NULL;
        }

        return new Workout(
            $workout['name'],
            $workout['date'],
            $workout['id_user'],
            $workout['id'],
        );
    }

}