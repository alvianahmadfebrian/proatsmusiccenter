<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HeroSlider;
use Illuminate\Support\Facades\Storage;

class HeroSliderController extends Controller
{
    public function index()
    {
        $sliders = HeroSlider::orderBy('order')->get();
        return view('cms.hero_sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('cms.hero_sliders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image'    => 'required|image|mimes:jpeg,png,jpg,webp|max:3072',
            'title'    => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'icon'     => 'nullable|string|max:100',
            'order'    => 'nullable|integer',
        ]);

        $imagePath = $request->file('image')->store('hero_sliders', 'public');

        HeroSlider::create([
            'image'    => $imagePath,
            'title'    => $request->title ?? '',
            'subtitle' => $request->subtitle ?? '',
            'icon'     => $request->icon ?? 'fas fa-award',
            'order'    => $request->order ?? 0,
        ]);

        return redirect('/cms-admin/hero-sliders')->with('success', 'Foto slider berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $slider = HeroSlider::findOrFail($id);
        return view('cms.hero_sliders.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $slider = HeroSlider::findOrFail($id);

        $request->validate([
            'image'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
            'title'    => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'icon'     => 'nullable|string|max:100',
            'order'    => 'nullable|integer',
        ]);

        $data = [
            'title'    => $request->title ?? $slider->title,
            'subtitle' => $request->subtitle ?? $slider->subtitle,
            'icon'     => $request->icon ?? $slider->icon,
            'order'    => $request->order ?? 0,
        ];

        if ($request->hasFile('image')) {
            if ($slider->image && !str_starts_with($slider->image, 'assets/')) {
                Storage::disk('public')->delete($slider->image);
            }
            $data['image'] = $request->file('image')->store('hero_sliders', 'public');
        }

        $slider->update($data);

        return redirect('/cms-admin/hero-sliders')->with('success', 'Foto slider berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $slider = HeroSlider::findOrFail($id);
        if ($slider->image && !str_starts_with($slider->image, 'assets/')) {
            Storage::disk('public')->delete($slider->image);
        }
        $slider->delete();

        return redirect('/cms-admin/hero-sliders')->with('success', 'Foto slider berhasil dihapus.');
    }
}
