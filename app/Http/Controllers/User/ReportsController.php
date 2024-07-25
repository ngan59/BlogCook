<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CategoryReport;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Log;

class ReportsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'reason' => 'required|string|max:255',
            'id_dish' => 'nullable|exists:dish,id',
            'id_comment' => 'nullable|exists:comments,id',
        ]);

        Report::create([
            'report_reason' => $request->input('reason'),
            'status' => '1',
            'user_id' => auth()->id(),
            'id_dish' => $request->input('id_dish'),
            'id_comment' => $request->input('id_comment'),
        ]);

        return back()->with('success', 'Báo cáo của bạn đã được gửi thành công.');
    }
    
}
