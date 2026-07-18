<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('order')->get();
        return view('cms.services.index', compact('services'));
    }

    public function create()
    {
        return view('cms.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'icon'        => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'order'       => 'nullable|integer',
        ]);

        Service::create([
            'title'       => $request->title,
            'icon'        => $request->icon ?? 'fas fa-tools',
            'description' => $request->description,
            'order'       => $request->order ?? 0,
        ]);

        return redirect('/cms-admin/services')->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('cms.services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $request->validate([
            'title'       => 'required|string|max:255',
            'icon'        => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'order'       => 'nullable|integer',
        ]);

        $service->update([
            'title'       => $request->title,
            'icon'        => $request->icon ?? 'fas fa-tools',
            'description' => $request->description,
            'order'       => $request->order ?? 0,
        ]);

        return redirect('/cms-admin/services')->with('success', 'Layanan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Service::findOrFail($id)->delete();
        return redirect('/cms-admin/services')->with('success', 'Layanan berhasil dihapus.');
    }
}
