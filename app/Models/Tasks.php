<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $table = 'tasks';

    /**
     * Performs sprint planning.
     *
     * @param array $developers Array containing developer information
     * @param array $tasks Array containing developer information
     * @param array $oneWeekWorkLimit Max work limit for week. Default 45
     * @return array Array containing the generated sprint plans
     */
    public function sprintPlanner(array $tasks, array $developers, int $oneWeekWorkLimit = 45): array
    {
        $developers = $this->mapDevelopersForTasks($developers);
        $sprint = 1;

        while (!empty($tasks)) {
            $this->calculate(
                $sprint,
                $developers,
                $tasks,
                $oneWeekWorkLimit
            );
        }

        return [$developers, $sprint];
    }

    /**
     * Mapping developers array for calculator method.
     *
     * @param array $developers Array containing developer information
     * @return array Array containing mapped developers data
     */
    public function mapDevelopersForTasks(array $developers): array
    {
        $mappedDevelopers = [];
        foreach ($developers as $developer) {
            $developer['sprints'] = [];
            $developer['total_duration'] = 0;
            $mappedDevelopers[$developer['difficulty_level']] = $developer;
        }

        return $mappedDevelopers;
    }

    /**
     * Planning sprint/work.
     *
     * @param int $sprint Sprint information
     * @param array $developers Array containing mapped developer information
     * @param array $tasks Array containing tasks information
     * @param array $oneWeekWorkLimit Work limit
     * @return array Array containing mapped developers data
     */
    public function calculate(&$sprint, &$developers, &$tasks, $oneWeekWorkLimit): void
    {

        foreach ($tasks as $key => &$task) {
            $totalWorkDuration = $sprint * $oneWeekWorkLimit;
            if (
                $totalWorkDuration > $developers[$task['difficulty']]['total_duration']
                && $totalWorkDuration >= ($developers[$task['difficulty']]['total_duration'] + $task['duration'])
            ) {
                $developers[$task['difficulty']]['sprints'][$sprint][] = $task;
                $developers[$task['difficulty']]['total_duration'] += $task['duration'];
                unset($tasks[$key]);
            }
        }

        if (!empty($tasks)) {
            $sprint++; // End of sprint (sprint == week)
        }
    }
}
