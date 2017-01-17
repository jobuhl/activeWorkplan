<?php

namespace App\Http\Controllers;

use App\City;
use App\Company;
use App\Address;
use App\Country;
use DB;
use Auth;
use App\Admin;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{


    protected function update(Request $request)
    {
        $this->validate($request, [


            'name' => 'required|max:255|',
            'forename' => 'required|max:255|',
            'company_name' => 'required|max:255',
            'street' => 'required|max:255',
            'street_nr' => 'required|max:255',
            'postcode' => 'required|max:255',
            'city' => 'required|max:255',
            'country' => 'required|max:255',


        ]);


        $admin = Admin::find(Auth::user()->id);


        $company = DB::table('company')
            ->where('company.admin_id', $admin->id)
            ->get()[0];

        $address = Address::find($company->address_id);


        $country = Country::firstOrCreate(array(
            'name' => $request['country']
        ));

        $city = City::firstOrCreate(array(
            'name' => $request['city'],
            'country_id' => $country->id
        ));


        Address::where('address.id', $company->id)
            ->update(array(

                'street' => $request['street'],
                'street_nr' => $request['street_nr'],
                'postcode' => $request['postcode'],
                'city_id' => $city->id
            ));


        Admin::where('admins.id', $admin->id)
            ->update(array(
                'forename' => $request['forename'],
                'name' => $request['name'],
            ))[0];

        Company::where('company.id', $company->id)
            ->update(array(
                'name' => $request['company_name'],
                'address_id' => $address->id,
                'admin_id' => $admin->id
            ));

        flash('Change successful', 'success');
        return redirect('/admin/employer-account/' . $request['thisDate']);
    }

    protected function update_email(Request $request)
    {

        $admin = Admin::find(Auth::user()->id);

        $this->validate($request, [

            'email' => 'required|email|max:255|unique:admins',

        ]);


        Admin::where('admins.id', $admin->id)
            ->update(array(
                'email' => $request['email'],
            ))[0];

        flash('Change successful', 'success');
        return redirect('/admin/employer-account/' . $request['thisDate']);

    }

    protected function update_password(Request $request)
    {

        $this->validate($request, [

            'old-password' => 'required',
            'password' => 'required|min:6|confirmed',

        ]);

        if (Hash::check($request['old-password'], Auth::user()->password)) {

            $admin = Admin::find(Auth::user()->id);

            Admin::where('admins.id', $admin->id)
                ->update(array(
                    'password' => Hash::make($request['password']),
                ));



        }


        flash('Change successful', 'success');
        return redirect('/admin/employer-account/' . $request['thisDate']);

    }

    protected function delete(Request $request)
    {

        $this->validate($request, [

            'password' => 'required',

        ]);

        if (Hash::check($request['password'], Auth::user()->password)) {

            $admin = Admin::find(Auth::user()->id);

            $company = DB::table('company')
                ->where('company.admin_id', $admin->id);

            $addressCompany = DB::table('address')
                ->where('address.id', $company->get()[0]->id);

            $retailStores = DB::table('retail_store')
                ->where('retail_store.company_id', $company->get()[0]->id);

            $addressRetailStores = DB::table('address')
                ->select('address.*')
                ->join('retail_store', 'retail_store.address_id', '=', 'address.id')
                ->where('retail_store.company_id', $company->get()[0]->id);

            $employeePerHour = DB::table('employee_per_hour')
                ->select('employee_per_hour.*')
                ->join('retail_store', 'retail_store.id', '=', 'employee_per_hour.retail_store_id')
                ->where('retail_store.company_id', $company->get()[0]->id);

            $employees = DB::table('employees')
                ->select('employees.*')
                ->join('retail_store', 'retail_store.id', '=', 'employees.retail_store_id')
                ->where('retail_store.company_id', $company->get()[0]->id);

            $contracts = DB::table('contract')
                ->select('contract.*')
                ->join('employees', 'employees.contract_id', '=', 'contract.id')
                ->join('retail_store', 'retail_store.id', '=', 'employees.retail_store_id')
                ->where('retail_store.company_id', $company->get()[0]->id);

            $roles = DB::table('role')
                ->select('role.*')
                ->join('contract', 'contract.role_id', '=', 'role.id')
                ->join('employees', 'employees.contract_id', '=', 'contract.id')
                ->join('retail_store', 'retail_store.id', '=', 'employees.retail_store_id')
                ->where('retail_store.company_id', $company->get()[0]->id);

            $timeEvent = DB::table('time_event')
                ->select('time_event.*')
                ->join('employees', 'employees.id', '=', 'time_event.employee_id')
                ->join('retail_store', 'retail_store.id', '=', 'employees.retail_store_id')
                ->where('retail_store.company_id', $company->get()[0]->id);

            $alldayEvent = DB::table('allday_event')
                ->select('allday_event.*')
                ->join('employees', 'employees.id', '=', 'allday_event.employee_id')
                ->join('retail_store', 'retail_store.id', '=', 'employees.retail_store_id')
                ->where('retail_store.company_id', $company->get()[0]->id);

            $worktimFix = DB::table('worktime_fix')
                ->select('worktime_fix.*')
                ->join('employees', 'employees.id', '=', 'worktime_fix.employee_id')
                ->join('retail_store', 'retail_store.id', '=', 'employees.retail_store_id')
                ->where('retail_store.company_id', $company->get()[0]->id);


            //  Fremdschlüssel zeitweise außer Kraft setzen */
            DB::statement('SET FOREIGN_KEY_CHECKS=0');
            $alldayEvent->delete();
            $timeEvent->delete();
            $worktimFix->delete();
            $employeePerHour->delete();
            $employees->delete();
            $contracts->delete();
            $roles->delete();
            $retailStores->delete();
            $company->delete();
            $admin->delete();
            $addressCompany->delete();
            $addressRetailStores->delete();
            DB::statement('SET FOREIGN_KEY_CHECKS=1');

            flash('Delete successful', 'success');
            return redirect('/');

        }else{

            flash('Wrong password', 'danger');
            return redirect('/admin/employer-account/' . $request['thisDate']);
        }
    }


}