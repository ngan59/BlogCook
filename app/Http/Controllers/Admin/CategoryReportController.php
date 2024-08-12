<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryReport;
use Illuminate\Http\Request;

class CategoryReportController extends Controller
{
    public function index()
    {
        $categories = CategoryReport::all();
        return view("admin.categoryreport.list", compact("categories"));
    }
    public function create()
    {
        return view("admin.categoryreport.create");
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


        $category = CategoryReport::create([
            'name' => $request->name,
        ]);
        return redirect()->route("admin.categoryreport.index")->with("success", "Thêm danh mục thành công");
    }
    public function edit($id)
    {
        //tìm category theo id
        $category = CategoryReport::find($id);
        return view("admin.categoryreport.edit", compact("category"));
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

        //sẽ tìm và update trực tiếp không cần tốn query
        $category = CategoryReport::find($id);
        $category = $category->update([
            "name" => $request->name,
        ]);
        return redirect()->route("admin.categoryreport.index")->with("success", "Cập nhật danh mục thành công");
    }

    public function delete($id)
    {
        CategoryReport::where("id", $id)->delete();
        return redirect()->route("admin.categoryreport.index")->with("success", "Xóa danh mục thành công");
    }
}
