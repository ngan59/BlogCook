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
        $data = $this->validateEvent($request);
     
        $slug = $this->generateUniqueSlug($request->title);

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
                'slug' => $slug,
                'description' => $request->description,
                'user_id' => Auth::id(),
                'eventcategories_id' => $request->eventcategories_id,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'location' => $request->location,
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

        $data = $this->validateEvent($request);
        $slug = $this->generateUniqueSlug($request->title);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name_file = $file->getClientOriginalName();
            $extension = pathinfo($name_file, PATHINFO_EXTENSION);
            if (in_array(strtolower($extension), ['jpg', 'png', 'jpeg'])) {
                $image = Str::random(5) . "_" . $name_file;
                while (file_exists("image/event/" . $image)) {
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
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'location' => $request->location,
        ]);

        return redirect()->route("admin.event.index", $id)->with("success", "Cập nhật sự kiện thành công");
    }

    public function delete($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();        
        return redirect()->route("admin.event.index", $id)->with("success", "Xóa sự kiện thành công");
    }

    public function participants($id)
    {
        $event = Event::findOrFail($id);
        $participants = $event->users;
        return view('admin.event.participants', compact('event', 'participants'));
    }
    private function validateEvent(Request $request)
    {
        return $request->validate([
            'eventcategories_id' => 'required',
            'title' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg',
            'description' => 'required',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
            'location' => 'required',
        ], 
        [
            'title.required' => 'Bạn chưa nhập tên sự kiện',
            'image.image' => 'Hình ảnh không hợp lệ',
            'description.required' => 'Bạn chưa nhập nội dung',
            'eventcategories_id.required' => 'Bạn chưa chọn danh mục',
            'start_date.required' => 'Bạn chưa chọn ngày bắt đầu',
            'start_date.date' => 'Ngày bắt đầu không hợp lệ',
            'start_date.after_or_equal' => 'Ngày bắt đầu phải là ngày hôm nay hoặc sau đó',
            'end_date.required' => 'Bạn chưa chọn ngày kết thúc',
            'end_date.date' => 'Ngày kết thúc không hợp lệ',
            'end_date.after_or_equal' => 'Ngày kết thúc phải sau hoặc bằng ngày bắt đầu',
            'location.required' => 'Bạn chưa nhập tên địa chỉ',
        ]);
    }

    private function generateUniqueSlug($title)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $i = 1;

        while (Event::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $i;
            $i++;
        }

        return $slug;
    }
}
