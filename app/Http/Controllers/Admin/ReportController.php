<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::with(['user', 'dish', 'comments'])->get();
        return view('admin.report.list', compact('reports'));
    }

    public function show($id)
    {
        $report = Report::with(['user', 'dish', 'comments'])->findOrFail($id);
        return view('admin.report.show', compact('report'));
    }
}
