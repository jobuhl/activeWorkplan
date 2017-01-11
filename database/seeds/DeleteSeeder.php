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
use App\EmployeePerHour;


class DeleteSeeder extends Seeder
{
    /**
     * Run the delete database seeds.
     *
     * @return void
     */
    public function run()
    {

        //  Fremdschlüssel zeitweise außer Kraft setzen */
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

//        AlldayEvent::all()->delete();
//        TimeEvent::all()->delete();
//        WorktimeFix::all()->delete();
//        Category::all()->delete();
//        EmployeePerHour::all()->delete();
//        Employee::all()->delete();
//        Contract::all()->delete();
//        Role::all()->delete();
//        RetailStore::all()->delete();
//        Company::all()->delete();
//        Admin::all()->delete();
//        Address::all()->delete();
//        City::all()->delete();
//        Country::all()->delete();

        DB::statement('SET FOREIGN_KEY_CHECKS=1');

    }
}
