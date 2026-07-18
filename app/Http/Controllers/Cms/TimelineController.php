<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Timeline;

class TimelineController extends Controller
{
    public function index()
    {
        $timelines = Timeline::orderBy('order')->get();
        return view('cms.timeline.index', compact('timelines'));
    }

    public function create()
    {
        return view('cms.timeline.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'year' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'order' => 'nullable|integer',
        ]);

        Timeline::create([
            'year' => $request->year,
            'title' => $request->title,
            'description' => $request->description,
            'order' => $request->order ?? 0,
        ]);

        return redirect('/cms-admin/timeline')->with('success', 'Timeline berhasil ditambahkan');
    }

    public function edit($id)
    {
        $timeline = Timeline::findOrFail($id);
        return view('cms.timeline.edit', compact('timeline'));
    }

    public function update(Request $request, $id)
    {
        $timeline = Timeline::findOrFail($id);

        $request->validate([
            'year' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'order' => 'nullable|integer',
        ]);

        $timeline->update([
            'year' => $request->year,
            'title' => $request->title,
            'description' => $request->description,
            'order' => $request->order ?? 0,
        ]);

        return redirect('/cms-admin/timeline')->with('success', 'Timeline berhasil diupdate');
    }

    public function destroy($id)
    {
        $timeline = Timeline::findOrFail($id);
        $timeline->delete();

        return redirect('/cms-admin/timeline')->with('success', 'Timeline berhasil dihapus');
    }
}
