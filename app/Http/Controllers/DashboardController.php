<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\mail;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        
            $totalSurat = mail::count();
            $totalKategori= category::count();
            $totalUser = User::count();

            return view('dashboard', compact('totalSurat', 'totalKategori', 'totalUser'))->with('title', 'Dashboard');
    }
}
