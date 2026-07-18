<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Documentation;
use Illuminate\Support\Facades\Storage;

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
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'title' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
        ]);

        $imagePath = $request->file('image')->store('documentations', 'public');

        Documentation::create([
            'image' => $imagePath,
            'title' => $request->title ?? '',
            'description' => $request->description,
            'order' => $request->order ?? 0,
        ]);

        return redirect('/cms-admin/documentations')->with('success', 'Foto dokumentasi berhasil ditambahkan.');
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'title' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
        ]);

        $data = [
            'title'       => $request->title ?? $documentation->title,
            'description' => $request->description,
            'order'       => $request->order ?? 0,
        ];

        if ($request->hasFile('image')) {
            if ($documentation->image) Storage::disk('public')->delete($documentation->image);
            $data['image'] = $request->file('image')->store('documentations', 'public');
        }

        $documentation->update($data);

        return redirect('/cms-admin/documentations')->with('success', 'Foto dokumentasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $doc = Documentation::findOrFail($id);
        if ($doc->image) Storage::disk('public')->delete($doc->image);
        $doc->delete();
        return redirect('/cms-admin/documentations')->with('success', 'Foto dokumentasi berhasil dihapus.');
    }
}
