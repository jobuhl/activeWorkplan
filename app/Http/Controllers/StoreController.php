<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\RetailStore;
use App\Country;
use App\City;
use App\Address;
use Validator;


use Illuminate\Http\Request;

class StoreController extends Controller
{

    // Admin erstellt Reatil Store
    public function create(Request $request)
    {
        $this->validate($request, [
              'name' => 'required|max:255|',
              'street' => 'required|max:255|',
              'postcode' => 'required|max:255|',
              'city' => 'required|max:255|',
              'street_nr' => 'required|max:255|',
              'country' => 'required|max:255|',
        ]);

        /* Aktuelle Company rausbekommen */
        $company = thisCompany();


        /* Daten speichern */
        // Datensatz nur erstellen, wenn noch nicht vorhanden
        $newCountry = Country::firstOrCreate(array(
            'name' => $request['country']
        ));

        $newCity = City::firstOrCreate(array(
            'name' => $request['city'],
            'country_id' => $newCountry->id
        ));

        // Adresse wird immer erstellt, falls Company umzieht -> einfacher zu warten
        $newAddress = Address::create(array(
            'street' => $request['street'],
            'street_nr' => $request['street_nr'],
            'postcode' => $request['postcode'],
            'city_id' => $newCity->id
        ));

        $thisRetailStore = RetailStore::create(array(
            'name' => $request['name'],
            'company_id' => $company->id,
            'address_id' => $newAddress->id
        ));


        flash('Store added', 'success');
        return redirect('/admin/planning-store/' . $thisRetailStore->id . '/' . $request['thisDate']);
    }

    public function change(Request $request)
    {
        $this->validate($request, [
            'store_name' => 'required|max:255|',
            'street' => 'required|max:255|',
            'postcode' => 'required|max:255|',
            'city' => 'required|max:255|',
            'nr' => 'required|max:255|',
            'country' => 'required|max:255|',
        ]);

        $store = RetailStore::find($request['thisRetailStoreId']);

        $country = Country::firstOrCreate(array(
            'name' => $request['country']
        ));

        $city = City::firstOrCreate(array(
            'name' => $request['city'],
            'country_id' => $country->id
        ));


        Address::where('address.id', $store->address_id)
            ->update(array(
                'street' => $request['street'],
                'street_nr' => $request['nr'],
                'postcode' => $request['postcode'],
                'city_id' => $city->id,
            ));

        $address = DB::table('address')
            ->where('address.id', $store->address_id)
            ->get()[0];


        RetailStore::where('retail_store.id', $store->id)
            ->update(array(
                'name' => $request['store_name'],
                'address_id' => $address->id,

            ));

        $company = DB::table('company')
            ->where('company.admin_id', Auth::user()->id)
            ->get()[0];

        $allRetailStores = DB::table('retail_store')
            ->where('retail_store.company_id', $company->id)
            ->get();

        flash('Change successful', 'success');

        return redirect('/admin/planning-store/' . $store->id . '/' . $request['thisDate']);

    }

    public function delete(Request $request)
    {

        $retailStore = DB::table('retail_store')
            ->where('retail_store.id', $request['thisRetailStoreId']);

        $addressRetailStore = DB::table('address')
            ->select('address.*')
            ->join('retail_store', 'retail_store.address_id', '=', 'address.id')
            ->where('retail_store.id', $retailStore->get()[0]->id);

        $employees = DB::table('employees')
            ->select('employees.*')
            ->join('retail_store', 'retail_store.id', '=', 'employees.retail_store_id')
            ->where('retail_store.id', $retailStore->get()[0]->id);

        $contracts = DB::table('contract')
            ->select('contract.*')
            ->join('employees', 'employees.contract_id', '=', 'contract.id')
            ->join('retail_store', 'retail_store.id', '=', 'employees.retail_store_id')
            ->where('retail_store.id', $retailStore->get()[0]->id);

        $roles = DB::table('role')
            ->select('role.*')
            ->join('contract', 'contract.role_id', '=', 'role.id')
            ->join('employees', 'employees.contract_id', '=', 'contract.id')
            ->join('retail_store', 'retail_store.id', '=', 'employees.retail_store_id')
            ->where('retail_store.id', $retailStore->get()[0]->id);

        $timeEvent = DB::table('time_event')
            ->select('time_event.*')
            ->join('employees', 'employees.id', '=', 'time_event.employee_id')
            ->join('retail_store', 'retail_store.id', '=', 'employees.retail_store_id')
            ->where('retail_store.id', $retailStore->get()[0]->id);

        $alldayEvent = DB::table('allday_event')
            ->select('allday_event.*')
            ->join('employees', 'employees.id', '=', 'allday_event.employee_id')
            ->join('retail_store', 'retail_store.id', '=', 'employees.retail_store_id')
            ->where('retail_store.id', $retailStore->get()[0]->id);

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        $alldayEvent->delete();
        $timeEvent->delete();
        $employees->delete();
        $contracts->delete();
        $roles->delete();
        $retailStore->delete();
        $addressRetailStore->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');




        $company = DB::table('company')
            ->where('company.admin_id', Auth::user()->id)
            ->get()[0];

        $amountOfRetailStores = DB::table('retail_store')
            ->where('retail_store.company_id', $company->id)
            ->count();

        $allRetailStores = DB::table('retail_store')
            ->where('retail_store.company_id', $company->id)
            ->get();

        flash('Store delete was successful', 'success');
        return redirect('/admin/planning-store/' . ($amountOfRetailStores == 0 ? '0' : $allRetailStores[0]->id) . '/' . $request['thisDate']);

    }
}
