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
use App\AlldayEvent;
use App\WorktimeFix;
use App\TimeEvent;



class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /* ---------------------- ADMIN -------------------------- */

        $admins1 = Admin::create(array(
            'forename' => 'Alex',
            'name' => 'Schmutz',
            'email' => 'admin@web.de',
            'password' => bcrypt('123456')
        ));

        $admins2 = Admin::create(array(
            'forename' => 'Daniel',
            'name' => 'fellhauer',
            'email' => 'daniel@web.de',
            'password' => bcrypt('123456')
        ));









        /* ---------------------- COUNTRY -------------------------- */
        $country = Country::create(array(
            'name' => 'Deutschland'
        ));

        /* ---------------------- CITY -------------------------- */
        $city1 = City::create(array(
            'name' => 'Berlin',
            'country_id' => $country->id
        ));

        $city2 = City::create(array(
            'name' => 'Stuttgart',
            'country_id' => $country->id
        ));

        $city3 = City::create(array(
            'name' => 'Konstanz',
            'country_id' => $country->id
        ));











        /* ---------------------- ADDRESS ADMIN -------------------------- */
        $adminAddress1 = Address::create(array(
            'street' => 'Alexanderplatz',
            'street_nr' => '1',
            'postcode' => '10178',
            'city_id' => $city1->id
        ));

        $adminAddress2 = Address::create(array(
            'street' => 'straße',
            'street_nr' => '22',
            'postcode' => 'eee',
            'city_id' => $city2->id
        ));

        /* ---------------------- COMPANY -------------------------- */
        $company1 = Company::create(array(
            'name' => 'UNI GmbH',
            'admin_id' => $admins2->id,
            'address_id' => $adminAddress1->id
        ));

        $company2 = Company::create(array(
            'name' => 'HTWG GmbH',
            'admin_id' => $admins1->id,
            'address_id' => $adminAddress2->id
        ));













        /* ---------------------- ADDRESS STORE -------------------------- */

        $store1Address = Address::create(array(
            'street' => 'Alexanderplatz',
            'street_nr' => '1',
            'postcode' => '10178',
            'city_id' => $city1->id
        ));

        $store2Address = Address::create(array(
            'street' => 'Königsstraße',
            'street_nr' => '20-22',
            'postcode' => '70173',
            'city_id' => $city2->id
        ));

        $store3Address = Address::create(array(
            'street' => 'Münsterplatz',
            'street_nr' => '7',
            'postcode' => '78462',
            'city_id' => $city3->id
        ));

        $store4Address = Address::create(array(
            'street' => 'Bablabla',
            'street_nr' => '122',
            'postcode' => '396322',
            'city_id' => $city2->id
        ));

        /* ---------------------- Stores -------------------------- */
        $store1 = RetailStore::create(array(
            'name' => 'Berlin Alexanderplatz',
            'company_id' => $company1->id,
            'address_id' => $store1Address->id
        ));

        $store2 = RetailStore::create(array(
            'name' => 'Stuttgart Bahnhofstraße',
            'company_id' => $company1->id,
            'address_id' => $store2Address->id
        ));

        $store3 = RetailStore::create(array(
            'name' => 'Konstanz Münsterplatz',
            'company_id' => $company2->id,
            'address_id' => $store3Address->id
        ));

        $store4 = RetailStore::create(array(
            'name' => 'Konstanz Gutstav-Hammer-Platz',
            'company_id' => $company2->id,
            'address_id' => $store4Address->id
        ));














        /* ---------------------- Role -------------------------- */

        $role1 = Role::create(array(
            'name' => 'Cashier'
        ));

        $role2 = Role::create(array(
            'name' => 'Stockman'
        ));

        $role3 = Role::create(array(
            'name' => 'Office Worker'
        ));

        $role4 = Role::create(array(
            'name' => 'Rolle4'
        ));

        $role5 = Role::create(array(
            'name' => 'Rolle5'
        ));

        $role6 = Role::create(array(
            'name' => 'Rolle6'
        ));

        $role7 = Role::create(array(
            'name' => 'Rolle7'
        ));

        $role8 = Role::create(array(
            'name' => 'Rolle8'
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
            'period_of_agreement' => 'limitted',
            'working_hours' => '20',
            'classification' => 'student-employee',
            'role_id' => $role3->id
        ));

        $contract4 = Contract::create(array(
            'period_of_agreement' => 'limitted',
            'working_hours' => '20',
            'classification' => 'student-employee',
            'role_id' => $role2->id
        ));

        $contract5 = Contract::create(array(
            'period_of_agreement' => 'unlimitted',
            'working_hours' => '40',
            'classification' => 'Full-Time',
            'role_id' => $role1->id
        ));

        $contract6 = Contract::create(array(
            'period_of_agreement' => 'unlimitted',
            'working_hours' => '30',
            'classification' => 'Part-Time',
            'role_id' => $role2->id
        ));

        $contract7 = Contract::create(array(
            'period_of_agreement' => 'limitted',
            'working_hours' => '20',
            'classification' => 'student-employee',
            'role_id' => $role3->id
        ));

        $contract8 = Contract::create(array(
            'period_of_agreement' => 'limitted',
            'working_hours' => '20',
            'classification' => 'student-employee',
            'role_id' => $role2->id
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
            'forename' => 'Gerhart',
            'name' => 'Jung',
            'email' => 'gerhart.jung@web.de',
            'password' => bcrypt('123456'),
            'retail_store_id' => $store2->id,
            'contract_id' => $contract2->id
        ));

        $employee3 = Employee::create(array(
            'forename' => 'Jürgen',
            'name' => 'Friedrich',
            'email' => 'jürgen.friedrich@web.de',
            'password' => bcrypt('123456'),
            'retail_store_id' => $store3->id,
            'contract_id' => $contract3->id
        ));

        $employee4 = Employee::create(array(
            'forename' => 'Simon',
            'name' => 'Weiler',
            'email' => 'simon.weiler@web.de',
            'password' => bcrypt('123456'),
            'retail_store_id' => $store4->id,
            'contract_id' => $contract4->id
        ));

        $employee5 = Employee::create(array(
            'forename' => 'Fabian',
            'name' => 'Gustav',
            'email' => 'fabian.gustav@web.de',
            'password' => bcrypt('123456'),
            'retail_store_id' => $store1->id,
            'contract_id' => $contract5->id
        ));

        $employee6 = Employee::create(array(
            'forename' => 'Hans',
            'name' => 'Mustafa',
            'email' => 'hans.mustafa@web.de',
            'password' => bcrypt('123456'),
            'retail_store_id' => $store2->id,
            'contract_id' => $contract6->id
        ));

        $employee7 = Employee::create(array(
            'forename' => 'Olaf',
            'name' => 'Maier',
            'email' => 'olaf.maier@web.de',
            'password' => bcrypt('123456'),
            'retail_store_id' => $store3->id,
            'contract_id' => $contract7->id
        ));

        $employee8 = Employee::create(array(
            'forename' => 'Maria',
            'name' => 'Müller',
            'email' => 'emp2@web.de',
            'password' => bcrypt('123456'),
            'retail_store_id' => $store4->id,
            'contract_id' => $contract8->id
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

        $category7 = Category::create(array(
            'name' => 'Private',
            'color' => 'grey'
        ));









        {
            /* ---------------------- Time Event -------------------------- */


            $minutes = array("00","15","30","45");

            for($i = -10; $i < 10; $i++) {

                do {
                    $from = rand(8,22);
                    $to = rand(8,22);
                } while($from > $to);

                TimeEvent::create(array(
                    'date' => date((new DateTime())->modify($i . ' days')->format('d-m-Y')),
                    'from' => $from . ':' . $minutes[rand(1,4)],
                    'to' => $to . ':' . $minutes[rand(1,4)],
                    'employee_id' => $employee1->id,
                    'category_id' => rand(1,7),
                ));
            }

//            $timeEvent2 = TimeEvent::create(array(
//                'date' => date((new TimeDate())->modify('+1 days')->format('d-m-Y')),
//                'from' => '8:00',
//                'to' => '14:00',
//                'employee_id' => $employee1->id,
//                'category_id' => $category1->id
//            ));
//
//            $timeEvent3 = TimeEvent::create(array(
//                'date' => date((new TimeDate())->modify('+1 days')->format('d-m-Y')),
//                'from' => '15:30',
//                'to' => '20:00',
//                'employee_id' => $employee1->id,
//                'category_id' => $category4->id
//            ));
//
//            $timeEvent4 = TimeEvent::create(array(
//                'date' => date((new TimeDate())->modify('+2 days')->format('d-m-Y')),
//                'from' => '8:00',
//                'to' => '22:00',
//                'employee_id' => $employee1->id,
//                'category_id' => $category1->id
//            ));
//
//            $timeEvent5 = TimeEvent::create(array(
//                'date' => date((new TimeDate())->modify('+3 days')->format('d-m-Y')),
//                'from' => '10:30',
//                'to' => '14:00',
//                'employee_id' => $employee1->id,
//                'category_id' => $category2->id
//            ));
//
//            $timeEvent6 = TimeEvent::create(array(
//                'date' => date((new TimeDate())->modify('+3 days')->format('d-m-Y')),
//                'from' => '12:00',
//                'to' => '17:30',
//                'employee_id' => $employee1->id,
//                'category_id' => $category1->id
//            ));
//
//            $timeEvent7 = TimeEvent::create(array(
//                'date' => date((new TimeDate())->modify('+4 days')->format('d-m-Y')),
//                'from' => '12:00',
//                'to' => '17:30',
//                'employee_id' => $employee1->id,
//                'category_id' => $category1->id
//            ));
//
//            $timeEvent8 = TimeEvent::create(array(
//                'date' => date((new TimeDate())->modify('+5 days')->format('d-m-Y')),
//                'from' => '12:00',
//                'to' => '14:00',
//                'employee_id' => $employee1->id,
//                'category_id' => $category6->id
//            ));
//
//            $timeEvent9 = TimeEvent::create(array(
//                'date' => date((new TimeDate())->modify('+6 days')->format('d-m-Y')),
//                'from' => '18:00',
//                'to' => '22:00',
//                'employee_id' => $employee1->id,
//                'category_id' => $category7->id
//            ));
//
//            $timeEvent10 = TimeEvent::create(array(
//                'date' => date((new TimeDate())->modify('+7 days')->format('d-m-Y')),
//                'from' => '16:00',
//                'to' => '20:00',
//                'employee_id' => $employee1->id,
//                'category_id' => $category7->id
//            ));

            /* ---------------------- Allday Event -------------------------- */

            $alldayEvent1 = AlldayEvent::create(array(
                'date' => date('2017-01-06'),
                'employee_id' => $employee1->id,
                'category_id' => $category2->id
            ));

            $alldayEvent2 = AlldayEvent::create(array(
                'date' => date('2017-01-07'),
                'employee_id' => $employee1->id,
                'category_id' => $category2->id
            ));


            /* ---------------------- Worktime Fix -------------------------- */

            $worktimeFix = WorktimeFix::create(array(
                'date' => date('2017-01-03'),
                'from' => '8:00',
                'to' => '10:00',
                'employee_id' => $employee1->id,
                'category_id' => $category1->id
            ));

            $worktimeFix = WorktimeFix::create(array(
                'date' => date('2017-01-03'),
                'from' => '16:00',
                'to' => '20:00',
                'employee_id' => $employee1->id,
                'category_id' => $category1->id
            ));

            $worktimeFix = WorktimeFix::create(array(
                'date' => date('2017-01-04'),
                'from' => '8:00',
                'to' => '12:00',
                'employee_id' => $employee1->id,
                'category_id' => $category1->id
            ));

            $worktimeFix = WorktimeFix::create(array(
                'date' => date('2017-01-05'),
                'from' => '17:00',
                'to' => '21:30',
                'employee_id' => $employee1->id,
                'category_id' => $category1->id
            ));





        }

    }
}
