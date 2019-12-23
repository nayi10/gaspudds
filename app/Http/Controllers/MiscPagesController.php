<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MiscPagesController extends Controller
{
    
    public function about()
    {
        return \view('misc.about');
    }

    public function contact()
    {
        return \view('misc.contact');
    }
}
