<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use DateTime;
use App\TimeEvent;
use App\WorktimeFix;
use App\AlldayEvent;
use App\RetailStore;
use App\Employee;

class EventController extends Controller
{
    /* ---------------------------- EMPLOYEE -------------------------------- */

    // Employee adds an Allday Event
    function addAlldayEvent(Request $request)
    {

        $thisEmployee = oneEmployee(Auth::user()->id);

        $category = DB::table('category')
            ->where('category.name', $request['category'])
            ->get()[0];

        $newDate = (new DateTime($request['date']))->format('Y-m-d');

        AlldayEvent::create(array(
            'date' => date($newDate),
            'accepted' => false,
            'category_id' => $category->id,
            'employee_id' => $thisEmployee->id

        ));

        return redirect('/employee/planning/' . $request['thisDate']);
    }

    // Employee adds a Time Event
    function addTimeEvent(Request $request)
    {

        $thisEmployee = oneEmployee(Auth::user()->id);

        $category = DB::table('category')
            ->where('category.name', $request['category'])
            ->get()[0];

        $newDate = (new DateTime($request['date']))->format('Y-m-d');

        TimeEvent::create(array(
            'date' => date($newDate),
            'from' => $request['time-from'],
            'to' => $request['time-to'],
            'accepted' => false,
            'category_id' => $category->id,
            'employee_id' => $thisEmployee->id
        ));

        return redirect('/employee/planning/' . $request['thisDate']);
    }

    // Employee changes an Allday Event
    function changeAlldayEvent(Request $request)
    {
        $category = DB::table('category')
            ->where('category.name', $request['category'])
            ->get()[0];

        $newDate = (new DateTime($request['date']))->format('Y-m-d');

        $eventId = $request['thisEventId'];

        AlldayEvent::where('allday_event.id', $eventId)
            ->update(array(
                'date' => date($newDate),
                'category_id' => $category->id,
            ));
        return redirect('/employee/planning/' . $request['thisDate']);
    }

    // Employee changes a Time Event
    function changeTimeEvent(Request $request)
    {
        $thisEmployee = oneEmployee(Auth::user()->id);

        $category = DB::table('category')
            ->where('category.name', $request['category'])
            ->get()[0];

        $newDate = (new DateTime($request['date']))->format('Y-m-d');

        $eventId = $request['thisEventId'];

        TimeEvent::where('time_event.id', $eventId)
            ->update(array(
                'date' => date($newDate),
                'from' => $request['time-from'],
                'to' => $request['time-to'],
                'category_id' => $category->id,
                'employee_id' => $thisEmployee->id
            ));

        return redirect('/employee/planning/' . $request['thisDate']);
    }

    /* ---------------------------- ADMIN -------------------------------- */

    // Admin adds a Worktime Fix Event
    function addWorktimeFixEvent(Request $request)
    {
        $category = DB::table('category')
            ->where('category.name', $request['category'])
            ->get()[0];

        $newDate = (new DateTime($request['date']))->format('Y-m-d');

        WorktimeFix::create(array(
            'date' => date($newDate),
            'from' => $request['time-from'],
            'to' => $request['time-to'],
            'category_id' => $category->id,
            'employee_id' => $request['thisEmployeeId']
        ));

        return redirect($request['thisUrl']);
    }

    // Admin changes a Worktime Fix Event
    function changeWorktimeFixEvent(Request $request)
    {
        $category = DB::table('category')
            ->where('category.name', $request['category'])
            ->get()[0];

        $newDate = (new DateTime($request['date']))->format('Y-m-d');

        WorktimeFix::where('worktime_fix.id', $request['thisEventId'])
            ->update(array(
                'date' => date($newDate),
                'from' => $request['time-from'],
                'to' => $request['time-to'],
                'category_id' => $category->id,
                'employee_id' => $request['thisEmployeeId']
            ));

        return redirect($request['thisUrl']);
    }

    // Admin accepts an Allday Event (Vacation / Illness)
    function acceptAlldayEvent(Request $request)
    {
        AlldayEvent::where('allday_event.id', $request['eventId'])
            ->update(array(
                'accepted' => true,
            ));
        return redirect($request['thisUrl']);
    }

    // Admin accepts a Time Event (Vacation / Illness)
    function acceptTimeEvent(Request $request)
    {
        TimeEvent::where('time_event.id', $request['eventId'])
            ->update(array(
                'accepted' => true,
            ));
        return redirect($request['thisUrl']);
    }

    // Admin accepts an Allday Event (Vacation / Illness)
    function notAcceptAlldayEvent(Request $request)
    {
        AlldayEvent::where('allday_event.id', $request['eventId'])
            ->update(array(
                'accepted' => false,
            ));
        return redirect($request['thisUrl']);
    }

    // Admin accepts a Time Event (Vacation / Illness)
    function notAcceptTimeEvent(Request $request)
    {
        TimeEvent::where('time_event.id', $request['eventId'])
            ->update(array(
                'accepted' => false,
            ));
        return redirect($request['thisUrl']);
    }


    /* ---------------------------- AJAX -------------------------------- */

    function deleteAlldayEventAJAX() {
        AlldayEvent::find($_GET['eventId'])->delete();
        return response("");
    }

    function deleteTimeEventAJAX() {
        TimeEvent::find($_GET['eventId'])->delete();
        return response("");
    }

    function deleteWorktimeEventAJAX() {
        WorktimeFix::find($_GET['eventId'])->delete();
        return response("");
    }





}
