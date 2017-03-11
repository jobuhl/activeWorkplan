<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use DateTime;
use App\CalendarEvent;

class EventController extends Controller
{
    /* ---------------------------- ADD CHANGE -------------------------------- */

    // Employee or Admin adds a (Final Work) Event
    function addEvent(Request $request)
    {
        $category = DB::table('category')
            ->where('category.name', $request['category'])
            ->get()[0];

        $newDate = (new DateTime($request['date']))->format('Y-m-d');

        // Add Event (Its possible that "from" and "to" are empty -> then its like an AlldayEvent)
        CalendarEvent::create(array(
            'date' => $newDate,
            'from' => $request['time-from'],
            'to' => $request['time-to'],
            'accepted' => false,
            'category_id' => $category->id,
            'employee_id' => $request["thisEmployeeId"]
        ));

        return redirect($request['thisUrl']);
    }

    // Employee or Admin changes a (Final Work) Event
    function changeEvent(Request $request)
    {
        $category = DB::table('category')
            ->where('category.name', $request['category'])
            ->get()[0];

        $newDate = (new DateTime($request['date']))->format('Y-m-d');

        // Change Event (Its possible that "from" and "to" are empty -> then its like an AlldayEvent)
        CalendarEvent::where('calendar_event.id', $request['thisEventId'])
            ->update(array(
                'date' => $newDate,
                'from' => $request['time-from'],
                'to' => $request['time-to'],
                'category_id' => $category->id,
                'employee_id' => $request["thisEmployeeId"]
            ));

        return redirect($request['thisUrl']);
    }


    /* ---------------------------- (NOT) ACCEPT VACATION ILLNESS -------------------------------- */

    // Admin accepts an Event (Vacation / Illness)
    function acceptEvent(Request $request)
    {
        CalendarEvent::where('calendar_event.id', $request['eventId'])
            ->update(array(
                'accepted' => true,
            ));
        return redirect($request['thisUrl']);
    }

    // Admin not accepts an Event (Vacation / Illness)
    function notAcceptEvent(Request $request)
    {
        CalendarEvent::where('calendar_event.id', $request['eventId'])
            ->update(array(
                'accepted' => false,
            ));
        return redirect($request['thisUrl']);
    }


    /* ---------------------------- AJAX -------------------------------- */

    function deleteEventAJAX()
    {
        CalendarEvent::find($_GET['eventId'])->delete();
        return response("");
    }


}
