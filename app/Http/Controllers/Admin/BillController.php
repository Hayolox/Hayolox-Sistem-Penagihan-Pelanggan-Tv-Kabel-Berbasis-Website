<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Month;
use App\Models\User;
use App\Models\Year;
use Illuminate\Http\Request;
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
      
        $years = Year::get();
        $months = Month::get();
        $get = $request->month;
        if($request->month)
        {
            $bills =  Bill::with(['user'])->where('month_id', $request->month)->paginate(20); 
        }else{
            $bills =  Bill::with(['user'])->paginate(20);
        }
       return view('pages.Admin.Tagihan.index', compact('bills','years','months'));
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
            'month_id' => 'required|unique:bills,month_id',
        ],[
            'month_id.required' => 'bulan  tidak boleh kosong',
            'month_id.unique' => 'tagihan bulan ini sudah  sudah di buat',
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
        return redirect()->route('Tagihan.index');
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
    public function update(Request $request, Bill $bill)
    {
        //
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
