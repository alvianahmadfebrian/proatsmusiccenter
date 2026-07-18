<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('order')->get();
        return view('cms.products.index', compact('products'));
    }

    public function create()
    {
        return view('cms.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'category'    => 'nullable|string|max:100',
            'features'    => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'order'       => 'nullable|integer',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        Product::create([
            'title'    => $request->title,
            'category' => $request->category,
            'features' => $request->features,
            'image'    => $imagePath,
            'order'    => $request->order ?? 0,
        ]);

        return redirect('/cms-admin/products')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('cms.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'title'    => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
            'features' => 'nullable|string',
            'image'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'order'    => 'nullable|integer',
        ]);

        $data = [
            'title'    => $request->title,
            'category' => $request->category,
            'features' => $request->features,
            'order'    => $request->order ?? 0,
        ];

        if ($request->hasFile('image')) {
            if ($product->image) Storage::disk('public')->delete($product->image);
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect('/cms-admin/products')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->image) Storage::disk('public')->delete($product->image);
        $product->delete();
        return redirect('/cms-admin/products')->with('success', 'Produk berhasil dihapus.');
    }
}
