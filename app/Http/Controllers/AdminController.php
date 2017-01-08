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


use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function update(Request $request)
    {
        $admin = Admin::find(Auth::user()->id);

        $company = DB::table('company')
            ->where('company.admin_id', $admin->id)
            ->get()[0];
        $address = Address::find($company->address_id);



        $country = Country::firstOrCreate(array(
            'name' => $request['country']
        ));
        $country->save();

        $city = City::firstOrCreate(array(
            'name' => $request['city'],
            'country_id' => $country->id
        ));
        $city->save();

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
                'email' => $request['email'],
            ))[0];

        Company::where('company.id', $company->id)
            ->update(array(
                'name' => $request['company_name'],
                'address_id' => $address->id,
                'admin_id' => $admin->id
            ));

        return redirect('/admin/employer-account');
    }

}