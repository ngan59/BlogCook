<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryEventController extends Controller
{
    public function index()
    {

        $categoriesevent = CategoryEvent::all();
        return view('admin.categoryevent.list', compact('categoriesevent'));
    }
    public function create()
    {
        return view("admin.categoryevent.create");
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'required|min:3|max:50|unique:categoriesevent,name'
            ],
            [
                'name.required' => 'Bạn chưa nhập tên thể loại sự kiện',
                'name.unique' => 'Tên thể loại sự kiện đã tồn tại',
                'name.min' => 'Tên thể loại sự kiện phải có độ dài từ 3 đến 50 kí tự',
                'name.max' => 'Tên thể loại sự kiện phải có độ dài từ 3 đến 50 kí tự',
            ]
        );

        //2 slug trung nhau 
        $slug = Str::slug($request->name);

        $checkSlug = CategoryEvent::where('slug', $slug)->first();
        //neu da ton tai slug nay thi se noi chuoi vao cho no
        while ($checkSlug) {
            $slug = $checkSlug->slug . Str::random(2);
        }

        $categoryevent = CategoryEvent::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        return redirect()->route("admin.categoryevent.index")->with("success", "Thêm danh mục thành công");
    }

    public function edit($id)
    {
        $categoryevent = CategoryEvent::find($id);
        return view("admin.categoryevent.edit", compact("categoryevent"));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate(
            [
                'name' => 'required|min:3|max:50|unique:categoriesevent,name'
            ],
            [
                'name.required' => 'Bạn chưa nhập tên thể loại sự kiện',
                'name.unique' => 'Tên thể loại sự kiện đã tồn tại',
                'name.min' => 'Tên thể loại sự kiện phải có độ dài từ 3 đến 50 kí tự',
                'name.max' => 'Tên thể loại sự kiện phải có độ dài từ 3 đến 50 kí tự',
            ]
        );

        //2 slug trung nhau 
        $slug = Str::slug($request->name);

        $checkSlug = CategoryEvent::where('slug', $slug)->first();
        //neu da ton tai slug nay thi se noi chuoi vao cho no
        while ($checkSlug) {
            $slug = $checkSlug->slug . Str::random(2);
        }

        //sẽ tìm và update trực tiếp không cần tốn query
        // $category = Category::find($id);
        // $category = $category->update([
        //     "name"=> $request->name, 
        // ]);
        CategoryEvent::where("id", $id)->update([
            "name" => $request->name,
        ]);

        return redirect()->route("admin.categoryevent.index")->with("success", "Cập nhật danh mục thành công");
    }
    public function delete($id)
    {
        CategoryEvent::where("id", $id)->delete();

        return redirect()->route("admin.categoryevent.index")->with("success", "Xóa danh mục thành công");
    }

}