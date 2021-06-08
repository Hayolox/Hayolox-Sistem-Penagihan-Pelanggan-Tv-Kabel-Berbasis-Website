<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TahunController extends Controller
{

    public function index()
    {
        return view('pages.Admin.Tagihan.tagihan_tahun_hapus');
    }

    public function create()
    {
        return view('pages.Admin.Tagihan.tagihan_tahun');
    }

    public function store()
    {
        
    }

    public function destroy()
    {

    }

}
