<?php

namespace App\Http\Controllers;


use DB;
use Auth;
use App\Employee;
use App\Role;
use App\Contract;
use Validator;


use Illuminate\Http\Request;

class EmpController extends Controller
{

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:employees',
            'password' => 'required|min:6|confirmed',
        ]);
    }

//    protected function getValue(Request $data) {
//
//        return $data['select-emp'];
//
//    }

    public

//Admin legt user an
    function create(Request $data)
    {
        $retailStore = DB::table('retail_store')
            ->where('retail_store.name', $data['retail_store_name'])
            ->get()[0];

        $role = Role::firstOrCreate(array(
            'name' => $data['roleid']
        ));

        $contracts = Contract::create([
            'period_of_agreement' => $data['period_of_agreement'],
            'working_hours' => $data['working_hours'],
            'classification' => $data['classification'],
            'role_id' => $role->id,

        ]);

        $thisEmployee = Employee::create([
            'name' => $data['name'],
            'forename' => $data['forename'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'retail_store_id' => $retailStore->id,
            'contract_id' => $contracts->id,
        ]);

        return redirect('/admin/employee-single/' . $thisEmployee->id);
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

        return redirect('/employee/employee-account');
    }

//Admin löscht user
    public function delete(Request $request)
    {


    }

//Admin ändert User
    public function change(Request $request){

    }

}
