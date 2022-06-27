<?php

namespace App\Repository;

use App\Models\Workout;

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

}