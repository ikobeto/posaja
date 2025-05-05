<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class categoryProduct extends Controller
{
   public function index ()
   {
    return view ('page.categoryProduct');
   }
}
