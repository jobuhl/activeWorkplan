<?php

namespace App\Http\Controllers;

use App\TimeEvent;
use App\WorktimeFix;
use Illuminate\Http\Request;
use Auth;
use DB;
use DateTime;
use App\AlldayEvent;
use App\RetailStore;


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
            'category_id' => $category->id,
            'employee_id' => $thisEmployee->id
        ));

        return redirect('/employee/employee-planning/' . $request['thisDate']);
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
            'category_id' => $category->id,
            'employee_id' => $thisEmployee->id
        ));

        return redirect('/employee/employee-planning/' . $request['thisDate']);
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
        return redirect('/employee/employee-planning/' . $request['thisDate']);
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

        return redirect('/employee/employee-planning/' . $request['thisDate']);
    }


    // Employee deletes an Allday Event
    function deleteAlldayEvent(Request $request)
    {

        $eventId = $request['eventId'];

        DB::table('allday_event')
            ->where('allday_event.id', $eventId)
            ->delete();

        return redirect('/employee/employee-planning/' . $request['thisDate']);
    }

    // Employee deletes a Time Event
    function deleteTimeEvent(Request $request)
    {

        $eventId = $request['eventId'];

        DB::table('time_event')
            ->where('time_event.id', $eventId)
            ->delete();

        return redirect('/employee/employee-planning/' . $request['thisDate']);
    }

    /* ---------------------------- ADMIN -------------------------------- */

    // Admin adds a Worktime Fix Event
    function addWorktimeFixEvent(Request $request)
    {
        $thisRetailStore = RetailStore::find($request['thisRetailStoreId']);


        $thisEmployee = oneEmployee($request['thisEmployeeId']);

        $category = DB::table('category')
            ->where('category.name', $request['category'])
            ->get()[0];

        $newDate = (new DateTime($request['date']))->format('Y-m-d');

        WorktimeFix::create(array(
            'date' => date($newDate),
            'from' => $request['time-from'],
            'to' => $request['time-to'],
            'category_id' => $category->id,
            'employee_id' => $thisEmployee->id
        ));

        return redirect('/admin/employer-planning/' . $thisRetailStore->id . '/' . $request['thisDate']);
    }

    // Admin deletes a Worktime Event
    function deleteWorktimeFixEvent(Request $request)
    {
        $thisRetailStore = RetailStore::find($request['thisRetailStoreId']);

        $eventId = $request['eventId'];

        DB::table('worktime_fix')
            ->where('worktime_fix.id', $eventId)
            ->delete();


        return redirect('/admin/employer-planning/' . $thisRetailStore->id . '/' . $request['thisDate']);
    }

    // Employee changes a Time Event
    function changeWorktimeFixEvent(Request $request)
    {
        $thisRetailStore = RetailStore::find($request['thisRetailStoreId']);


        $thisEmployee = oneEmployee($request['thisEmployeeId']);

        $category = DB::table('category')
            ->where('category.name', $request['category'])
            ->get()[0];

        $newDate = (new DateTime($request['date']))->format('Y-m-d');

        $eventId = $request['thisEventId'];

        WorktimeFix::where('worktime_fix.id', $eventId)
            ->update(array(
                'date' => date($newDate),
                'from' => $request['time-from'],
                'to' => $request['time-to'],
                'category_id' => $category->id,
                'employee_id' => $thisEmployee->id
            ));

        return redirect('/admin/employer-planning/' . $thisRetailStore->id . '/' . $request['thisDate']);
    }
}
