<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Month;
use App\Models\User;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $months = Month::get();
    
        if($request->search)
        {
            $bills = DB::table('bills')->join('users', 'users.id', '=', 'bills.user_id')
            ->join('months', 'months.id', '=', 'bills.month_id')
            ->join('years', 'years.id', '=', 'bills.year_id')
            ->where('users.Nomor_pelanggan', 'LIKE', '%'.$request->search.'%')->paginate(50);
            return view('pages.Admin.Tagihan.index', compact('bills','months'));
        }else{
            $bills = DB::table('bills')->join('users', 'users.id', '=', 'bills.user_id')
            ->join('months', 'months.id', '=', 'bills.month_id')
            ->join('years', 'years.id', '=', 'bills.year_id')->paginate(50);
            return view('pages.Admin.Tagihan.index', compact('bills', 'months'));
        }
    }

    public function month($id)
    {
        $months = Month::get();
        $bills = DB::table('bills')->join('users', 'users.id', '=', 'bills.user_id')
        ->join('months', 'months.id', '=', 'bills.month_id')
        ->join('years', 'years.id', '=', 'bills.year_id')
        ->where('months.id', 'LIKE', '%'.$id.'%')->paginate(50);
        return view('pages.Admin.Tagihan.index', compact('bills', 'months'));
    }

    public function showinteries($id)
    {
        $months = Month::get();

        if($id == 10)
        {
            $bills = DB::table('bills')->join('users', 'users.id', '=', 'bills.user_id')
            ->join('months', 'months.id', '=', 'bills.month_id')
            ->join('years', 'years.id', '=', 'bills.year_id')->paginate(10);
            return view('pages.Admin.Tagihan.index', compact('bills', 'months'));
        }elseif($id == 50)
        {
            $bills = DB::table('bills')->join('users', 'users.id', '=', 'bills.user_id')
            ->join('months', 'months.id', '=', 'bills.month_id')
            ->join('years', 'years.id', '=', 'bills.year_id')->paginate(50);
            return view('pages.Admin.Tagihan.index', compact('bills', 'months'));
        }elseif($id == 100)
        {
            $bills = DB::table('bills')->join('users', 'users.id', '=', 'bills.user_id')
            ->join('months', 'months.id', '=', 'bills.month_id')
            ->join('years', 'years.id', '=', 'bills.year_id')->paginate(100);
            return view('pages.Admin.Tagihan.index', compact('bills', 'months'));
        }elseif($id != 10 or $id !=50 or $id != 100)
        {
            return back();
        }
        
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $months =  Month::get();
        $years = Year::get();
        return view('pages.Admin.Tagihan.tagihan', compact('months','years'));
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
        {$request->validate([
            'month_id'=> 'required',
            'year_id' => 'required',
        ],[
            'year_id.required' => 'Tahun tidak boleh kosong',
            'month_id.required' => 'Bulan tidak boleh kosong'
        ]);
        $users = User::where('roles', 'USERS')->get(); 
        if($request->month_id == 1)
        {
            $request->validate([
                'month_id' => 'unique:bills,month_id',
            ],
            [
                'month_id.unique' => 'Tagihan bulan January sudah buat',
            ]
        
            );
        }elseif($request->month_id == 2)
        {
            $request->validate([
                'month_id' => 'unique:bills,month_id',
            ],
            [
                'month_id.unique' => 'Tagihan bulan February sudah buat',
            ]
        
            );
        }elseif($request->month_id == 3)
        {
            $request->validate([
                'month_id' => 'unique:bills,month_id',
            ],
            [
                'month_id.unique' => 'Tagihan bulan Maret sudah buat',
            ]
        
            );
        }elseif($request->month_id == 4)
        {
            $request->validate([
                'month_id' => 'unique:bills,month_id',
            ],
            [
                'month_id.unique' => 'Tagihan bulan April sudah buat',
            ]
        
            );
        }elseif($request->month_id == 5)
        {
            $request->validate([
                'month_id' => 'unique:bills,month_id',
            ],
            [
                'month_id.unique' => 'Tagihan bulan Mei sudah buat',
            ]
        
            );
        }elseif($request->month_id == 6)
        {
            $request->validate([
                'month_id' => 'unique:bills,month_id',
            ],
            [
                'month_id.unique' => 'Tagihan bulan Juni sudah buat',
            ]
        
            );
        }elseif($request->month_id == 7)
        {
            $request->validate([
                'month_id' => 'unique:bills,month_id',
            ],
            [
                'month_id.unique' => 'Tagihan bulan July sudah buat',
            ]
        
            );
        }elseif($request->month_id == 8)
        {
            $request->validate([
                'month_id' => 'unique:bills,month_id',
            ],
            [
                'month_id.unique' => 'Tagihan bulan Agustus sudah buat',
            ]
        
            );
        }elseif($request->month_id == 9)
        {
            $request->validate([
                'month_id' => 'unique:bills,month_id',
            ],
            [
                'month_id.unique' => 'Tagihan bulan September sudah buat',
            ]
        
            );
        }elseif($request->month_id == 10)
        {
            $request->validate([
                'month_id' => 'unique:bills,month_id',
            ],
            [
                'month_id.unique' => 'Tagihan bulan Oktober sudah buat',
            ]
        
            );
        }elseif($request->month_id == 11)
        {
            $request->validate([
                'month_id' => 'unique:bills,month_id',
            ],
            [
                'month_id.unique' => 'Tagihan bulan November sudah buat',
            ]
        
            );
        }elseif($request->month_id == 12)
        {
            $request->validate([
                'month_id' => 'unique:bills,month_id',
            ],
            [
                'month_id.unique' => 'Tagihan bulan Desember sudah buat',
            ]
        
            );
        }
        
        foreach ( $users as $user)
        {
          Bill::create([
                'user_id' => $user->id,
                'month_id' => $request->month_id,
                'year_id' => $request->year_id,
            ]);
        }
        return redirect()->route('Tagihan.index')->withToastSuccess('Tagihan berhasil di buat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show(Bill $bill)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(Bill $bill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $bill = Bill::findOrFail($id);
       
        return redirect('https://api.whatsapp.com/send?phone=62'.$bill->user->no_hp.'&text=Halo+'.$bill->user->name.' anda+belum+membayar+tagihan+bulan+'.$bill->month->bulan.'+harap+bayar+segera.+Anda+bisa+bayar+secara+langsung+di+kantor+BataraTv+Jl.+Pramuka+atau+lewat+website+kami:+https://www.youtube.com/watch?v=bmVKaAV_7-A%0AApabila+ada+pertanyaan+silahkan+hubungi+di+0821520312+atau+chat+wa+ini'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bill $bill)
    {
        //
    }
}
