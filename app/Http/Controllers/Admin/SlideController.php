<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SlideController extends Controller
{
    public function index()
    {
        $slides = Slide::orderBy('sortNumber')->get();
        return view("admin.slide.list", compact("slides"));
    }
    public function view($id)
    {
        $slide = Slide::findOrFail($id);
        return view('admin.slide.view', compact('slide'));
    }

    public function create()
    {
        return view("admin.slide.create");
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
                "name" => "required",
                // "image"=> "required|image|mimes:jpg,png,jpeg|max:2048",
                'image' => 'required',
                "description" => "required",
                "sortNumber" => "required|integer|min:0",
            ],
            [
                'name.required' => 'Bạn chưa nhập tên slide',
                'image.required' => 'Bạn chưa tải hình ảnh',
                'description.required' => 'Bạn chưa nhập tên nội dung',
                'sortNumber.required' => 'Bạn chưa nhập số thứ tự',
                'sortNumber.integer' => 'Số thứ tự phải là một số nguyên',
                'sortNumber.min' => 'Số thứ tự phải là một số không âm',
            ]
        );

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

                while (file_exists("image/slide" . $image)) {
                    $image = Str::random(5) . "_" . $name_file;
                }
                $file->move('image/slide', $image);
            }
        }

        Slide::create([
            'name' => $request->name,
            'image' => $image,
            'description' => $request->description,
            'sortNumber' => $request->sortNumber,
        ]);

        return redirect()->route("admin.slide.index")->with("success", "Thêm slide thành công");
    }

    public function edit($id)
    {
        $slide = Slide::find($id);
        return view("admin.slide.edit", compact("slide"));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate(
            [
                "name" => "required",
                "description" => "required",
                "sortNumber" => "required|integer",
            ],
            [
                'name.required' => 'Bạn chưa nhập tên slide',
                
                'description.required' => 'Bạn chưa nhập tên nội dung',
                'sortNumber.required' => 'Bạn chưa nhập số thứ tự',
                'sortNumber.integer' => 'Số thứ tự phải là một số nguyên',
            ]
        );

        $slide = Slide::find($id);

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

                while (file_exists("image/slide" . $image)) {
                    $image = Str::random(5) . "_" . $name_file;
                }
                $file->move('image/slide', $image);
            }
        }


        $slide->update([
            'name' => $request->name,
            'image' => isset($image) ? $image : $slide->image,
            'description' => $request->description,
            'sortNumber' => $request->sortNumber,
        ]);

        return redirect()->route("admin.slide.index")->with("success", "Cập nhật slide thành công");
    }

    public function delete($id)
    {
        Slide::where("id", $id)->delete();
        return redirect()->route("admin.slide.index")->with("success", "Xóa slide thành công");
    }
}
