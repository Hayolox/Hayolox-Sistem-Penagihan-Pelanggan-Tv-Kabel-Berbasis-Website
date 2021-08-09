<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\succes;
use Illuminate\Http\Request;

class SuksesController extends Controller
{
    public function index()
    {
        $succes = succes::where('status', 'SUCCESS')->latest()->paginate();
        return view('pages.Admin.sukses.index', compact('succes'));
    }
}
