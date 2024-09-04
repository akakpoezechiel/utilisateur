<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function showdashboardForm()
    {

        $users = User::all();


        return view('dashboard', ["users" => $users]);
    }

}
