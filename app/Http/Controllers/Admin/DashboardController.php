<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::where('roles', 'USERS')->count();
        $bills = Bill::count();
        return view('pages.Admin.Dashboard',compact('users','bills'));
    }
}
