<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Input;
use App\RetailStore;
use Illuminate\Support\Str;
use Illuminate\Contracts\View\View;

class SearchController extends Controller
{
    public function executeSearch() {

        $q = $_GET['q'];
        echo '<a>$q</a>';

//        $keywords = Input::get('keywords');
//
//        echo "hi";
//        echo $keywords;
//
//        $stores = RetailStore::all();
//
//        echo $stores->first()->name;
//
//        $searchStores = new Collection();
//
//        foreach($stores as $oneStore) {
//            if ( Str::contains(Str::lover($oneStore->name), Str::lover($keywords))) {
//                $searchStores->add($oneStore);
//
//            }
//        }
//
//        return View::make('searchStores')
//            ->with('searchStores', $searchStores);
    }
}
