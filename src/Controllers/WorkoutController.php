<?php

namespace App\Controllers;

use App\Attributes\Route;
use App\Models\Workout;
use App\Repository\WorkoutRepository;
use App\Routing\UserRole;
use Exception;

class WorkoutController extends BaseController
{

    private WorkoutRepository $workoutRepository;

    public function __construct()
    {
        parent::__construct();
        $this->workoutRepository = new WorkoutRepository();
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
    public function viewWorkout() {
        $workout = $this->workoutRepository->getWorkoutById((int) $_REQUEST['id']);

        return $this->renderView('view-workout', ['workout' => $workout]);
    }

}