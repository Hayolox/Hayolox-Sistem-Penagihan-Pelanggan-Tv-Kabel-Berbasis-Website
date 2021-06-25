<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Verification;
use Illuminate\Http\Request;

class VerifikasiController extends Controller
{
    public function index()
    {
        $verifikasions =  Verification::get();
        return view('pages.Admin.verifikasi.index',compact('verifikasions'));
    }

    public function cancel($id)
    {
       $cancel = Verification::findOrfail($id);

       Bill::create([
            'user_id' => $cancel->user_id,
            'month_id' => $cancel->month_id,
            'year_id' => $cancel->year_id,
       ]);

       Verification::where('id', $cancel->id)->delete();
       return back()->withToastSuccess('Data verification ' . $cancel->user->name . ' di batalkan');
    }
}
