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
            'icon' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'order' => 'nullable|integer',
        ]);

        Service::create([
            'icon' => $request->icon,
            'title' => $request->title,
            'description' => $request->description,
            'order' => $request->order ?? 0,
        ]);

        return redirect('/cms-admin/services')->with('success', 'Layanan berhasil ditambahkan');
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
            'icon' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'order' => 'nullable|integer',
        ]);

        $service->update([
            'icon' => $request->icon,
            'title' => $request->title,
            'description' => $request->description,
            'order' => $request->order ?? 0,
        ]);

        return redirect('/cms-admin/services')->with('success', 'Layanan berhasil diupdate');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect('/cms-admin/services')->with('success', 'Layanan berhasil dihapus');
    }
}
