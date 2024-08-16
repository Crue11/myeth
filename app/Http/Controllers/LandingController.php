<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function landingPage(){
        return view('landing.index');
    }
    public function completionPage(){
        return view('completion10.index');
    }

    public function symbolPage(){
        return view('symbol.index');
    }
}
