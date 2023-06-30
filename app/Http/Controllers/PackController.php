<?php

namespace App\Http\Controllers;

use App\Models\Packs;
use Illuminate\Http\Request;

class PackController extends Controller
{
    public function index(){
        return view('pages.pricing')->with([
            'packs' => Packs::all()->keyBy('id'),
        ]);
    }
}
