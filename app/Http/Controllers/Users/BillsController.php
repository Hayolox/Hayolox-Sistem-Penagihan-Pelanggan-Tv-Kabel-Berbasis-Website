<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class BillsController extends Controller
{
    public function index()
    {
        $bill = Bill::with(['user','month','year'])->where('user_id', Auth::user()->id)->count();
        $bills = Bill::with(['user','month','year'])->where('user_id', Auth::user()->id)->latest()->get();
        return view('pages.User.bills.bill',compact('bills','bill'));
    }
}
