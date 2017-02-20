<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Functions extends Controller
{


    function thisCompany()
    {
        return DB::table('company')
            ->where('company.admin_id', Auth::user()->id)
            ->get()[0];
    }

    function oneCompany($companyId)
    {
        return DB::table('company')
            ->where('company.id', $companyId)
            ->get()[0];
    }

    function thisAdmin()
    {
        return DB::table('admins')
            ->where('admins.id', Auth::user()->id)
            ->get()[0];
    }

    function thisRetailStore($retailStoreId)
    {
        return DB::table('retail_store')
            ->where('retail_store.id', $retailStoreId)
            ->get()[0];
    }

    function allRetailStoresOfCompany($companyId)
    {
        return DB::table('retail_store')
            ->where('retail_store.company_id', $companyId)
            ->get();
    }

    function amountOfRetailStoresOfCompany($companyId)
    {
        return DB::table('retail_store')
            ->where('retail_store.company_id', $companyId)
            ->count();
    }

    function oneAddress($addressId)
    {
        return DB::table('address')
            ->join('city', 'city.id', '=', 'address.city_id')
            ->join('country', 'country.id', '=', 'city.country_id')
            ->where('address.id', $addressId)
            ->select('street', 'street_nr', 'postcode', 'city.name as city', 'country.name as country')
            ->get()[0];
    }

    function allEmployeesOfCompany($companyId)
    {
        return DB::table('employees')
            ->join('retail_store', 'retail_store.id', '=', 'employees.retail_store_id')
            ->where('retail_store.company_id', $companyId)
            ->select('employees.name as surname', 'forename', 'employees.retail_store_id', 'employees.id')
            ->get();
    }

    function countEmployees($retailStoreId) {
        return DB::table('employees')
            ->join('retail_store', 'retail_store.id', '=', 'employees.retail_store_id')
            ->where('retail_store.id', $retailStoreId)
            ->count();
    }


    function oneEmployee($employeeId)
    {
        return DB::table('employees')
            ->join('contract', 'contract.id', '=', 'employees.contract_id')
            ->join('role', 'role.id', '=', 'contract.role_id')
            ->where('employees.id', $employeeId)
            ->select('employees.id', 'employees.name as surname', 'forename', 'email', 'password', 'role.name as role', 'period_of_agreement', 'working_hours', 'classification', 'retail_store_id')
            ->get()[0];
    }


    function employeePerHourOfRetailStore($retailStoreId)
    {
        return DB::table('employee_per_hour')
            ->where('employee_per_hour.retail_store_id', $retailStoreId)
            ->get();
    }

    function timeEventOfEmployee($employeeId, $week)
    {
        return DB::table('time_event')
            ->where('time_event.date', '>=', $week[0])
            ->where('time_event.date', '<=', $week[6])
            ->join('category', 'category.id', '=', 'time_event.category_id')
            ->where('time_event.employee_id', $employeeId)
            ->select('time_event.id as id', 'date', 'from', 'to', 'color', 'category.name as name', 'employee_id', 'accepted')
            ->get();
    }

    function worktimeFixOfEmployee($employeeId, $week)
    {
        return DB::table('worktime_fix')
            ->where('worktime_fix.date', '>=', $week[0])
            ->where('worktime_fix.date', '<=', $week[6])
            ->join('category', 'category.id', '=', 'worktime_fix.category_id')
            ->where('worktime_fix.employee_id', $employeeId)
            ->select('worktime_fix.id as id', 'date', 'from', 'to', 'color', 'employee_id', 'category.name as name')
            ->get();
    }

    function alldayEventOfEmployee($employeeId, $week)
    {

        return DB::table('allday_event')
            ->where('allday_event.date', '>=', $week[0])
            ->where('allday_event.date', '<=', $week[6])
            ->join('category', 'category.id', '=', 'allday_event.category_id')
            ->where('allday_event.employee_id', $employeeId)
            ->select('allday_event.id as id', 'date', 'color', 'category.name as name', 'employee_id', 'accepted')
            ->get();
    }

    function allTimeEventOfCompany($companyId, $week)
    {
        return DB::table('time_event')
            ->where('time_event.date', '>=', $week[0])
            ->where('time_event.date', '<=', $week[6])
            ->join('category', 'category.id', '=', 'time_event.category_id')
            ->join('employees', 'employees.id', '=', 'time_event.employee_id')
            ->join('retail_store', 'retail_store.id', '=', 'employees.retail_store_id')
            ->where('retail_store.company_id', $companyId)
            ->select('time_event.id as id', 'category.name as name', 'from', 'to', 'date', 'employee_id','color', 'accepted')
            ->get();
    }

    function allWorktimeFixOfCompany($companyId, $week)
    {
        return DB::table('worktime_fix')
            ->where('worktime_fix.date', '>=', $week[0])
            ->where('worktime_fix.date', '<=', $week[6])
            ->join('category', 'category.id', '=', 'worktime_fix.category_id')
            ->join('employees', 'employees.id', '=', 'worktime_fix.employee_id')
            ->join('retail_store', 'retail_store.id', '=', 'employees.retail_store_id')
            ->where('retail_store.company_id', $companyId)
            ->select('worktime_fix.id as id', 'category.name as name', 'from', 'to', 'date', 'employee_id','color')
            ->get();
    }

    function allAlldayEventOfCompany($companyId, $week)
    {
        return DB::table('allday_event')
            ->where('allday_event.date', '>=', $week[0])
            ->where('allday_event.date', '<=', $week[6])
            ->join('category', 'category.id', '=', 'allday_event.category_id')
            ->join('employees', 'employees.id', '=', 'allday_event.employee_id')
            ->join('retail_store', 'retail_store.id', '=', 'employees.retail_store_id')
            ->where('retail_store.company_id', $companyId)
            ->select('allday_event.id as id', 'category.name as name', 'date', 'employee_id','color', 'accepted')
            ->get();
    }

    function allCategory()
    {
        return DB::table('category')
            ->get();
    }

    function getWeekArray($urlDate) {

        $day = new DateTime($urlDate);

        $monday = clone $day->modify('-' . ($day->format('N') - 1) . ' days');

        return array(
            (clone $monday)->format('d-m-Y'),
            (clone $monday->add(new DateInterval('P1D')))->format('d-m-Y'),
            (clone $monday->add(new DateInterval('P1D')))->format('d-m-Y'),
            (clone $monday->add(new DateInterval('P1D')))->format('d-m-Y'),
            (clone $monday->add(new DateInterval('P1D')))->format('d-m-Y'),
            (clone $monday->add(new DateInterval('P1D')))->format('d-m-Y'),
            (clone $monday->add(new DateInterval('P1D')))->format('d-m-Y')
        );
    }




}
