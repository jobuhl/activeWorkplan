<?php

namespace App\Http\Controllers;

use App\Category;
use App\TimeEvent;
use Illuminate\Http\Request;
use Auth;
use DB;
use DateTime;
use App\AlldayEvent;

class EventController extends Controller
{
    // Employee adds an Allday Event
    function addAlldayEvent(Request $request)
    {

        $thisEmployee = oneEmployee(Auth::user()->id);

        $category = DB::table('category')
            ->where('category.name', $request['category'])
            ->get()[0];

        $newDate = (new DateTime($request['date']))->format('Y-m-d');

        AlldayEvent::create(array(
            'date' =>  date($newDate),
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
            'date' =>  date($newDate),
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
}
