<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Year;
use Illuminate\Http\Request;

class TahunController extends Controller
{

    public function index()
    {
        $years = Year::get();
        return view('pages.Admin.Tagihan.tagihan_tahun_hapus', compact('years'));
    }

    public function create()
    {
        return view('pages.Admin.Tagihan.tagihan_tahun');
    }

    public function store( Request $request)
    {
        $request->validate([
            'tahun' => 'required|unique:years,tahun',
        ],[
            'tahun.required' => 'tahun tidak boleh kosong',
            'tahun.unique' => 'tahun sudah  sudah di buat',
        ]);
        $data = $request->all();
        Year::create($data);
        return back()->with('success', 'User created successfully.');
    }

    public function edit($id)
    {

    }

    public function destroy($id)
    {
        $data = Year::findOrFail($id);
        $tes = $data->delete();
        return back();
    }

}
