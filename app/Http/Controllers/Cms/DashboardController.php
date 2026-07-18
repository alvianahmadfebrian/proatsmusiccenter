<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Service;
use App\Models\Timeline;
use App\Models\Documentation;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'products' => Product::count(),
            'services' => Service::count(),
            'timelines' => Timeline::count(),
            'documentations' => Documentation::count(),
        ];
        return view('cms.dashboard', compact('stats'));
    }
}
