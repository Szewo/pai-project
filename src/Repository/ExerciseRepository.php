<?php

namespace App\Repository;

use App\Models\Exercise;
use PDO;

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

    public function editExercise(Exercise $exercise): void {
        $sql = 'UPDATE exercises SET 
                name = :name, sets = :sets, repetitions = :repetitions, weight = :weight, break = :break
                WHERE id = :id';
        $db = $this->getPdo()->prepare($sql);
        $db->bindValue(':name', $exercise->getName());
        $db->bindValue(':sets', $exercise->getSets());
        $db->bindValue(':repetitions', $exercise->getRepetitions());
        $db->bindValue(':weight', $exercise->getWeight());
        $db->bindValue(':break', $exercise->getBreak());
        $db->bindValue(':id', $exercise->getId(), PDO::PARAM_INT);
        $db->execute();
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

    public function getExerciseById(int $exerciseId) {
        $sql ='SELECT * FROM exercises WHERE id = :id';
        $db = $this->getPdo()->prepare($sql);
        $db->bindValue(':id', $exerciseId);
        $db->execute();

        $exercise = $db->fetch(PDO::FETCH_ASSOC);

        if (!$exercise) {
            return NULL;
        }

        return new Exercise(
            $exercise['name'],
            $exercise['sets'],
            $exercise['repetitions'],
            $exercise['weight'],
            $exercise['break'],
            $exercise['id_workout'],
            $exercise['id']
        );
    }

    public function deleteExercise(int $exerciseId): void {
        $sql = 'DELETE FROM exercises WHERE id = :id';
        $db = $this->getPdo()->prepare($sql);
        $db->bindValue(':id', $exerciseId);
        $db->execute();
    }
}