<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //    // Index
    public function Index()
    {
        return view('frontend.index');
    }
}
