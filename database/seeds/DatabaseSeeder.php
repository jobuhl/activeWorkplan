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


    /* ------------------------------------- ROLES ------------------------------------ */
    public function addRoles()
    {
        $roleArray = array(
            'Cashier',
            'Stockman',
            'Office Worker',
        );

        foreach ($roleArray as $roleName) {
            Role::create(array(
                'name' => $roleName,
            ));
        }
    }


    /* ------------------------------------- CATEGORY ------------------------------------ */
    public function addCategorys()
    {
        /* ORDER OF CATEGORY VERY IMPORTANT FOR SEEDS BECAUSE OF ID */
        $categoryArray = array(
            'Work' => 'blue',
            'Vacation' => 'yellow',
            'Illness' => 'red',
            'Study' => 'orange',
            'Training' => 'light-green',
            'Seminar' => 'dark-green',
            'Private' => 'grey'
        );

        foreach ($categoryArray as $key => $value) {
            Category::create(array(
                'name' => $key,
                'color' => $value,
            ));
        }
    }


    /* ------------------------------------- ADDRESS ------------------------------------ */
    public function addAddress($street, $nr, $postcode, $cityName, $countryName)
    {

        $thisCountry = Country::firstOrCreate(array(
            'name' => $countryName,
        ));

        $thisCity = City::firstOrCreate(array(
            'name' => $cityName,
            'country_id' => $thisCountry->id,
        ));


        return Address::create(array(
            'street' => $street,
            'street_nr' => $nr,
            'postcode' => $postcode,
            'city_id' => $thisCity->id,
        ));
    }


    /* ------------------------------------- COMPANY ------------------------------------ */
    public function addCompanies($companyName, $forename, $surname, $address)
    {
        if ($surname == 'Maier') {
            $email = 'admin@web.de';
        } else {
            $email = $forename . '.' . $surname . '@web.de';
        }

        $thisAdmin = Admin::create(array(
            'forename' => $forename,
            'name' => $surname,
            'email' => $email,
            'password' => bcrypt('123456')
        ));

        Company::create(array(
            'name' => $companyName,
            'admin_id' => $thisAdmin->id,
            'address_id' => $address->id
        ));
    }


    /* ------------------------------------- RETAIL Store ------------------------------------ */
    public function addRetailStore($storeAddress)
    {
        $amountOfCompanys = DB::table('company')->count();

        $thisStoreAddress = DB::table('address')
            ->select('address.street', 'city.name')
            ->join('city', 'city.id', '=', 'address.city_id')
            ->where('address.id', $storeAddress->id)
            ->get()[0];

        RetailStore::create(array(
            'name' => $thisStoreAddress->name . ' ' . $thisStoreAddress->street,
            'company_id' => rand(1, $amountOfCompanys),
            'address_id' => $storeAddress->id
        ));
    }


    /* ------------------------------------- EMPLOYEE ------------------------------------ */
    public function addEmployee($forename, $surname)
    {
        $amountOfStores = DB::table('retail_store')->count();

        // Contract
        $workingHours = rand(2, 9) * 5;
        $classification = 'Temporary Help';
        if ($workingHours <= 15) {
            $classification = 'Temporary Help';
        } elseif ($workingHours <= 25) {
            $classification = 'Student Employee';
        } elseif ($workingHours <= 35) {
            $classification = 'Part-Time Employee';
        } elseif ($workingHours <= 25) {
            $classification = 'Full-Time Employee';
        }

        $periodOfAgrArray = array('unlimitted', 'limitted');

        $thisContract = Contract::create(array(
            'period_of_agreement' => $periodOfAgrArray[rand(0, 1)],
            'working_hours' => $workingHours,
            'classification' => $classification,
            'role_id' => rand(1, 3),
        ));

        if ($surname == 'Buhl') {
            $email = 'emp@web.de';
        } else {
            $email = $forename . '.' . $surname . '@web.de';
        }

        Employee::create(array(
            'forename' => $forename,
            'name' => $surname,
            'email' => $email,
            'password' => bcrypt('123456'),
            'retail_store_id' => rand(1, $amountOfStores),
            'contract_id' => $thisContract->id
        ));
    }


    public function run()
    {
        $this->addRoles();
        $this->addCategorys();


        /* ---------------------- Company -------------------------- */

        $adminAddress1 = $this->addAddress('Alexanderplatz', '1', '10178', 'Berlin', 'Deutschland');
        $adminAddress2 = $this->addAddress('Sonnenstraße', '19', '80331', 'München', 'Deutschland');

        $this->addCompanies('Fshion Style GmbH', 'Daniel', 'Maier', $adminAddress1); // fuer login
        $this->addCompanies('IT-Support GmbH', 'Dieter', 'Menge', $adminAddress2);


        /* ---------------------- Retail Stores -------------------------- */

        $store1Address = $this->addAddress('Alexanderplatz', '3', '10178', 'Berlin', 'Deutschland');
        $store2Address = $this->addAddress('Königsstraße', '20-22', '70173', 'Stuttgart', 'Deutschland');
        $store3Address = $this->addAddress('Münsterplatz', '7', '78462', 'Konstanz', 'Deutschland');
        $store4Address = $this->addAddress('Breslauer Platz', '2B', '50668', 'Köln', 'Deutschland');
        $store5Address = $this->addAddress('Rosenstraße', '9', '80331', 'München', 'Deutschland');
        $store6Address = $this->addAddress('Schloßstraße', '2', '01067', 'Dresden', 'Deutschland');


        $this->addRetailStore($store1Address);
        $this->addRetailStore($store2Address);
        $this->addRetailStore($store3Address);
        $this->addRetailStore($store4Address);
        $this->addRetailStore($store5Address);
        $this->addRetailStore($store6Address);


        /* ---------------------- Employee -------------------------- */

        $this->addEmployee('Joachim', 'Buhl'); // fuer login
        $this->addEmployee('Simon', 'Maier');
        $this->addEmployee('Gerhart', 'Jung');
        $this->addEmployee('Jürgen', 'Friedrich');
        $this->addEmployee('Fabian', 'Gustav');
        $this->addEmployee('Olaf', 'Müller');
        $this->addEmployee('Maria', 'Wehrle');
        $this->addEmployee('Alena', 'Staubach');
        $this->addEmployee('Angelica', 'Biber');
        $this->addEmployee('Catharina', 'Altmeyer');
        $this->addEmployee('Kevin', 'Bayer');
        $this->addEmployee('Dario', 'Bergmann');
        $this->addEmployee('Jari', 'Dietrich');
        $this->addEmployee('Edith', 'Eckert');
        $this->addEmployee('Britta', 'Fink');
        $this->addEmployee('Ally', 'Fuchs');
        $this->addEmployee('Emily', 'Gericke');
        $this->addEmployee('Jerome', 'Goldschmidt');
        $this->addEmployee('Timm', 'Hellmich');
        $this->addEmployee('Patrick', 'Kapp');
        $this->addEmployee('Hilda', 'Kiesel');
        $this->addEmployee('Isabelle', 'Knaus');
        $this->addEmployee('Janine', 'Krammer');
        $this->addEmployee('Nicolas', 'Kuhlmann');
        $this->addEmployee('Michael', 'Kuhn');
        $this->addEmployee('Paul', 'Lehner');
        $this->addEmployee('Nicolas', 'Maucher');
        $this->addEmployee('Peter', 'Neubauer');
        $this->addEmployee('Steffen', 'Rahm');


        /* ----------------------- Time Event -------------------------- */

        $allEmployees = DB::table('employees')
            ->get();

        $min = array("00", "15", "30", "45");

        $nextNextSunnday = 14 - (new DateTime())->format('N');

        // alle Employees
        foreach ($allEmployees as $emp) {

            // 20 tage vor und zurück
            for ($day = -7; $day < 10; $day++) {


                $DBdate = ((new DateTime())->modify($day . ' days'))->format('d-m-Y');

                // Seltener Allday-Event
                if (($day + rand(-3, 3)) % rand(2, 5) == 0) {

                    // Category ID
                    // Illness moeglich wenn in vergangenheit
                    if ($day <= 1) {
                        $cat = rand(2, 7);
                    } else {

                        // Vacation Category
                        if (rand(0,4) == 0) {
                            $cat = 2;
                        } else {
                            // Rest Categorys
                            $cat = rand(4, 7);
                        }
                    }


                    // Normalerweise bei Events kein accepted
                    $accepted = false;

                    // Bei Vacation und Illness manchmal schon akzeptiert
                    if (($cat == 2 || $cat == 3) && rand(0, 1) == 0) {
                        $accepted = true;
                    }

                    // Create Allday Event
                    AlldayEvent::create(array(
                        'date' => $DBdate,
                        'accepted' => $accepted,
                        'employee_id' => $emp->id,
                        'category_id' => $cat,
                    ));
                } // Oefter Time-Event
                else {

                    // Randomize start / end time
                    $time = array(
                        rand(8, 15),
                        rand(16, 22),
                        rand(8, 11),
                        rand(12, 15),
                        rand(16, 18),
                        rand(19, 22)
                    );

                    // Normalerweise 1 Durchlauf -> 1 Event am Tag
                    $i = 0;

                    //zufalls-Variable speichern
                    $bool = ($day + rand(-3, 3)) % rand(4, 5) == 0;

                    // Seltener 2 Durchlauufe -> 2 Events am Tag
                    if ($bool) {
                        $i = 2;
                    }

                    // Falls mehrere Events an einem Tag
                    while ($i < 6) {

                        // another category (except Vacation) OR Work
                        if (($day + rand(-3, 3)) % rand(2, 5) == 0) {

                            // Krankheit (Category==3) nur wenn in vergangenheit
                            if ($day <= 1) {
                                $cat = rand(3, 6);
                            } else {
                                $cat = rand(4, 6);
                            }
                        } else {
                            $cat = 1;
                        }

                        // Damit in Creates die gleichen Minuten verwendet werden
                        $randomMinute1 = $min[rand(0, 3)];
                        $randomMinute2 = $min[rand(0, 3)];

                        // Normalerweise bei Events kein accepted
                        $accepted = false;

                        // Bei Vacation und Illness manchmal schon akzeptiert
                        if (($cat == 2 || $cat == 3) && rand(0, 1) == 0) {
                            $accepted = true;
                        }

                        // Create Time-Event
                        TimeEvent::create(array(
                            'date' => $DBdate,
                            'from' => $time[$i] . ':' . $randomMinute1,
                            'to' => $time[$i + 1] . ':' . $randomMinute2,
                            'accepted' => $accepted,
                            'employee_id' => $emp->id,
                            'category_id' => $cat,
                        ));


                        // Manchmal Worktime Fix Event
                        if ($day <= $nextNextSunnday && $cat == 1 && (rand(0,1) == 0 || rand(0,2) == 0)) {

                            // Create Worktime Fix
                            WorktimeFix::create(array(
                                'date' => $DBdate,
                                'from' => $time[$i] . ':' . $randomMinute1,
                                'to' => $time[$i + 1] . ':' . $randomMinute2,
                                'employee_id' => $emp->id,
                                'category_id' => 1,
                            ));
                        }


                        $i += 2;

                        if (!$bool) {
                            break;
                        }
                    }
                }
            }
        }
        /* ---------------------- Time Event Ende-------------------------- */

    }
}
