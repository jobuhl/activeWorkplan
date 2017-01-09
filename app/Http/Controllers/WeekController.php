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
    /* ------------------------- Admin Overview -------------------------- */
    public function nextAdmOver(Request $data)
    {
        $today = clone (new DateTime($data['date']))->modify('+7 days');
        return $this->admOver($today);
    }

    public function backAdmOver(Request $data)
    {
        $today = clone (new DateTime($data['date']))->modify('-7 days');
        return $this->admOver($today);
    }

    public function todayAdmOver(Request $data)
    {
        $today = new DateTime();
        return $this->admOver($today);
    }

    public function admOver($date) {
        $company = thisCompany();

        $allRetailStores = allRetailStoresOfCompany($company->id);

        $allEmployees = allEmployeesOfCompany($company->id);

        $manyTimeEvent = allTimeEventOfCompany($company->id);

        $manyWorktimeEvent = allWorktimeFixOfCompany($company->id);

        $manyAlldayEvent = allAlldayEventOfCompany($company->id);

        $monday = getMondayBeforeDay($date);

        $week = getWeekArray($monday);

        return view('admin.employer-overview')
            ->with('allRetailStores', $allRetailStores)
            ->with('allEmployees', $allEmployees)
            ->with('manyTimeEvent', $manyTimeEvent)
            ->with('manyWorktimeEvent', $manyWorktimeEvent)
            ->with('manyAlldayEvent', $manyAlldayEvent)
            ->with('week', $week);
    }






    /* ------------------------- Admin Planning -------------------------- */
    public function nextAdmPlan(Request $data, $retailStoreId)
    {
        $segments = explode('/', $retailStoreId);
        dd($segments);
        $today = clone (new DateTime($data['date']))->modify('+7 days');
        return $this->admOver($today, $retailStoreId);
    }

    public function backAdmPlan(Request $data, $retailStoreId)
    {
        $today = clone (new DateTime($data['date']))->modify('-7 days');
        return $this->admOver($today, $retailStoreId);
    }

    public function todayAdmPlan(Request $data, $retailStoreId)
    {
        $today = new DateTime();
        return $this->admOver($today, $retailStoreId);
    }

    public function admPlan($date, $retailStoreId) {
        $company = thisCompany();

        $allRetailStores = allRetailStoresOfCompany($company->id);
        $thisRetailStore = thisRetailStore($retailStoreId);
        $allEmployees = allEmployeesOfCompany($company->id);

        $manyTimeEvent = allTimeEventOfCompany($company->id);
        $manyWorktimeEvent = allWorktimeFixOfCompany($company->id);
        $manyAlldayEvent = allAlldayEventOfCompany($company->id);

        $monday = getMondayBeforeDay($date);
        $week = getWeekArray($monday);

        return view('admin.employer-planning')
            ->with('allRetailStores', $allRetailStores)
            ->with('thisRetailStore', $thisRetailStore)
            ->with('allEmployees', $allEmployees)
            ->with('manyTimeEvent', $manyTimeEvent)
            ->with('manyWorktimeEvent', $manyWorktimeEvent)
            ->with('manyAlldayEvent', $manyAlldayEvent)
            ->with('week', $week);
    }
}
