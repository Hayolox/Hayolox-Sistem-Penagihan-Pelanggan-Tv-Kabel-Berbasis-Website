<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuksesController extends Controller
{
    public function index()
    {
        return view('pages.Admin.sukses.index');
    }
}
