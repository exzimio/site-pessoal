<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        $counts = [
            'new' => Message::where('status', 'new')->count(),
            'read' => Message::where('status', 'read')->count(),
            'replied' => Message::where('status', 'replied')->count(),
            'spam' => Message::where('status', 'spam')->count(),
            'total' => Message::count(),
        ];

        $latest = Message::query()
            ->where('status', '!=', 'spam')
            ->latest()
            ->limit(8)
            ->get();

        return view('admin.dashboard', compact('counts', 'latest'));
    }
}
