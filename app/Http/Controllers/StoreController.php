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

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'country' => 'required|max:255',
            'city' => 'required|max:255',
            'street' => 'required|max:255',
            'street_nr' => 'required|max:255', //integer?nein!
            'postcode' => 'required|max:255',  //integer?nein!
            'name' => 'required|max:255',
        ]);
    }
    // Validierung klappt nicht :D
    /*Validator::make($data, [

    ]);*/
    public function create(Request $data) {




        /* Aktuelle Company rausbekommen */
        $company = DB::table('company')
            ->where('company.admin_id', Auth::user()->id)
            ->get();


        /* Daten speichern */
        // Datensatz nur erstellen, wenn noch nicht vorhanden
        $newCountry = Country::firstOrCreate(array(
            'name' => $data['country']
        ));

        $newCity = City::firstOrCreate(array(
            'name' => $data['city'],
            'country_id' => $newCountry->id
        ));

        // Adresse wird immer erstellt, falls Company umzieht -> einfacher zu warten
        $newAddress = Address::create(array(
            'street' => $data['street'],
            'street_nr' => $data['street_nr'],
            'postcode' => $data['postcode'],
            'city_id' => $newCity->id
        ));

        $thisRetailStore = RetailStore::create(array(
            'name' => $data['name'],
            'company_id' => $company[0]->id,
            'address_id' => $newAddress->id
        ));


        /* Daten zum uebergeben */
        $retailStores = DB::table('retail_store')
            ->where('retail_store.company_id', $company[0]->id)
            ->get();

        $employees = DB::table('employees')
            ->get();

        return view('admin.employer-planning')
            ->with('retailStores', $retailStores)
            ->with('thisRetailStore', $thisRetailStore)
            ->with('employees', $employees);
    }
}
