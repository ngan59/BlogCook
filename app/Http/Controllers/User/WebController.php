<?php

namespace App\Http\Controllers\User;

use App\Models\CategoryEvent;
use App\Models\CategoryReport;
use App\Models\Dish;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Category;
use App\Models\Event;
use App\Models\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WebController extends Controller
{
    public function home()
    {
        $highlight = Dish::where('highlight_post', 1)->where('status', 1)->get(); 
        $slides = Slide::all();
        $new = Dish::where('new_post', 1)->where('status', 1)->paginate(10);

        return view("web.home", compact("highlight", "new", "slides"));
    }

    public function dish($slug)
    {
        $dish = Dish::where('slug', $slug)->first();
        $dish->update([
            'view_count' => $dish->view_count + 1
        ]);
        $reasons = CategoryReport::all();
        $relate = Dish::where('id_category', $dish->id_category)->whereNotIn('id', [$dish->id])->take(2)->get();
        //bai viet noi bat
        $highlight = Dish::where("highlight_post", "1")->take(5)->get();
        $comments = Comment::where('id_dish', $dish->id)->get();
        return view('web.dish', compact('dish', 'relate', 'highlight', 'comments','reasons',));
    }

    public function slide()
    {
    }

    public function search()
    {
        $tukhoa = $_GET['tukhoa'] ?? ''; 
        $dish = Dish::where('title', 'LIKE', '%' . $tukhoa . '%')->get();
        $categories = Category::all();
        return view('web.search', compact('dish', 'categories', 'tukhoa')); 
    }
    
    public function comment(Request $request, $id)
    {
        $request->validate(
            [
                'comment_description' => 'required|string|max:255',
                'rating' => 'required|integer|min:1|max:5',  
            ],
            [
                'comment_description.required' => 'Bạn chưa nhập bình luận',
                'comment_description.string' => 'Bình luận phải là một chuỗi ký tự',
                'comment_description.max' => 'Bình luận không được dài quá 255 ký tự',
                'rating.required' => 'Bạn chưa đánh giá',
                'rating.integer' => 'Đánh giá phải là một số nguyên',
                'rating.min' => 'Đánh giá phải từ 1 đến 5',
                'rating.max' => 'Đánh giá phải từ 1 đến 5',
            ]
        );

        Comment::create(
            [
                'comment_description' => $request->comment_description,
                'rating' => $request->rating,
                'user_id' => Auth::id(),
                'id_dish' => $id
            ],
        );
        return redirect()->back()->with('success', 'Bình luận của bạn đã được gửi.');
    }
    public function category()
    {
        $dishs = Dish::paginate(2);
        $categories = Category::all();
        return view('web.category', compact('dishs', 'categories'));
    }

    public function categorySlug($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $dishs = Dish::where('id_category', $category->id)->paginate(4);
        $categories = Category::all();
        return view('web.category', compact('dishs', 'categories',));
    }

    public function contact()
    {
        return view('web.contact');
    }

    public function sendContact(Request $request)
    {
        Contact::create($request->all());
        return redirect()->route('web.contact')->with('success', 'Gửi liên hệ thành công');
    }

    public function showReportForm($dishId)
    {
        $reasons = CategoryReport::all(); 
        $dish = Dish::findOrFail($dishId);
    
        return view('report-form', compact('reasons', 'dish'));
    }
}
