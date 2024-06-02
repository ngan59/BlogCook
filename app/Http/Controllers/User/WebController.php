<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function home()
    {
        $highLight = Dish::where("highlight_post","1")->take(3)->get();

        return view("web.home");
    }
  
}
