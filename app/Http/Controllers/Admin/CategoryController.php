<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Dish;
use Illuminate\Http\Request;
use Validate;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        //get category
        $categories = Category::all();
        // $categories = Category::paginate(3); phan trang
        return view("admin.category.list", compact("categories"));
    }
    public function create()
    {
        return view("admin.category.create");
    }
    public function store(Request $request)
    {


        $data = $request->validate(
            [
                'name' => 'required|min:3|max:50|unique:categories,name'
            ],
            [
                'name.required' => 'Bạn chưa nhập tên thể loại',
                'name.unique' => 'Tên thể loại đã tồn tại',
                'name.min' => 'Tên thể loại phải có độ dài từ 3 đến 50 kí tự',
                'name.max' => 'Tên thể loại phải có độ dài từ 3 đến 50 kí tự',
            ]
        );

        //2 slug trung nhau 
        $slug = Str::slug($request->name);

        $checkSlug = Category::where('slug', $slug)->first();
        //neu da ton tai slug nay thi se noi chuoi vao cho no
        while ($checkSlug) {
            $slug = $checkSlug->slug . Str::random(2);
        }

        $category = Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        return redirect()->route("admin.category.index")->with("success", "Thêm danh mục thành công");
    }
    public function edit($id)
    {
        //tìm category theo id
        $category = Category::find($id);
        return view("admin.category.edit", compact("category"));
    }
    public function update(Request $request, $id)
    {
        $data = $request->validate(
            [
                'name' => 'required|min:3|max:50|unique:categories,name'
            ],
            [
                'name.required' => 'Bạn chưa nhập tên thể loại',
                'name.unique' => 'Tên thể loại đã tồn tại',
                'name.min' => 'Tên thể loại phải có độ dài từ 3 đến 50 kí tự',
                'name.max' => 'Tên thể loại phải có độ dài từ 3 đến 50 kí tự',
            ]
        );

        //2 slug trung nhau 
        $slug = Str::slug($request->name);

        $checkSlug = Category::where('slug', $slug)->first();
        //neu da ton tai slug nay thi se noi chuoi vao cho no
        while ($checkSlug) {
            $slug = $checkSlug->slug . Str::random(2);
        }

        //sẽ tìm và update trực tiếp không cần tốn query
        $category = Category::find($id);
        $category = $category->update([
            "name" => $request->name,
        ]);
        // Category::where("id", $id)->update([
        //     "name" => $request->name,
        // ]);

        return redirect()->route("admin.category.index")->with("success", "Cập nhật danh mục thành công");
    }

    public function delete($id)
    {
        Dish::where('id_category', $id)->delete();
        Category::find($id)->delete();
        return redirect()->route("admin.category.index")->with("success", "Xóa danh mục thành công");
    }
}
