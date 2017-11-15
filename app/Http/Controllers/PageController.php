<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function homepage() 
    {
        
        return view('homepage');
    }
    
    public function blog() 
    {
        
        return view('blog');
    }
    
    public function custom($name) 
    {
        
        return view('custom');
    }
    
    public function instagram()
    {
        
        return view('instagram');
    }
    
}
