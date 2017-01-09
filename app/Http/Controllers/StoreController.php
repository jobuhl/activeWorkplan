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

    protected function validator(array $request)
    {
        return Validator::make($request, [
            'country' => 'required|max:255',
            'city' => 'required|max:255',
            'street' => 'required|max:255',
            'street_nr' => 'required|max:255', //integer?nein!
            'postcode' => 'required|max:255',  //integer?nein!
            'name' => 'required|max:255',
        ]);
    }

    // Admin erstellt Reatil Store
    public function create(Request $request) {

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

        return redirect('/admin/employer-planning/' . $thisRetailStore->id . '/' . $request['thisDate']);
    }
}
