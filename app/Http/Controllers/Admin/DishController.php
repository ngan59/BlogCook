<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DishController extends Controller
{
    public function index()
    {
        // $dishs = Dish::paginate(10);
        $dishs = Dish::all();
        return view("admin.dish.list", compact("dishs"));
    }
    public function view($id)
    {
        $dish = Dish::findOrFail($id);
        return view('admin.dish.view', compact('dish'));
    }
    public function create()
    {
        $categories = Category::all();
        return view("admin.dish.create", compact("categories"));
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
                'video_url' => 'nullable|url'
            ],
            [
                'tittle.required' => 'Bạn chưa nhập tiêu đề',
                'summary.required' => 'Bạn chưa nhập tóm tắt',
                'description.required' => 'Bạn chưa nhập nội dung',
                'image.required' => 'Bạn chưa tải hình ảnh',
                'id_category.required' => 'Bạn chưa nhập danh mục',
            ]
        );

        //2 slug trung nhau 
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
                'video_url' => $request->video_url,
                'view_count' => 0,
                'user_id' => Auth::id(), //lay id cua nguoi dung dang dang nhap
                'new_post' => $request->new_post ? 1 : 0,
                'slug' => $slug,
                'id_category' => $request->id_category,
                'highlight_post' => $request->highlight_post ? 1 : 0,
                'status' => $request->status,
            ]
        );
        return redirect()->route("admin.dish.index")->with("success", "Thêm công thức thành công");
    }

    public function edit($id)
    {
        $dish = Dish::find($id);
        $categories = Category::all();
        return view("admin.dish.edit", compact("dish", "categories"));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate(
            [
                'id_category' => 'required',
                'title' => 'required',
                'summary' => 'required',
                'description' => 'required',
                'new_post' => 'required_without:highlight_post',
            'highlight_post' => 'required_without:new_post'

            ],
            [
                'tittle.required' => 'Bạn chưa nhập tên thể loại',
                'summary.required' => 'Bạn chưa nhập tóm tắt',
                'description.required' => 'Bạn chưa nhập nội dung',
                'id_category.required' => 'Bạn chưa nhập danh mục',
                'new_post.required_without' => 'Bạn phải chọn ít nhất một trong hai: Bài viết mới hoặc Bài viết nổi bật.',
            'highlight_post.required_without' => 'Bạn phải chọn ít nhất một trong hai: Bài viết mới hoặc Bài viết nổi bật.'
            ]
        );

        $slug = Str::slug($request->title);
        $checkSlug = Dish::where('slug', $slug)->first();
        while ($checkSlug) {
            $slug = $checkSlug->slug . Str::random(2);
            $checkSlug = Dish::where('slug', $slug)->first(); // Thêm dòng này để kiểm tra lại sau khi tạo slug mới
        }


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name_file = $file->getClientOriginalName();
            $extension = pathinfo($name_file, PATHINFO_EXTENSION);
            if (in_array(strtolower($extension), ['jpg', 'png', 'jpeg'])) {
                $image = Str::random(5) . "_" . $name_file;
                while (file_exists("image/dish/" . $image)) {
                    $image = Str::random(5) . "_" . $name_file;
                }
                $file->move('image/dish', $image);
            }
        }

        $dish = Dish::find($id);

        $dish->update([
            'title' => $request->title,
            'description' => $request->description,
            'summary' => $request->summary,
            // kiem tra neu co bien image do thi se doi, con ko thi lu lai cai cu
            'image' => isset($image) ? $image : $dish->image,
            'new_post' => $request->new_post ? 1 : 0,
            'slug' => $slug,
            'id_category' => $request->id_category,
            'highlight_post' => $request->highlight_post ? 1 : 0,
            'status' => $request->status,
        ]);

        return redirect()->route("admin.dish.index", $id)->with("success", "Cập nhật công thức thành công");
    }

    public function delete($id)
    {
        Dish::find($id)->delete();
        return redirect()->route("admin.dish.index")->with("success", "Xóa công thức thành công");
    }

    public function showComments($id)
{
    $dish = Dish::with('comments')->findOrFail($id);
    return view('admin.dish.comments', compact('dish'));
}
public function status($id)
{
    $comment = Comment::findOrFail($id);
    $comment->status = !$comment->status;
    $comment->save();

    return redirect()->back()->with('success', 'Cập nhật trạng thái bình luận thành công.');
}


}
