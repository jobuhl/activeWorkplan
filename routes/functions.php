<?php


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

function timeEventOfEmployee($employeeId)
{
    return DB::table('worktime_preferred')
        ->join('category', 'category.id', '=', 'worktime_preferred.category_id')
        ->where('worktime_preferred.employee_id', $employeeId)
        ->get();
}

/* hier tabellen name ändern */
function worktimeFixOfEmployee($employeeId)
{
    return DB::table('worktime_fix')
        ->join('category', 'category.id', '=', 'worktime_fix.category_id')
        ->where('worktime_fix.employee_id', $employeeId)
        ->get();
}

/* hier tabellen name ändern */
function alldayEventOfEmployee($employeeId)
{
    return DB::table('allday_fix')
        ->join('category', 'category.id', '=', 'allday_fix.category_id')
        ->where('allday_fix.employee_id', $employeeId)
        ->get();
}

/* hier tabellen name ändern */
function allTimeEventOfCompany($companyId)
{
    return DB::table('worktime_fix')
        ->join('category', 'category.id', '=', 'worktime_fix.category_id')
        ->join('employees', 'employees.id', '=', 'worktime_fix.employee_id')
        ->join('retail_store', 'retail_store.id', '=', 'employees.retail_store_id')
        ->where('retail_store.company_id', $companyId)
        ->get();
}

/* hier tabellen name ändern */
function allAlldayEventOfCompany($companyId)
{
    return DB::table('work_time_preferred')
        ->join('category', 'category.id', '=', 'work_time_preferred.category_id')
        ->join('employees', 'employees.id', '=', 'work_time_preferred.employee_id')
        ->join('retail_store', 'retail_store.id', '=', 'employees.retail_store_id')
        ->where('retail_store.company_id', $companyId)
        ->get();
}

function getMondayBeforeDay($day) {
    return $day->modify('-' . ($day->format('N') - 1) . ' days');
}

function getWeekArray($monday) {
    return array(
        clone $monday,
        clone $monday->add(new DateInterval('P1D')),
        clone $monday->add(new DateInterval('P1D')),
        clone $monday->add(new DateInterval('P1D')),
        clone $monday->add(new DateInterval('P1D')),
        clone $monday->add(new DateInterval('P1D')),
        clone $monday->add(new DateInterval('P1D'))
    );
}
