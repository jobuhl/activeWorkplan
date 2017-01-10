<?php

namespace App\Http\Controllers;


use App\Company;
use App\RetailStore;
use DB;
use Auth;
use App\Employee;
use App\Role;
use App\Contract;
use Validator;
use DateTime;


use Illuminate\Http\Request;

class EmpController extends Controller
{

    protected function validator(array $request)
    {
        return Validator::make($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:employees',
            'password' => 'required|min:6|confirmed',
        ]);
    }


//Admin legt user an
    public function create(Request $request)
    {
        $retailStore = DB::table('retail_store')
            ->where('retail_store.name', $request['retail_store_name'])
            ->get()[0];

        $role = Role::firstOrCreate(array(
            'name' => $request['roleid']
        ));

        $contracts = Contract::create([
            'period_of_agreement' => $request['period_of_agreement'],
            'working_hours' => $request['working_hours'],
            'classification' => $request['classification'],
            'role_id' => $role->id,

        ]);

        $thisEmployee = Employee::create([
            'name' => $request['name'],
            'forename' => $request['forename'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'retail_store_id' => $retailStore->id,
            'contract_id' => $contracts->id,
        ]);

        return redirect('/admin/employer-single/' . $thisEmployee->id . '/' . $request['thisDate']);
    }


//User ändert seine eigenen Werte
    public function update(Request $request)
    {
        $employee = Employee::find(Auth::user()->id);


        Employee::where('employees.id', $employee->id)
            ->update(array(

                'forename' => $request['forename'],
                'name' => $request['name'],
                'email' => $request['email'],

            ));

        return redirect('/employee/employee-account/' . $request['thisDate']);
    }

//Admin löscht user
    public function delete(Request $request)
    {

        $employee = Employee::find($request['thisEmployeeId']);

        dd($employee);

        $contracts = DB::table('contract')
            ->select('contract.*')
            ->join('employees', 'employees.contract_id', '=', 'contract.id')
            ->where('emloyees.id', $employee->get()[0]->id);

        $roles = DB::table('role')
            ->select('role.*')
            ->join('contract', 'contract.role_id', '=', 'role.id')
            ->join('employees', 'employees.contract_id', '=', 'contract.id')
            ->join('retail_store', 'retail_store.id', '=', 'employees.retail_store_id')
            ->where('emloyees.id', $employee->get()[0]->id);

        $timeEvent = DB::table('time_event')
            ->select('time_event.*')
            ->join('employees', 'employees.id', '=', 'time_event.employee_id')
            ->join('retail_store', 'retail_store.id', '=', 'employees.retail_store_id')
            ->where('emloyees.id', $employee->get()[0]->id);

        $alldayEvent = DB::table('allday_event')
            ->select('allday_event.*')
            ->join('employees', 'employees.id', '=', 'allday_event.employee_id')
            ->join('retail_store', 'retail_store.id', '=', 'employees.retail_store_id')
            ->where('emloyees.id', $employee->get()[0]->id);

        $worktimFix = DB::table('worktime_fix')
            ->select('worktime_fix.*')
            ->join('employees', 'employees.id', '=', 'worktime_fix.employee_id')
            ->join('retail_store', 'retail_store.id', '=', 'employees.retail_store_id')
            ->where('emloyees.id', $employee->get()[0]->id);

        $company = DB::table('company')
            ->where('company.admin_id', Auth::user()->id)
            ->get()[0];



        $allRetailStores = DB::table('retail_store')
            ->where('retail_store.company_id', $company->id)
            ->get();

        return redirect('/admin/employer-planning/' . $allRetailStores[0]->id . '/' . $request['thisDate']);

    }

//Admin ändert User
    public function change(Request $request)
    {


        $employee = Employee::find($request['thisEmployeeId']);



        $contract = DB::table('contract')
            ->join('employees', 'employees.contract_id', '=', 'contract.id')
            ->where('employees.id', $employee->id)
            ->get();

        Employee::where('employees.id', $employee->id)
            ->update(array(
                'forename' => $request['forename'],
                'name' => $request['name'],
                'email' => $request['email'],
                'retail_store_id' => $request['retail_store_name']
            ));

        Contract::where('contract.id', $employee->contract_id)
            ->update(array(
                'period_of_agreement' => $request['agreement'],
                'classification' => $request['classification'],
                'working_hours' => $request['working_hours']
            ));


        Role::where('role.id', $contract[0]->role_id)
            ->update(array(
                'name' => $request['role'],
            ));


        return redirect('/admin/employer-single/' . $employee->id . '/' . $request['thisDate']);


    }

}
