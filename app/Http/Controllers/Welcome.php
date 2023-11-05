<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class Welcome extends BaseController
{
    public $developersModel;
    public $tasksModel;

    const WeeklyWorkHour = 45;

    public function __construct()
    {
        $this->developersModel = new \App\Models\Developers();
        $this->tasksModel = new \App\Models\Tasks();
    }

    public function main()
    {
        $developers = $this->developersModel::all()->toArray();
        $tasks = $this->tasksModel::all()->toArray();
        
        list($developers, $sprint) = $this->tasksModel->sprintPlanner(
            $tasks,
            $developers,
            self::WeeklyWorkHour
        );

        return view('welcome', compact('developers', 'sprint', 'tasks'));
    }
}
