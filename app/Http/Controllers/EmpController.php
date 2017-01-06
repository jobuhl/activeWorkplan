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

    public function create(Request $data)
    {


        /* Aktuelle Company rausbekommen */
        $company = DB::table('company')
            ->where('company.admin_id', Auth::user()->id)
            ->get();


        $retailStore = DB::table('retail_store')
            ->where('retail_store.name', $data['retail_store_name'])
            ->get();

        $role = Role::firstOrCreate(array(
            'name' => $data['roleid']
        ));

        $contracts = Contract::create([
            'period_of_agreement' => $data['period_of_agreement'],
            'working_hours' => $data['working_hours'],
            'classification' => $data['classification'],
            'role_id' =>  $role->id,

        ]);

        $emp = Employee::create([
            'name' => $data['name'],
            'forename' => $data['forename'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'retail_store_id' => $retailStore[0]->id,
            'contract_id' => $contracts->id,
        ]);










        $company = DB::table('company')
            ->where('company.admin_id', Auth::user()->id)
            ->get();

        $retailStores = DB::table('retail_store')
            ->where('retail_store.company_id', $company[0]->id)
            ->get();

        $employees = DB::table('employees')
            ->get();

        $employee = DB::table('employees')
            ->where('employees.id', $emp->id)
            ->get();

        $roles = DB::table('role')
            ->get();

        $contracts = DB::table('contract')
            ->get();

        $address = DB::table('address')
            ->where('address.id', $company[0]->id)
            ->get();

        $city = DB::table('city')
            ->where('city.id', $address[0]->id)
            ->get();

        $country = DB::table('country')
            ->where('country.id', $city[0]->id)
            ->get();


        //Auslesen der Datenbank für Selectfeld


        return view('admin.employer-planning-single-employee')
        ->with('retailStores', $retailStores)
        ->with('employees', $employees)
        ->with('employee', $employee[0])
        ->with('contracts', $contracts)
        ->with('roles', $roles)
        ->with('company', $company[0])
        ->with('address', $address[0])
        ->with('city', $city[0])
        ->with('country', $country[0]);

    }
}
