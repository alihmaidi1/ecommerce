<?php

namespace App\Http\Controllers\site2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class checkout extends Controller
{
 
    public function index(){

        return view("site.checkout");
    }

    
}
