<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Train;

class HomeController extends Controller
{
    public function index(){
        $trains = Train::where('data_partenza', '=', now()->format('Y-m-d'))->get();
        return view('home', compact('trains'));
    }
}
