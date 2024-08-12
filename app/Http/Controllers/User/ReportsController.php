<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CategoryReport;
use App\Models\Comment;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Log;

class ReportsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            // 'reason' => 'required|exists:categoryreport,id', 
            'id_categoryreport' => 'required|exists:categoryreport,id', 
            'id_dish' => 'nullable|exists:dish,id',
            'id_comment' => 'nullable|exists:comments,id',
        ], [
            'reason.required' => 'Bạn cần phải chọn lý do báo cáo.',
            'reason.exists' => 'Lý do báo cáo không hợp lệ.',
            'id_dish.exists' => 'Món ăn không tồn tại.',
            'id_comment.exists' => 'Bình luận không tồn tại.',
        ]);

        // if (!$request->input('id_dish') && !$request->input('id_comment')) {
        //     return back()->withErrors(['error' => 'Either id_dish or id_comment must be provide  d.']);
        // }

        if ($request->input('id_comment')) {

            $comment = Comment::find($request->input('id_comment'));

            if ($comment && $comment->user_id == Auth::id()) {
                session()->flash('error', 'Bạn không thể báo cáo bình luận của chính mình.');
                return back();
            }

            $existingReport = Report::where('user_id', Auth::id())
                ->where('id_comment', $request->input('id_comment'))
                ->first();

            if ($existingReport) {
                session()->flash('error', 'Bạn đã báo cáo bình luận này rồi.');
                return back();
            }
        }


        Report::create([
            'report_reason' => $request->input('id_categoryreport'),
            'id_categoryreport' => $request->input('id_categoryreport'),
            'status' => '0',
            'user_id' => auth()->id(),
            'id_dish' => $request->input('id_dish'),
            'id_comment' => $request->input('id_comment'),
        ]);

        return back()->with('success', 'Báo cáo của bạn đã được gửi thành công.');
    }
}
