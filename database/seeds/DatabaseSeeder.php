<?php

use Illuminate\Database\Seeder;
use App\Admin;
use App\Country;
use App\City;
use App\Address;
use App\Company;
use App\RetailStore;
use App\Role;
use App\Contract;
use App\Employee;
use App\Category;
use App\AlldayFix;
use App\WorktimeFix;
use App\WorktimePreferred;



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
            'email' => 'admin@web.de',
            'password' => bcrypt('123456')
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

        /* ---------------------- Stores -------------------------- */
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

        /* ---------------------- Role -------------------------- */


        $role1 = Role::create(array(
            'name' => 'Cashier'
        ));

        $role2 = Role::create(array(
            'name' => 'stockman'
        ));

        $role3 = Role::create(array(
            'name' => 'office worker'
        ));

        /* ---------------------- Contract -------------------------- */

        $contract1 = Contract::create(array(
            'period_of_agreement' => 'unlimitted',
            'working_hours' => '40',
            'classification' => 'Full-Time',
            'role_id' => $role1->id
        ));

        $contract2 = Contract::create(array(
            'period_of_agreement' => 'unlimitted',
            'working_hours' => '30',
            'classification' => 'Part-Time',
            'role_id' => $role2->id
        ));

        $contract3 = Contract::create(array(
            'period_of_agreement' => 'unlimitted',
            'working_hours' => '20',
            'classification' => 'student-employee',
            'role_id' => $role3->id
        ));

        /* ---------------------- Employee -------------------------- */

        $employee1 = Employee::create(array(
            'forename' => 'Joachim',
            'name' => 'Buhl',
            'email' => 'emp@web.de',
            'password' => bcrypt('123456'),
            'retail_store_id' => $store1->id,
            'contract_id' => $contract1->id
        ));

        $employee2 = Employee::create(array(
            'forename' => 'Daniel',
            'name' => 'Haller',
            'email' => 'dani@web.de',
            'password' => bcrypt('123456'),
            'retail_store_id' => $store1->id,
            'contract_id' => $contract2->id
        ));

        $employee3 = Employee::create(array(
            'forename' => 'Fabian',
            'name' => 'Götz',
            'email' => 'fabi@web.de',
            'password' => bcrypt('123456'),
            'retail_store_id' => $store2->id,
            'contract_id' => $contract3->id
        ));

        $employee4 = Employee::create(array(
            'forename' => 'Simon',
            'name' => 'Geist',
            'email' => 'simon@web.de',
            'password' => bcrypt('123456'),
            'retail_store_id' => $store3->id,
            'contract_id' => $contract3->id
        ));

        /* ---------------------- Category -------------------------- */

        $category1 = Category::create(array(
            'name' => 'Work',
            'color' => 'blue'
        ));

        $category2 = Category::create(array(
            'name' => 'Vacation',
            'color' => 'yellow'
        ));

        $category3 = Category::create(array(
            'name' => 'Illness',
            'color' => 'red'
        ));

        $category4 = Category::create(array(
            'name' => 'Study',
            'color' => 'orange'
        ));

        $category5 = Category::create(array(
            'name' => 'Training',
            'color' => 'light-green'
        ));

        $category6 = Category::create(array(
            'name' => 'Seminar',
            'color' => 'dark-green'
        ));

        $category6 = Category::create(array(
            'name' => 'Private',
            'color' => 'grey'
        ));

        /* ---------------------- Worktime Preferred -------------------------- */

        $worktimePreferred1 = WorktimePreferred::create(array(
            'date' => date('2017-01-03'),
            'from' => '14:00',
            'to' => '18:00',
            'employee_id' => $employee1->id,
            'category_id' => $category1->id
        ));

        $worktimePreferred2 = WorktimePreferred::create(array(
            'date' => date('2017-01-04'),
            'from' => '8:00',
            'to' => '14:30',
            'employee_id' => $employee1->id,
            'category_id' => $category1->id
        ));

        $worktimePreferred2 = WorktimePreferred::create(array(
            'date' => date('2017-01-04'),
            'from' => '15:00',
            'to' => '20:00',
            'employee_id' => $employee1->id,
            'category_id' => $category4->id
        ));

        /* ---------------------- Allday Fix -------------------------- */

        $alldayFix1 = AlldayFix::create(array(
            'date' => date('2017-01-06'),
            'employee_id' => $employee1->id,
            'category_id' => $category2->id
        ));

        $alldayFix2 = AlldayFix::create(array(
            'date' => date('2017-01-07'),
            'employee_id' => $employee1->id,
            'category_id' => $category2->id
        ));







    }
}
