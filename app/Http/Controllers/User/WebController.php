<?php

namespace App\Http\Controllers\User;

use App\Models\Dish;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WebController extends Controller
{
    public function home()
    {
        $highlight = Dish::where("highlight_post", "1")
            ->take(3)->get();

        $new = Dish::where("new_post", 1)->take(10)->get();
        return view("web.home", compact("highlight", "new"));
    }

    public function dish($slug)
    {
        $dish = Dish::where('slug', $slug)->first();
        $dish->update([
            'view_count' => $dish->view_count + 1
        ]);

        $relate = Dish::where('id_category', $dish->id_category)->take(2)->inRandomOrder()->get();
        //bai viet noi bat
        $highlight = Dish::where("highlight_post", "1")
            ->take(3)->get();

            $comments = Comment::where('id_dish', $dish->id)->get();
        // $comment = Comment::where("id_dish",$dish->id)->paginate(10);
        return view('web.dish', compact('dish', 'relate', 'highlight','comments'));
    }

    public function comment(Request $request, $id)
    {
        $request->validate([
            'comment_description' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',  // Thêm validation cho rating
        ]);

        Comment::create([
            'comment_description' => $request->comment_description,
            'rating' => $request->rating,
            'user_id' => Auth::id(),
            'id_dish' => $id
        ]);
        return redirect()->back()->with('success', 'Bình luận của bạn đã được gửi.');
    }
    //bam vao se do ra het tat ca cac bai viet
    public function category()
    {
        $dishs = Dish::paginate(1);
        //lay het category
        $categories = Category::all();
        return view('web.category',compact('dishs','categories'));
    }

    public function categorySlug($slug)
    {
        $category = Category::where('slug',$slug)->first();
        $dishs = Dish::where('id_category',$category->id)->paginate(1);
        //lay het category
        $categories = Category::all();
        return view('web.category',compact('dishs','categories'));

    }

    public function contact()
    {
        return view('web.contact');
    }
    
    public function sendContact(Request $request)
    {
        Contact::create($request->all());
        return redirect()->route('web.contact')->with('success', 'Created contact successfully');
    }
}
