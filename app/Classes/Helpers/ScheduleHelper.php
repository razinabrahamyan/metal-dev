<?php

namespace App\Classes\Helpers;

use App\Models\Post;

class ScheduleHelper
{
    /**
     * @param Post $post
     * @return bool
     */
    public static function isPostWorkTime(Post $post) : bool
    {
        $schedule = $post->work_hours;

        $dowMap = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
        $dowNumeric = date('w');

        $startWork = $schedule[$dowMap[$dowNumeric]]['start']['hour'].":".$schedule[$dowMap[$dowNumeric]]['start']['minute'];
        $endWork = $schedule[$dowMap[$dowNumeric]]['end']['hour'].":".$schedule[$dowMap[$dowNumeric]]['end']['minute'];
        $currentDateTime = strtotime(date('Y-m-d')." ".date('H:s'));

        $isOpen = false;

        $startDateTime = strtotime(date('Y-m-d')." ".$startWork);

        if (strtotime($startWork) <= strtotime($endWork)) {
            $endDateTime = strtotime(date('Y-m-d')." ".$endWork);
        } else {
            $endDateTime = strtotime(date('Y-m-d')." ".$endWork."+1 days");
        }

        if ($currentDateTime >= $startDateTime && $currentDateTime <= $endDateTime) {
            $isOpen = true;
        }

        return $isOpen;
    }
}
