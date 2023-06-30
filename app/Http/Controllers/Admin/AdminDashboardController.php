<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    /**
     * AdminDashboardController constructor.
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        return view('admin.home');
    }
}
