<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Input;
use App\RetailStore;
use Illuminate\Support\Str;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function executeSearch() {

//        $character = Request::input('inputValue');
        $company = thisCompany();
        $stores = allRetailStoresOfCompany($company->id);

//        $store = DB::table('retail_store')
//            ->select('retail_store.*')
//            ->join('company', 'company.id', '=', 'retail_store.company_id')
//            ->where('company.admin_id', 1)
//            ->where('retail_store.name', 'like', '%' . $characters . '%')
//            ->get();
//
//        $emp = DB::table('employees as e')
//            ->select('e.name as surname', 'e.forename', 'e.retail_store_id')
//            ->join('retail_store', 'e.retail_store_id', '=', 'retail_store.id')
//            ->join('company', 'company.id', '=', 'retail_store.company_id')
//            ->where('company.admin_id', 1)
//            ->where('employees.name', 'like', '%' . $characters . '%')
//            ->get();

//        return response()->json(["store" => $store, "emp" => $emp]);

//        foreach($stores as $oneStore) {
//            if ( Str::contains(Str::lover($oneStore->name), Str::lover($keywords))) {
//                $searchStores->add($oneStore);
//            }
//        }
    }
}
