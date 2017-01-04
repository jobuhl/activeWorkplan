<?php

use Illuminate\Database\Seeder;
use App\Admin;
use App\Country;
use App\City;
use App\Address;
use App\Company;
use App\RetailStore;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = Admin::create(array(
            'forename' => 'Alex',
            'name' => 'Schmutz',
            'email' => 'my@email.com',
            'password' => bcrypt('b43G3jb4G')
        ));

        // Datensatz nur erstellen, wenn noch nicht vorhanden
        $country = Country::create(array(
            'name' => 'Deutschland'
        ));

        $city = City::create(array(
            'name' => 'Konstanz',
            'country_id' => $country->id
        ));

        // Adresse wird immer erstellt, falls Company umzieht -> einfacher zu warten
        $adminAddress = Address::create(array(
            'street' => 'myStreet',
            'street_nr' => '23a',
            'postcode' => '78464',
            'city_id' => $city->id
        ));

        $company = Company::create(array(
            'name' => 'myCompany',
            'admin_id' => $admins->id,
            'address_id' => $adminAddress->id
        ));

        $store1Address = Address::create(array(
            'street' => 'myStreet1',
            'street_nr' => '23a',
            'postcode' => '78464',
            'city_id' => $city->id
        ));

        $store2Address = Address::create(array(
            'street' => 'myStreet2',
            'street_nr' => '23a',
            'postcode' => '78464',
            'city_id' => $city->id
        ));

        $store3Address = Address::create(array(
            'street' => 'myStreet3',
            'street_nr' => '23a',
            'postcode' => '78464',
            'city_id' => $city->id
        ));

        $store1 = RetailStore::create(array(
            'name' => 'myRetailStore1',
            'company_id' => $company->id,
            'address_id' => $store1Address->id
        ));

        $store2 = RetailStore::create(array(
            'name' => 'myRetailStore2',
            'company_id' => $company->id,
            'address_id' => $store2Address->id
        ));

        $store3 = RetailStore::create(array(
            'name' => 'myRetailStore2',
            'company_id' => $company->id,
            'address_id' => $store3Address->id
        ));




    }
}
