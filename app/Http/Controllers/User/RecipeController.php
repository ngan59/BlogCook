<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RecipeController extends Controller
{
    // đăng công thức nấu ăn 
    public function create()
    {
        $categories = Category::all();
        return view('web.create',compact('categories')    );
    }
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'id_category' => 'required',
                'title' => 'required',
                'summary' => 'required',
                'image' => 'required',
                'description' => 'required',

            ],
            [
                'tittle.required' => 'Bạn chưa nhập tiêu đề',
                'summary.required' => 'Bạn chưa nhập tóm tắt',
                'description.required' => 'Bạn chưa nhập nội dung',
                'image.required' => 'Bạn chưa tải hình ảnh',
                'id_category.required' => 'Bạn chưa nhập danh mục',
            ]
        );

        $slug = Str::slug($request->title);

        $checkSlug = Dish::where('slug', $slug)->first();
        while ($checkSlug) {
            $slug = $checkSlug->slug . Str::random(2);
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name_file = $file->getClientOriginalName();

            $extension = pathinfo($name_file, PATHINFO_EXTENSION);


            if (
                strnatcasecmp($extension, 'jpg') == 0
                || strnatcasecmp($extension, 'png') == 0
                || strnatcasecmp($extension, 'jpeg') == 0
            ) {


                $image = Str::random(5) . "_" . $name_file;

                while (file_exists("image/dish" . $image)) {
                    $image = Str::random(5) . "_" . $name_file;
                }
                $file->move('image/dish', $image);
            }
        }
        Dish::create(
            [
                'title' => $request->title,
                'summary' => $request->summary,
                'description' => $request->description,
                'image' => $image,
                'view_count' => 0,
                'user_id' => Auth::id(),
                'new_post' => $request->new_post ? 1 : 0,
                'slug' => $slug,
                'id_category' => $request->id_category,
                'highlight_post' => $request->highlight_post ? 1 : 0,
            ]
        );

        return redirect()->route('recipes.create')->with('success', 'Bạn đã đăng công thức thành công ');
    }
    // public function view($id)
    // {
    //     $dish = Dish::findOrFail($id);
    //     return view('admin.dish.view', compact('dish'));
    // }

}
