<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CategoryEvent;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function categoryevent()
    {
        $events = Event::all();
        $categoriesEvent = CategoryEvent::all();
        return view('web.categoryevent', compact('events', 'categoriesEvent'));
    }
    public function categoryeventSlug($slug)
    {
        $categoryevent = CategoryEvent::where('slug', $slug)->firstOrFail();
        $events = Event::where('eventcategories_id', $categoryevent->id)->paginate(10);
        $categoriesEvent = CategoryEvent::all();

        return view('web.categoryevent', compact('events', 'categoriesEvent'));
    }
    public function event($slug)
    {
        $event = Event::where('slug', $slug)->first();
        return view('web.event', compact('event'));
    }
    public function sendEvent(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'event_id' => 'required|exists:events,id',
        ]);

        // Tìm hoặc tạo người dùng
        $user = User::firstOrCreate(
            ['email' => $request->email],
            ['name' => $request->name]
        );

        // Lưu mối quan hệ giữa người dùng và sự kiện
        $event = Event::find($request->event_id);
        $event->users()->attach($user->id);

        return redirect()->back()->with('success', 'Bạn đã đăng ký sự kiện thành công!');
    }
}
