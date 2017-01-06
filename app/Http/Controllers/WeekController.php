<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use DB;
use Auth;
use DateInterval;

class WeekController extends Controller
{

    public function next(Request $data) {

        $monday = clone (new DateTime($data['date']))->modify('+7 days');



        $employee = DB::table('employees')
            ->where('employees.id', Auth::user()->id)
            ->get();

        $manyWorktimePreferred = DB::table('worktime_preferred')
            ->join('category', 'category.id', '=', 'worktime_preferred.category_id')
            ->where('worktime_preferred.employee_id', $employee[0]->id)
            ->get();

        $manyAlldayFix = DB::table('allday_fix')
            ->join('category', 'category.id', '=', 'allday_fix.category_id')
            ->where('allday_fix.employee_id', $employee[0]->id)
            ->get();

        $date = array(
            clone $monday,
            clone $monday->add(new DateInterval('P1D')),
            clone $monday->add(new DateInterval('P1D')),
            clone $monday->add(new DateInterval('P1D')),
            clone $monday->add(new DateInterval('P1D')),
            clone $monday->add(new DateInterval('P1D')),
            clone $monday->add(new DateInterval('P1D'))
        );

        return view('employee.employee-planning2')
            ->with('manyWorktimePreferred', $manyWorktimePreferred)
            ->with('manyAlldayFix', $manyAlldayFix)
            ->with('date', $date);
    }

    public function back(Request $data) {

        $monday = clone (new DateTime($data['date']))->modify('-7 days');


        $employee = DB::table('employees')
            ->where('employees.id', Auth::user()->id)
            ->get();

        $manyWorktimePreferred = DB::table('worktime_preferred')
            ->join('category', 'category.id', '=', 'worktime_preferred.category_id')
            ->where('worktime_preferred.employee_id', $employee[0]->id)
            ->get();

        $manyAlldayFix = DB::table('allday_fix')
            ->join('category', 'category.id', '=', 'allday_fix.category_id')
            ->where('allday_fix.employee_id', $employee[0]->id)
            ->get();

        $date = array(
            clone $monday,
            clone $monday->add(new DateInterval('P1D')),
            clone $monday->add(new DateInterval('P1D')),
            clone $monday->add(new DateInterval('P1D')),
            clone $monday->add(new DateInterval('P1D')),
            clone $monday->add(new DateInterval('P1D')),
            clone $monday->add(new DateInterval('P1D'))
        );

        return view('employee.employee-planning2')
            ->with('manyWorktimePreferred', $manyWorktimePreferred)
            ->with('manyAlldayFix', $manyAlldayFix)
            ->with('date', $date);
    }

    public function today(Request $data) {




        $employee = DB::table('employees')
            ->where('employees.id', Auth::user()->id)
            ->get();

        $manyWorktimePreferred = DB::table('worktime_preferred')
            ->join('category', 'category.id', '=', 'worktime_preferred.category_id')
            ->where('worktime_preferred.employee_id', $employee[0]->id)
            ->get();

        $manyAlldayFix = DB::table('allday_fix')
            ->join('category', 'category.id', '=', 'allday_fix.category_id')
            ->where('allday_fix.employee_id', $employee[0]->id)
            ->get();

        // anzuzeigendes Datum
        $today = new DateTime();

        // Montag vor dem Datum
        $monday = clone $today->modify('-' . ($today->format('N') - 1) . ' days');


        $date = array(
            clone $monday,
            clone $monday->add(new DateInterval('P1D')),
            clone $monday->add(new DateInterval('P1D')),
            clone $monday->add(new DateInterval('P1D')),
            clone $monday->add(new DateInterval('P1D')),
            clone $monday->add(new DateInterval('P1D')),
            clone $monday->add(new DateInterval('P1D'))
        );

        return view('employee.employee-planning2')
            ->with('manyWorktimePreferred', $manyWorktimePreferred)
            ->with('manyAlldayFix', $manyAlldayFix)
            ->with('date', $date);
    }
}
