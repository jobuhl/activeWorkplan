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

    function allCountEmployees($companyId) {
        return DB::table('retail_store')
            ->select(DB::raw('count(employees.id) as countEmployees, retail_store.id as retailStoreId'))
            ->leftJoin('employees', 'retail_store.id', '=', 'employees.retail_store_id')
            ->where('retail_store.company_id', $companyId)
            ->groupBy('retail_store.id')
            ->get();
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

    function timeEventOfEmployee($employeeId, $week)
    {
        return DB::table('calendar_event')
            ->where('calendar_event.date', '>=', $week[0])
            ->where('calendar_event.date', '<=', $week[6])
            ->where('calendar_event.from', '!=', '')
            ->where('calendar_event.to', '!=', '')
            ->where('calendar_event.employee_id', $employeeId)
            ->join('category', 'category.id', '=', 'calendar_event.category_id')
            ->select('calendar_event.id as id', 'date', 'from', 'to', 'color', 'category.name as name', 'employee_id', 'accepted')
            ->get();
    }

    function alldayEventOfEmployee($employeeId, $week)
    {
        return DB::table('calendar_event')
            ->where('calendar_event.date', '>=', $week[0])
            ->where('calendar_event.date', '<=', $week[6])
            ->where('calendar_event.employee_id', $employeeId)
            ->where('calendar_event.from', '')
            ->where('calendar_event.to', '')
            ->join('category', 'category.id', '=', 'calendar_event.category_id')
            ->select('calendar_event.id as id', 'date', 'color', 'category.name as name', 'employee_id', 'accepted')
            ->get();
    }

    function allTimeEventOfCompany($companyId, $week)
    {
        return DB::table('calendar_event')
            ->where('calendar_event.date', '>=',  $week[0])
            ->where('calendar_event.date', '<=', $week[6])
            ->where('calendar_event.from', '!=', '')
            ->where('calendar_event.to', '!=', '')
            ->join('category', 'category.id', '=', 'calendar_event.category_id')
            ->join('employees', 'employees.id', '=', 'calendar_event.employee_id')
            ->join('retail_store', 'retail_store.id', '=', 'employees.retail_store_id')
            ->where('retail_store.company_id', $companyId)
            ->select('calendar_event.id as id', 'category.name as name', 'from', 'to', 'date', 'employee_id', 'color', 'accepted')
            ->get();
    }

    function allAlldayEventOfCompany($companyId, $week)
    {
        return DB::table('calendar_event')
            ->where('calendar_event.date', '>=', $week[0])
            ->where('calendar_event.date', '<=', $week[6])
            ->where('calendar_event.from', '')
            ->where('calendar_event.to', '')
            ->join('category', 'category.id', '=', 'calendar_event.category_id')
            ->join('employees', 'employees.id', '=', 'calendar_event.employee_id')
            ->join('retail_store', 'retail_store.id', '=', 'employees.retail_store_id')
            ->where('retail_store.company_id', $companyId)
            ->select('calendar_event.id as id', 'category.name as name', 'date', 'employee_id', 'color', 'accepted')
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
            (clone $monday)->format('Y-m-d'),
            (clone $monday->add(new DateInterval('P1D')))->format('Y-m-d'),
            (clone $monday->add(new DateInterval('P1D')))->format('Y-m-d'),
            (clone $monday->add(new DateInterval('P1D')))->format('Y-m-d'),
            (clone $monday->add(new DateInterval('P1D')))->format('Y-m-d'),
            (clone $monday->add(new DateInterval('P1D')))->format('Y-m-d'),
            (clone $monday->add(new DateInterval('P1D')))->format('Y-m-d')
        );
    }





}
