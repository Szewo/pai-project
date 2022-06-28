<?php

namespace App\Controllers;

use App\Attributes\Route;
use App\Models\Exercise;
use App\Repository\ExerciseRepository;
use App\Routing\UserRole;

class ExerciseController extends BaseController
{

    private ExerciseRepository $exerciseRepository;

    public function __construct()
    {
        parent::__construct();
        $this->exerciseRepository = new ExerciseRepository();
    }

    /**
     * @throws \App\Exceptions\ViewNotFoundException
     */
    #[Route('/exercise/add', 'GET', UserRole::REGISTERED)]
    public function addExerciseToWorkout() {
        return $this->renderView('add-exercise');
    }

    #[Route('/all-workouts/exercise/edit', 'GET', UserRole::REGISTERED)]
    public function editWorkoutExercise() {

    }

    #[Route('/exercise/add', 'POST', UserRole::REGISTERED)]
    public function addExercise() {

        $exerciseName = $_POST['exercise_name'];
        $exerciseSets = $_POST['exercise_sets'];
        $exerciseReps = $_POST['exercise_repetitions'];
        $exerciseWeight = $_POST['exercise_weight'];
        $exerciseBreak = $_POST['exercise_break'];
        $exerciseWorkoutId = $_POST['exercise_workout_id'];


        $exercise = new Exercise($exerciseName, $exerciseSets, $exerciseReps, $exerciseWeight, $exerciseBreak, $exerciseWorkoutId);

        $this->exerciseRepository->addWorkout($exercise);
    }
}