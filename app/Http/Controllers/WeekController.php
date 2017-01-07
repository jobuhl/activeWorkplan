<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use DB;
use Auth;
use DateInterval;
use App\Http\Controllers\Functions;

class WeekController extends Controller
{
    /* ------------------------- Employee Planning -------------------------- */

    public function nextEmpPlan(Request $data)
    {
        $today = clone (new DateTime($data['date']))->modify('+7 days');
        return $this->empPlan($today);
    }

    public function backEmpPlan(Request $data)
    {
        $today = clone (new DateTime($data['date']))->modify('-7 days');
        return $this->empPlan($today);
    }

    public function todayEmpPlan(Request $data)
    {
        $today = new DateTime();
        return $this->empPlan($today);
    }

    public function empPlan($date) {
        $thisEmployee = oneEmployee(Auth::user()->id);

        $manyTimeEvent = timeEventOfEmployee($thisEmployee->id);

        $manyAlldayEvent = alldayEventOfEmployee($thisEmployee->id);

        $monday = getMondayBeforeDay($date);

        $week = getWeekArray($monday);

        return view('employee.employee-planning2')
            ->with('manyTimeEvent', $manyTimeEvent)
            ->with('manyAlldayEvent', $manyAlldayEvent)
            ->with('week', $week);
    }


    /* ------------------------- Employee Workplan -------------------------- */
    public function nextEmpWork(Request $data)
    {
        $today = clone (new DateTime($data['date']))->modify('+7 days');
        return $this->empWork($today);
    }

    public function backEmpWork(Request $data)
    {
        $today = clone (new DateTime($data['date']))->modify('-7 days');
        return $this->empWork($today);
    }

    public function todayEmpWork(Request $data)
    {
        $today = new DateTime();
        return $this->empWork($today);
    }

    public function empWork($date) {
        $thisEmployee = oneEmployee(Auth::user()->id);

        $manyTimeEvent = timeEventOfEmployee($thisEmployee->id);

        $manyWorktimeEvent = worktimeFixOfEmployee($thisEmployee->id);

        $manyAlldayEvent = alldayEventOfEmployee($thisEmployee->id);

        $monday = getMondayBeforeDay($date);

        $week = getWeekArray($monday);

        return view('employee.employee-workplan2')
            ->with('manyTimeEvent', $manyTimeEvent)
            ->with('manyWorktimeEvent', $manyWorktimeEvent)
            ->with('manyAlldayEvent', $manyAlldayEvent)
            ->with('week', $week);
    }
}
