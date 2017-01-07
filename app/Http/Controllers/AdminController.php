<?php

namespace App\Http\Controllers;


use DB;
use Auth;
use App\Admin;

use Validator;


use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function update(Request $request)
    {
        $admin = Admin::find(Auth::user()->id);

        Admin::where('admins.id', $admin->id)
            ->update(array(
                'email' => $request['email'],
                'forename' => $request['forename']
            ));


        return redirect('/admin/employer-account');
    }

}