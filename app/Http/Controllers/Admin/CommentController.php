<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Report;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {   
        $comments = Comment::with('reports')->paginate(5);
        return view("admin.comment.list", compact("comments"));
    }

    public function showReports($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->status = !$comment->status;
        $reports = Report::where('id_comment', $id)->get();

        return view('admin.comment.reports', compact('comment', 'reports'));
    }

    public function updateReportStatus(Request $request, $id)
    {
        $report = Report::findOrFail($id);
        $report->status = $request->input('status'); 
        $report->save();

        $comment = Comment::find($report->id_comment);

        if ($comment->reports()->where('status', 1)->count() >= 5) {
            $comment->status = 0; 
        } else {
            $comment->status = 1; 
        }
            $comment->save();
        

        return redirect()->back()->with('success', 'Cập nhật trạng thái báo cáo thành công.');
    }
    public function showComments()
    {
        $comments = Comment::withCount('reports')->get();
        return view('comments.index', compact('comments'));
    }

}
