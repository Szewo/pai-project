<?php

namespace App\Controllers;

use App\Attributes\Route;
use App\Models\Workout;
use App\Repository\ExerciseRepository;
use App\Repository\WorkoutRepository;
use App\Routing\UserRole;
use Exception;

class WorkoutController extends BaseController
{

    private WorkoutRepository $workoutRepository;
    private ExerciseRepository $exerciseRepository;

    public function __construct()
    {
        parent::__construct();
        $this->workoutRepository = new WorkoutRepository();
        $this->exerciseRepository = new ExerciseRepository();
    }

    #[Route('/add-workout', 'GET', UserRole::REGISTERED)]
    public function addWorkoutGet(): string
    {
        return $this->renderView('add-workout');
    }

    /**
     * @throws Exception
     */
    #[Route('/add-workout', 'POST', UserRole::REGISTERED)]
    public function addWorkoutPost(): string
    {
        $workoutName = $_POST['workout_name'];
        $workoutDate = $_POST['workout_date'];

        $workout = new Workout($workoutName, $workoutDate, $_SESSION['id']);

        $this->workoutRepository->addWorkout($workout);

        return $this->renderView('add-workout');
    }

    /**
     * @throws Exception
     */
    #[Route('/all-workouts', 'GET', UserRole::REGISTERED)]
    public function listWorkouts() {
        $workouts = $this->workoutRepository->getAllWorkouts();

        return $this->renderView('all-workouts', ['workouts' => $workouts]);
    }

    /**
     * @throws Exception
     */
    #[Route('/all-workouts/view', 'GET', UserRole::REGISTERED)]
    public function viewWorkout(): string
    {
        $workout = $this->workoutRepository->getWorkoutById((int) $_REQUEST['id']);
        $exercises = $this->exerciseRepository->getExerciseByWorkoutId((int) $_REQUEST['id']);

        return $this->renderView('view-workout', ['workout' => $workout, 'exercises' => $exercises]);
    }

    /**
     * @throws Exception
     */
    #[Route('/all-workouts/edit', 'GET', UserRole::REGISTERED)]
    public function editWorkout(): string
    {
        $workout = $this->workoutRepository->getWorkoutById((int) $_REQUEST['id']);

        return $this->renderView('edit-workout', ['workout' => $workout]);
    }

    /**
     * @throws Exception
     */
    #[Route('/all-workouts/edit', 'POST', UserRole::REGISTERED)]
    public function editWorkoutPost()
    {
        $workoutId = $_POST['workout_id'];
        $workoutName = $_POST['workout_name'];
        $workoutDate = $_POST['workout_date'];

        $workout = new Workout($workoutName, $workoutDate, $_SESSION['id'], $workoutId);

        $this->workoutRepository->editWorkout($workout);

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/all-workouts");
    }

    /**
     * @throws Exception
     */
    #[Route('/all-workouts/delete', 'GET', UserRole::REGISTERED)]
    public function deleteWorkout()
    {
        $this->workoutRepository->deleteWorkout((int) $_REQUEST['id']);
        $workouts = $this->workoutRepository->getAllWorkouts();

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/all-workouts");
    }

}