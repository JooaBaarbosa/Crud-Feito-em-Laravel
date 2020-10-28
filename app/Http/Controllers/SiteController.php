<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;


class SiteController extends Controller
{
    
    public function index()
    {
        $slides = Slide::all();
        return view('site.index', ['slides' => $slides]);
    }
    
}
