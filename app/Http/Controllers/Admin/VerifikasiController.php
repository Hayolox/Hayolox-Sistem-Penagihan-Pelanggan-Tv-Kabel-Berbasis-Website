<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\succes;
use App\Models\Verification;
use Illuminate\Http\Request;

class VerifikasiController extends Controller
{
    public function index()
    {
        $verifikasions =  Verification::latest()->paginate();
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

    public function succes($id)
    {

        $confirm = Verification::findOrfail($id);

        succes::create([
             'user_id' => $confirm->user_id,
             'month_id' => $confirm->month_id,
             'year_id' => $confirm->year_id,
             'status' => 'Succes',
        ]);

        Verification::where('id', $confirm->id)->delete();
        return back()->withToastSuccess('Data verification ' . $confirm->user->name . ' di confirm');
    }
}
