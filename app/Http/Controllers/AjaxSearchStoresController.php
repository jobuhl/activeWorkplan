<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class AjaxSearchStoresController extends Controller
{

    function getStoreEmp($characters)
    {
        $store = DB::table('retail_store')
            ->select('retail_store.*')
            ->join('company', 'company.id', '=', 'retail_store.company_id')
            ->where('company.admin_id', Auth::user()->id)
            ->where('retail_store.name', 'like', '%' . $characters . '%')
            ->get();

        $emp = DB::table('employees as e')
            ->select('e.name as surname', 'e.forename', 'e.retail_store_id')
            ->join('retail_store', 'e.retail_store_id', '=', 'retail_store.id')
            ->join('company', 'company.id', '=', 'retail_store.company_id')
            ->where('company.admin_id', Auth::user()->id)
            ->where('employees.name', 'like', '%' . $characters . '%')
            ->get();

        return response()->json(["store" => $store, "emp" => $emp]);
    }


    function getStoreEmp2()
    {

        $store = DB::table('retail_store')
            ->select('retail_store.*')
            ->join('company', 'company.id', '=', 'retail_store.company_id')
            ->where('company.admin_id', Auth::user()->id)
            ->where('retail_store.name', 'like', '%' . $_GET['search'] . '%')
            ->get();

        $emp = DB::table('employees')
            ->select('employees.name as surname', 'forename', 'retail_store_id')
            ->join('retail_store', 'employees.retail_store_id', '=', 'retail_store.id')
            ->join('company', 'company.id', '=', 'retail_store.company_id')
            ->where('company.admin_id', Auth::user()->id)
            ->where('employees.name', 'like', '%' . $_GET['search'] . '%')
            ->get();

        $html = "";
        foreach($store as $thisStore) {
            $html .= "<div class='each-element'><div class='each-element'>";
            $html .= "<div class='up-element form-control' draggable='true'>";

            $html .= "<a class='element-text form-control'";
            $html .= "href='" . $_GET['storeUrl'] . "/" . $thisStore->id . "/" . $_GET['week'] . "'>";
            $html .= $thisStore->name;
            $html .= "</a>";

            $html .= "<a class='element-arrow form-control'>⋁</a></div></div>";
        }

        return response($html);
    }
}
