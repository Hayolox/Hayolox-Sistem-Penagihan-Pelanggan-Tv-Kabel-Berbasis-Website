<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Verification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class BillsController extends Controller
{
    public function index()
    {
        $bill = Bill::with(['user','month','year'])->where('user_id', Auth::user()->id)->count();
        $bills = Bill::with(['user','month','year'])->where('user_id', Auth::user()->id)->paginate();
        return view('pages.User.bills.bill',compact('bills','bill'));
    }

    public function manual($id)
    {
        $bill = Bill::findOrfail($id);
        return view('pages.User.bills.manual', compact('bill'));
    }

    public function pay($id)
    {
       $bill = Bill::findOrFail($id);
       Verification::create([
                'user_id' => Auth::user()->id,
                'month_id' => $bill->month_id,
                'year_id' => $bill->year_id,
       ]);

       Bill::where('id', $bill->id)->delete();

       return redirect()->route('bill-user');

       
    }
}
