<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $admin = Auth::user();
        $users = User::paginate(10);
        $userCount = User::count();
        $postCount = Dish::count();
        $eventCount = Event::count();
        $latestPosts = Dish::where('status', '1')->orderBy('created_at', 'desc')->take(5)->get();
        $ongoingEvents = Event::where('start_date', '<=', now())->where('end_date', '>=', now())->get();
       // $viewCount = View::sum('count');
        return view('admin.dashboard.index',compact('userCount','postCount','eventCount','users','admin','latestPosts', 'ongoingEvents'));
    }

//     public function dashboard()
// {
//     $userCountJan = User::whereMonth('created_at', '01')->count();
//     $userCountFeb = User::whereMonth('created_at', '02')->count();
//     // Add similar queries for other months

//     $postCountJan = Dish::whereMonth('created_at', '01')->count();
//     $postCountFeb = Dish::whereMonth('created_at', '02')->count();
//     // Add similar queries for other months

//     $eventTitles = Event::pluck('title')->toArray();
//     $eventCounts = Event::pluck('count')->toArray(); // Example, adjust according to your data

//     return view('admin.dashboard.index', compact('userCountJan', 'userCountFeb', 'postCountJan', 'postCountFeb', 'eventTitles', 'eventCounts'));
// }

}
