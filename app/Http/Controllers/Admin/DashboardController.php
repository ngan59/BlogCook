<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        $userCount = User::count();
        $postCount = Dish::count();
        $eventCount = Event::count();
       // $viewCount = View::sum('count');
        return view('admin.dashboard.index',compact('userCount','postCount','eventCount','users'));
    }
}
