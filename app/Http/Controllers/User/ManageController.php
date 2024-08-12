<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Dish;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ManageController extends Controller
{
    public function index()
    {
        $dish = Auth::user()->dish; 
        return view('web.manage', compact('dish'));
    }

    public function edit($id)
    {
        $dish = Dish::findOrFail($id);
        $categories = Category::all();
        return view('web.edit', compact('dish', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate(
            [
                'id_category' => 'required',
                'title' => 'required',
                'summary' => 'required',
                'image' => 'nullable|image',
                'description' => 'required',
            ],
            [
                'title.required' => 'Bạn chưa nhập tiêu đề',
                'summary.required' => 'Bạn chưa nhập tóm tắt',
                'description.required' => 'Bạn chưa nhập nội dung',
                'id_category.required' => 'Bạn chưa nhập danh mục',
            ]
        );

        $dish = Dish::findOrFail($id);

        $slug = Str::slug($request->title);

        $checkSlug = Dish::where('slug', $slug)->first();
        while ($checkSlug && $checkSlug->id != $id) {
            $slug = $checkSlug->slug . Str::random(2);
            $checkSlug = Dish::where('slug', $slug)->first();
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name_file = $file->getClientOriginalName();
            $extension = pathinfo($name_file, PATHINFO_EXTENSION);

            if (in_array(strtolower($extension), ['jpg', 'png', 'jpeg'])) {
                $image = Str::random(5) . "_" . $name_file;
                while (file_exists("image/dish" . $image)) {
                    $image = Str::random(5) . "_" . $name_file;
                }
                $file->move('image/dish', $image);
                $dish->image = $image;
            }
        }

        $dish->update(
            [
                'title' => $request->title,
                'summary' => $request->summary,
                'description' => $request->description,
                'slug' => $slug,
                'id_category' => $request->id_category,
                'image' => isset($image) ? $image : $dish->image,
                'highlight_post' => $request->highlight_post ? 1 : 0,
                'new_post' => $request->new_post ? 1 : 0,
                'status' => 0,
            ]
        );

        return redirect()->route('manage.index')->with('success', 'Bạn đã cập nhật công thức thành công');
    }

    public function delete($id)
    {
        $dish = Dish::findOrFail($id);
        $dish->delete();

        return redirect()->route('manage.index')->with('success', 'Bạn đã xóa công thức thành công');
    }

    public function manageRepport()
    {
        $user = Auth::user();
        $reports = Report::where('user_id', $user->id)->get();

        return view('web.manage_report', compact('reports'));
    }
    public function manageRepportDelete($id){
        $report = Report::findOrFail($id);
        $report->delete();
        return redirect()->route('manage.report.index')->with('success', 'Bạn đã xóa báo cáo thành công');
    }
}
    