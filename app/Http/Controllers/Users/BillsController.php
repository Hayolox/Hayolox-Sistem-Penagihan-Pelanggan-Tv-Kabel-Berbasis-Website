<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\succes;
use App\Models\User;
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

       return redirect('https://api.whatsapp.com/send?phone=+6282157893482&text=Silahkan+konfirmasi+pembayaran+dengan+mengisi+datat+di+bawah+ini%0ANama+%3A%0AAlamat+%3A%0ANo+pembayaran+%3A%0ANo+Hp+%3A%0A*jangan+lupa+kirim+bukti+transfer*');
    }



    public function riwayat()
    {
        $bills = Verification::with(['user','month','year'])->where('user_id', Auth::user()->id)->get();
        $succes = succes::with(['user','month','year'])->where('user_id', Auth::user()->id)->latest()->paginate('5');
        return view('pages.User.bills.riwayat', compact('bills','succes'));
    }

    public function createprofil($id)
    {
        $user = User::findOrFail($id);
        return view('pages.User.profil.index', compact('user'));
    }

    public function updateprofil($id, Request $request)
    {

        $data = $request->all();
        $item = User::findOrfail($id);
        if($request->password)
        {
            $data['password'] = bcrypt($request->password);
        }else{
            unset($data['password']);
        }
        $item->update($data);
        return back()->withToastSuccess('Data user berhasil di ubah');
    }


}
