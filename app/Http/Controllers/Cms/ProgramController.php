<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Program;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::orderBy('order')->get();
        return view('cms.programs.index', compact('programs'));
    }

    public function create()
    {
        return view('cms.programs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'num' => 'required|string',
            'icon' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'perks' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        Program::create([
            'num' => $request->num,
            'icon' => $request->icon,
            'title' => $request->title,
            'description' => $request->description,
            'perks' => $request->perks,
            'order' => $request->order ?? 0,
        ]);

        return redirect('/cms-admin/programs')->with('success', 'Program berhasil ditambahkan');
    }

    public function edit($id)
    {
        $program = Program::findOrFail($id);
        return view('cms.programs.edit', compact('program'));
    }

    public function update(Request $request, $id)
    {
        $program = Program::findOrFail($id);

        $request->validate([
            'num' => 'required|string',
            'icon' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'perks' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        $program->update([
            'num' => $request->num,
            'icon' => $request->icon,
            'title' => $request->title,
            'description' => $request->description,
            'perks' => $request->perks,
            'order' => $request->order ?? 0,
        ]);

        return redirect('/cms-admin/programs')->with('success', 'Program berhasil diupdate');
    }

    public function destroy($id)
    {
        $program = Program::findOrFail($id);
        $program->delete();

        return redirect('/cms-admin/programs')->with('success', 'Program berhasil dihapus');
    }
}
