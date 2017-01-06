<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use App\Employee;
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

    public function create(Request $data) {


        /* Aktuelle Company rausbekommen */
        $company = DB::table('company')
            ->where('company.admin_id', Auth::user()->id)
            ->get();


        $emp = Employee::create([
            'name' => $data['name'],
            'forename' => $data['forename'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'retail_store_id'=> $data[ 'retail_store_id'],
            'contract_id'=> $data['contract_id'],
        ]);

        /* Daten zum uebergeben */
        $retailStores = DB::table('retail_store')
            ->where('retail_store.company_id', $company[0]->id)
            ->get();

        $employees = DB::table('employees')
            ->get();


        return view('admin.employer-planning');
    }
}
