<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(){
        $packages=Package::where('status',true)->latest()->get();
        return view('pages.home',compact('packages'));
    }
}
