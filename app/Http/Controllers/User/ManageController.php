<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageController extends Controller
{
    public function index(){
        $dish = Auth::user()->dish; // Lấy các bài viết của user đã đăng nhập
        return view('web.manage', compact('dish'));
    }
    public function delete($id)
    {
        $dish = Dish::find($id);
    
    // Debug output
    // dd($id, $dish); 
    
    if ($dish) {
        $dish->delete();
        return redirect()->route('manage.index')->with('success', 'Dish deleted successfully.');
    } else {
        return redirect()->route('manage.index')->with('error', 'Dish not found.');
    }
    }
}
