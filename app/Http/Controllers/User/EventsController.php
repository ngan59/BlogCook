<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CategoryEvent;
use App\Models\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{

 public function categoryevent()
    {
        //$events = Event::paginate(1);
        $events = Event::all();
        $categoriesEvent = CategoryEvent::all();
        return view('web.categoryevent', compact('events', 'categoriesEvent'));
    }

    public function categoryeventSlug($slug)
    {
        $categoryevent = CategoryEvent::where('slug', $slug)->first();
        $events = Event::where('eventcategories_id', $categoryevent->id)->paginate(1);
        $categoriesEvent = CategoryEvent::all();

        return view('web.categoryevent', compact('events', 'categoriesEvent'));
    }

    public function event($slug)
    {
        $event = Event::where('slug', $slug)->firstOrFail();
        return view('web.event', compact('event'));
    }

    public function sendEvent(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
        ]);

        $event = Event::findOrFail($request->event_id);

        $userId = auth()->id(); // Assuming users are authenticated

        if ($event->users()->where('user_id', $userId)->exists()) {
            return redirect()->back()->with('error', 'Bạn đã đăng ký sự kiện này trước đó!');
        }

        $event->users()->attach($userId);

        return redirect()->back()->with('success', 'Bạn đã đăng ký sự kiện thành công!');
    }
}
