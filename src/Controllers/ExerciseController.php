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

    #[Route('/exercise/edit', 'GET', UserRole::REGISTERED)]
    public function editWorkoutExercise() {
        $exercise = $this->exerciseRepository->getExerciseById((int) $_REQUEST['id']);

        return $this->renderView('edit-exercise', ['exercise' => $exercise]);
    }

    #[Route('/exercise/delete', 'GET', UserRole::REGISTERED)]
    public function deleteWorkoutExercise() {
        $this->exerciseRepository->deleteExercise((int) $_REQUEST['id']);

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/all-workouts/view?id=" . (int) $_REQUEST['wid']);
    }

    #[Route('/exercise/edit', 'POST', UserRole::REGISTERED)]
    public function editExercise() {
        $exerciseName = $_POST['exercise_name'];
        $exerciseSets = $_POST['exercise_sets'];
        $exerciseReps = $_POST['exercise_repetitions'];
        $exerciseWeight = $_POST['exercise_weight'];
        $exerciseBreak = $_POST['exercise_break'];
        $workoutId = $_POST['workout_id'];
        $exerciseId = $_POST['exercise_id'];

        $exercise = new Exercise($exerciseName, $exerciseSets, $exerciseReps, $exerciseWeight, $exerciseBreak,
            null, $exerciseId);

        $this->exerciseRepository->editExercise($exercise);

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/all-workouts/view?id=" . $workoutId);
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

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/all-workouts/view?id=" . $exerciseWorkoutId);
    }
}