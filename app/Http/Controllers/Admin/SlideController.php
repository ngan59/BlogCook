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
        // $slides = Slide::all();
        $slides = Slide::orderBy('sortNumber')->get();
        return view("admin.slide.list", compact("slides"));
    }

    public function create()
    {
        return view("admin.slide.create");
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "name"=> "required",
            "image"=> "required",
            "description"=> "required",
            "sortNumber"=> "required|integer",       
        ],
       [ 
        'name.required' => 'Bạn chưa nhập tên slide',
        'image.required' => 'Bạn chưa tải hình ảnh',
        'description.required' => 'Bạn chưa nhập tên nội dụng',
        'sortNumber.required' => 'Bạn chưa nhập số thứ tự',
        'sortNumber.integer' => 'Số thứ tự phải là một số nguyên',
        ]);
        $image = null; 
        if ($request->hasFile('image')) {
            // Kiểm tra xem yêu cầu có chứa file với tên 'image' hay không
            $file = $request->file('image');
            // Lấy file từ yêu cầu và gán cho biến $file
        
            $name_file = $file->getClientOriginalName();
            // Lấy tên gốc của file và gán cho biến $name_file
        
            $extension = pathinfo($name_file, PATHINFO_EXTENSION);
            // Lấy phần mở rộng của file (ví dụ: jpg, png) và gán cho biến $extension
        
            if (
                strnatcasecmp($extension, 'jpg') == 0
                || strnatcasecmp($extension, 'png') == 0
                || strnatcasecmp($extension, 'jepg') == 0
            ) {
                // Kiểm tra xem phần mở rộng của file có phải là 'jpg', 'png', hoặc 'jepg' hay không (không phân biệt hoa thường)
        
                $image = Str::random(5) . "_" . $name_file;
                // Tạo một tên file mới bằng cách nối chuỗi ngẫu nhiên dài 5 ký tự và tên gốc của file, gán cho biến $image
        
                while (file_exists("image/slide" . $image)) {
                    // Kiểm tra xem file đã tồn tại trong thư mục 'image/dish' hay chưa
                    $image = Str::random(5) . "_" . $name_file;
                    // Nếu đã tồn tại, tạo lại tên file mới
                }
        
                $file->move('image/slide', $image);
                // Di chuyển file vào thư mục 'image/dish' với tên file mới
            }
        }
        

        $slide = Slide::create([
            'name' => $request->name,
            'image' => $image,
            'description' => $request->description,
            'sortNumber' => $request->sortNumber,

        ]);
        return redirect()->route("admin.slide.index")->with("success", "Create Successfully");
    }

    public function edit($id)
    {
        $slide = Slide::find($id);
        return view("admin.slide.edit", compact("slide"));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            "name"=> "required",
            "image"=> "required",
            "description"=> "required",
            "sortNumber"=> "required|integer",       
        ],
       [ 
        'name.required' => 'Bạn chưa nhập tên slide',
        'image.required' => 'Bạn chưa tải hình ảnh',
        'description.required' => 'Bạn chưa nhập tên nội dụng',
        'sortNumber.required' => 'Bạn chưa nhập số thứ tự',
        'sortNumber.integer' => 'Số thứ tự phải là một số nguyên',
        ]);
        $image = null; 
        if ($request->hasFile('image')) {
            // Kiểm tra xem yêu cầu có chứa file với tên 'image' hay không
            $file = $request->file('image');
            // Lấy file từ yêu cầu và gán cho biến $file
        
            $name_file = $file->getClientOriginalName();
            // Lấy tên gốc của file và gán cho biến $name_file
        
            $extension = pathinfo($name_file, PATHINFO_EXTENSION);
            // Lấy phần mở rộng của file (ví dụ: jpg, png) và gán cho biến $extension
        
            if (
                strnatcasecmp($extension, 'jpg') == 0
                || strnatcasecmp($extension, 'png') == 0
                || strnatcasecmp($extension, 'jepg') == 0
            ) {
                // Kiểm tra xem phần mở rộng của file có phải là 'jpg', 'png', hoặc 'jepg' hay không (không phân biệt hoa thường)
        
                $image = Str::random(5) . "_" . $name_file;
                // Tạo một tên file mới bằng cách nối chuỗi ngẫu nhiên dài 5 ký tự và tên gốc của file, gán cho biến $image
        
                while (file_exists("image/slide" . $image)) {
                    // Kiểm tra xem file đã tồn tại trong thư mục 'image/dish' hay chưa
                    $image = Str::random(5) . "_" . $name_file;
                    // Nếu đã tồn tại, tạo lại tên file mới
                }
        
                $file->move('image/slide', $image);
                // Di chuyển file vào thư mục 'image/dish' với tên file mới
            }
        }

        $slide = Slide::find($id);
        $slide->update([
            'title' => $request->title,
            'image' => isset($image) ? $image : $slide->image,
            'description' => $request->description,
            'sortNumber' => $request->sortNumber,
        ]);

        return redirect()->route("admin.slide.index")->with("success", "Update Successfully");
    }

    public function delete($id)
    {
        Slide::where("id", $id)->delete();

        return redirect()->route("admin.category.index")->with("success", "Delete Successfully");
    }
}
