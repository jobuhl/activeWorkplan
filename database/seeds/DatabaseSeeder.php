<?php

use Illuminate\Database\Seeder;



class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$admin = DB::table('admin')->insert(array(
            'forename' => 'Alex',
            'surname' => 'Schmutz',
            'email' => 'my@email.com',
            'password' => bcrypt('b43G3jb4G')
        ));

        // Datensatz nur erstellen, wenn noch nicht vorhanden
        $country = DB::table('country')->insert(array(
            'name' => 'Deutschland'
        ));

        $city = DB::table('city')->insert(array(
            'name' => 'Konstanz',
            'country_id' => $country->id
        ));

        // Adresse wird immer erstellt, falls Company umzieht -> einfacher zu warten
        $adminAddress = DB::table('address')->insert(array(
            'street' => 'myStreet',
            'street_nr' => '23a',
            'postcode' => '78464',
            'city_id' => $city->id
        ));

        $company = DB::table('company')->insert(array(
            'name' => 'myCompany',
            'admin_id' => $admin->id,
            'address_id' => $adminAddress->id
        ));

        $store1Address = DB::table('address')->insert(array(
            'street' => 'myStreet1',
            'street_nr' => '23a',
            'postcode' => '78464',
            'city_id' => $city->id
        ));

        $store2Address = DB::table('address')->insert(array(
            'street' => 'myStreet2',
            'street_nr' => '23a',
            'postcode' => '78464',
            'city_id' => $city->id
        ));

        $store3Address = DB::table('address')->insert(array(
            'street' => 'myStreet3',
            'street_nr' => '23a',
            'postcode' => '78464',
            'city_id' => $city->id
        ));

        DB::table('retail_store')->insert(array(
            'name' => 'myRetailStore1',
            'company_id' => $company->id,
            'address_id' => $store1Address->id
        ));

        DB::table('retail_store')->insert(array(
            'name' => 'myRetailStore2',
            'company_id' => $company->id,
            'address_id' => $store2Address->id
        ));

        DB::table('retail_store')->insert(array(
            'name' => 'myRetailStore2',
            'company_id' => $company->id,
            'address_id' => $store3Address->id
        ));
*/

    }
}
