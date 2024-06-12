<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DishController extends Controller
{
    public function index()
    {
        $dishs = Dish::paginate(3);
        return view("admin.dish.list", compact("dishs"));
    }
    public function create()
    {
        $categories = Category::all();
        return view("admin.dish.create",compact("categories"));
    }
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'id_category' => 'required',
                'title' => 'required',
                'image' => 'required',
                'description' => 'required',

            ],
            [
                'tittle.required' => 'Bạn chưa nhập tiêu đề',
                'description.required' => 'Bạn chưa nhập nội dung',
                'image.required' => 'Bạn chưa tải hình ảnh',
                'id_category.required' => 'Bạn chưa nhập danh mục',
            ]
        );
        
        //2 slug trung nhau 
        $slug = Str::slug($request->title);

        $checkSlug = Category::where('slug', $slug)->first();
        //neu da ton tai slug nay thi se noi chuoi vao cho no
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
                || strnatcasecmp($extension, 'jepg') == 0
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
                'description' => $request->description,
                'image' => $image,
                'view_count' => 0,
                'user_id' => 1, //Auth::id() lay id cua nguoi dung dang dang nhap
                'new_post' => $request->new_post ? 1 : 0,
                // 'slug' => $request->slug,
                'slug' => $slug,
                'id_category' => $request->id_category,
                'highlight_post' => $request->highlight_post ? 1 : 0,
            ]
        );
        return redirect()->route("admin.dish.index")->with("success", "Create Successfully");
    }

    public function edit($id)
    {
        $dish = Dish::find($id);
        $categories = Category::all();
        return view("admin.dish.edit", compact("dish","categories"));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate(
            [
                'id_category' => 'required',
                'title' => 'required',
                'description' => 'required',

            ],
            [
                'tittle.required' => 'Bạn chưa nhập tên thể loại',
                'description.required' => 'Bạn chưa nhập nội dung',
                'id_category.required' => 'Bạn chưa nhập danh mục',
            ]
        );

        $slug = Str::slug($request->title);
        $checkSlug = Dish::where('slug', $slug)->first();
       
        while ($checkSlug) {
            $slug = $checkSlug->slug . Str::random(5);
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

        $dish = Dish::find($id);
        $dish->update([
            'title' => $request->title,
            'description' => $request->description,
            // kiem tra neu co bien image do thi se doi, con ko thi lu lai cai cu
            'image' => isset($image) ? $image : $dish->image,
            'new_post' => $request->new_post ? 1 : 0,
            'slug' => $slug,
            'id_category' => $request->id_category,
            'highlight_post' => $request->highlight_post ? 1 : 0,
        ]);
     
        return redirect()->route("admin.dish.edit", $id)->with("success", "Update Successfully");
    }

    public function delete($id)
    {
        Dish::find($id)->delete(); 
        return redirect()->route("admin.dish.index")->with("success","Delete Successfully");
    }
}
