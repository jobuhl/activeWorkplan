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

    // Employee adds an Event
    function addEvent(Request $request)
    {
        $thisEmployee = oneEmployee(Auth::user()->id);

        $category = DB::table('category')
            ->where('category.name', $request['category'])
            ->get()[0];

        $newDate = (new DateTime($request['date']))->format('Y-m-d');

        // If Input Values are empty
        if ($request['time-from'] + $request['time-to'] == "") {

            // Add AlldayEvent
            AlldayEvent::create(array(
                'date' => $newDate,
                'accepted' => false,
                'category_id' => $category->id,
                'employee_id' => $thisEmployee->id
            ));
        } else {

            // Add TimeEvent
            TimeEvent::create(array(
                'date' => $newDate,
                'from' => $request['time-from'],
                'to' => $request['time-to'],
                'accepted' => false,
                'category_id' => $category->id,
                'employee_id' => $thisEmployee->id
            ));
        }

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
                'date' => $newDate,
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
                'date' => $newDate,
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

        TimeEvent::create(array(
            'date' => $newDate,
            'from' => $request['time-from'],
            'to' => $request['time-to'],
            'accepted' => false,
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

        TimeEvent::where('time_event.id', $request['thisEventId'])
            ->update(array(
                'date' => $newDate,
                'from' => $request['time-from'],
                'to' => $request['time-to'],
                'category_id' => $category->id,
                'employee_id' => $request['thisEmployeeId']
            ));

        return redirect($request['thisUrl']);
    }


    /* ---------------------------- (NOT) ACCEPT VACATION ILLNESS -------------------------------- */

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
