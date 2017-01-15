<?php

namespace App\Http\Controllers\AdminAuth;

use App\Admin;
use App\Country;
use App\City;
use App\Address;
use App\Company;

use App\RetailStore;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin.guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $request)
    {
        return Validator::make($request, [
            'name' => 'required|max:255',
            'forename' => 'required|max:255',
            'email' => 'required|email|max:255|unique:admins',
            'password' => 'required|min:6|confirmed',
            'company-name' => 'required|max:255',
            'street' => 'required|max:255',
            'street_nr' => 'required|max:255',
//            'postcode' => 'required|max:255',
            'city' => 'required|max:255',
            'country' => 'required|max:255',
            'store-name' => 'required|max:255',


        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $request
     * @return Admin
     */
    protected function create(array $request)
    {



        $admin = Admin::create([
            'name' => $request['name'],
            'forename' => $request['forename'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        // Datensatz nur erstellen, wenn noch nicht vorhanden
        $country = Country::firstOrCreate(array(
            'name' => $request['country']
        ));

        $city = City::firstOrCreate(array(
            'name' => $request['city'],
            'country_id' => $country->id
        ));

        // Adresse wird immer erstellt, falls Company umzieht -> einfacher zu warten
        $address = Address::create(array(
            'street' => $request['street'],
            'street_nr' => $request['street_nr'],
            'postcode' => $request['postcode'],
            'city_id' => $city->id
        ));

        $company = Company::create(array(
            'name' => $request['company-name'],
            'admin_id' => $admin->id,
            'address_id' => $address->id
        ));

        $country2 = Country::firstOrCreate(array(
            'name' => $request['country2']
        ));

        $city2 = City::firstOrCreate(array(
            'name' => $request['city2'],
            'country_id' => $country2->id
        ));

        $address2 = Address::create(array(
            'street' => $request['street2'],
            'street_nr' => $request['street_nr2'],
            'postcode' => $request['postcode2'],
            'city_id' => $city2->id
        ));

        $store = RetailStore::create(array(
            'name' => $request['store-name'],
            'company_id' => $company->id,
            'address_id' => $address2->id
        ));



        return $admin;
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('admin.auth.register');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }
}
