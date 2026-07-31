<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Commitment;
use App\Models\Message;
use App\Models\Project;
use App\Models\Service;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        $counts = [
            'services' => Service::count(),
            'projects' => Project::count(),
            'commitments' => Commitment::count(),
            'messages' => Message::count(),
            'new' => Message::where('status', 'new')->count(),
        ];

        $latest = Message::query()
            ->where('status', '!=', 'spam')
            ->latest()
            ->limit(8)
            ->get();

        return view('admin.dashboard', compact('counts', 'latest'));
    }
}
