<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryEvent;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::paginate(5);
        return view("admin.event.list", compact("events"));
    }
    public function view($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.event.view', compact('event'));
    }
    public function create()
    {
        $categoriesevent = CategoryEvent::all();
        return view("admin.event.create", compact("categoriesevent"));
    }
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'eventcategories_id' => 'required',
                'title' => 'required',
                'image' => 'required',
                'description' => 'required',

            ],
            [
                'tittle.required' => 'Bạn chưa nhập tên thể loại',
                'image.required' => 'Bạn chưa tải hình ảnh',
                'description.required' => 'Bạn chưa nhập nội dung',
                'eventcategories_id.required' => 'Bạn chưa nhập danh mục',
            ]
        );
        //2 slug trung nhau 
        $slug = Str::slug($request->title);

        $checkSlug = Event::where('slug', $slug)->first();
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

                while (file_exists("image/event" . $image)) {
                    $image = Str::random(5) . "_" . $name_file;
                }
                $file->move('image/event', $image);
            }
        }

        Event::create(
            [
                'title' => $request->title,
                'image' => $image,
                'slug' =>$slug,
                'description' => $request->description,
                'user_id' => Auth::id(), //Auth::id() lay id cua nguoi dung dang dang nhap
                'eventcategories_id' => $request->eventcategories_id,
            ]
        );
        return redirect()->route("admin.event.index")->with("success", "Thêm sự kiện thành công");
    }

    public function edit($id)
    {
        $events = Event::find($id);
        $categoriesevent = CategoryEvent::all();
        return view("admin.event.edit", compact("events", "categoriesevent"));
    }

    public function update(Request $request, $id)
    {

        $data = $request->validate(
            [
                'eventcategories_id' => 'required',
                'title' => 'required',
                'description' => 'required',

            ],
            [
                'tittle.required' => 'Bạn chưa nhập tên thể loại',
                'description.required' => 'Bạn chưa nhập nội dung',
                'eventcategories_id.required' => 'Bạn chưa nhập danh mục',
            ]
        );

        //2 slug trung nhau 
        $slug = Str::slug($request->title);

        $checkSlug = Event::where('slug', $slug)->first();
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
                || strnatcasecmp($extension, 'jpeg') == 0
            ) {


                $image = Str::random(5) . "_" . $name_file;

                while (file_exists("image/event" . $image)) {
                    $image = Str::random(5) . "_" . $name_file;
                }
                $file->move('image/event', $image);
            }
        }

        $event = Event::find($id);
        $event->update([
            'title' => $request->title,
            'slug' => $slug,
            'image' => isset($image) ? $image : $event->image,
            'description' => $request->description,
            'eventcategories_id' => $request->eventcategories_id,
        ]);

        return redirect()->route("admin.event.index", $id)->with("success", "Cập nhật sự kiện thành công");
    }

    public function delete($id)
    {
        Event::find($id)->delete();
        return redirect()->route("admin.event.index", $id)->with("success", "Xóa sự kiện thành công");
    }
}
