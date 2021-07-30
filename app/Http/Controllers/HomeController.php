<?php

namespace App\Http\Controllers;

use App\Models\Hardware;
use App\Models\Purchase;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $hardware = Hardware::all();
        $purchase = Purchase::all();

        return view('home', compact('hardware', 'purchase'));
    }
}
