<?php

namespace App\Http\Controllers;

use App\Models\Commitment;
use App\Models\Project;
use App\Models\Service;
use App\Models\Technology;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $services = Service::query()
            ->where('is_active', true)
            ->with('translations')
            ->orderBy('sort_order')
            ->get();

        $projects = Project::query()
            ->published()
            ->with(['translations', 'technologies'])
            ->orderBy('sort_order')
            ->get();

        $technologies = Technology::query()
            ->where('show_in_stack', true)
            ->orderBy('sort_order')
            ->get();

        $commitments = Commitment::query()
            ->where('is_active', true)
            ->with('translations')
            ->orderBy('sort_order')
            ->get();

        return view('home', compact(
            'services',
            'projects',
            'technologies',
            'commitments',
        ));
    }
}
