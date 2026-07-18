<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Documentation;

class DocumentationController extends Controller
{
    public function index()
    {
        $documentations = Documentation::orderBy('order')->get();
        return view('cms.documentations.index', compact('documentations'));
    }

    public function create()
    {
        return view('cms.documentations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'title' => 'required|string',
            'description' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = time() . '.' . $file->extension();
            $file->move(public_path('uploads'), $name);
            $imagePath = 'uploads/' . $name;
        }

        Documentation::create([
            'image' => $imagePath,
            'title' => $request->title,
            'description' => $request->description,
            'order' => $request->order ?? 0,
        ]);

        return redirect('/cms-admin/documentations')->with('success', 'Dokumentasi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $documentation = Documentation::findOrFail($id);
        return view('cms.documentations.edit', compact('documentation'));
    }

    public function update(Request $request, $id)
    {
        $documentation = Documentation::findOrFail($id);

        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'title' => 'required|string',
            'description' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'order' => $request->order ?? 0,
        ];

        if ($request->hasFile('image')) {
            if ($documentation->image && file_exists(public_path($documentation->image))) {
                @unlink(public_path($documentation->image));
            }
            $file = $request->file('image');
            $name = time() . '.' . $file->extension();
            $file->move(public_path('uploads'), $name);
            $data['image'] = 'uploads/' . $name;
        }

        $documentation->update($data);

        return redirect('/cms-admin/documentations')->with('success', 'Dokumentasi berhasil diupdate');
    }

    public function destroy($id)
    {
        $documentation = Documentation::findOrFail($id);
        if ($documentation->image && file_exists(public_path($documentation->image))) {
            @unlink(public_path($documentation->image));
        }
        $documentation->delete();

        return redirect('/cms-admin/documentations')->with('success', 'Dokumentasi berhasil dihapus');
    }
}
