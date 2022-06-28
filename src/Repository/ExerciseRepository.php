<?php

namespace App\Repository;

use App\Models\Exercise;

class ExerciseRepository extends BaseRepository
{
    public function addWorkout(Exercise $exercise): void
    {
        $sql = 'INSERT INTO 
                exercises(id_workout, name, sets, repetitions, weight, break) 
                VALUES (?,?,?,?,?,?)';
        $db = $this->getPdo()->prepare($sql);
        $db->execute([
            $exercise->getWorkoutId(),
            $exercise->getName(),
            $exercise->getRepetitions(),
            $exercise->getWeight(),
            $exercise->getBreak(),
            $exercise->getWorkoutId()
        ]);
    }

    public function getExerciseByWorkoutId(int $workoutId): array
    {
        $sql = 'SELECT * FROM exercises WHERE id_workout = :id';

        $db = $this->getPdo()->prepare($sql);
        $db->bindValue(':id', $workoutId);
        $db->execute();
        $exercises = $db->fetchAll();
        $exercisesArray = [];

        foreach ($exercises as $key => $value) {
            $exercisesArray[$key] = new Exercise($value['name'], $value['sets'], $value['repetitions'], $value['weight'],
                $value['break'], $value['id_workout'], $value['id']);
        }

        return $exercisesArray;
    }
}