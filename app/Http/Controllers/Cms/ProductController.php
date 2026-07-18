<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

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
            'category' => 'required|string',
            'title' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'features' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = time() . '.' . $file->extension();
            $file->move(public_path('uploads'), $name);
            $imagePath = 'uploads/' . $name;
        }

        Product::create([
            'category' => $request->category,
            'title' => $request->title,
            'image' => $imagePath,
            'features' => $request->features,
            'order' => $request->order ?? 0,
        ]);

        return redirect('/cms-admin/products')->with('success', 'Produk berhasil ditambahkan');
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
            'category' => 'required|string',
            'title' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'features' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        $data = [
            'category' => $request->category,
            'title' => $request->title,
            'features' => $request->features,
            'order' => $request->order ?? 0,
        ];

        if ($request->hasFile('image')) {
            if ($product->image && file_exists(public_path($product->image))) {
                @unlink(public_path($product->image));
            }
            $file = $request->file('image');
            $name = time() . '.' . $file->extension();
            $file->move(public_path('uploads'), $name);
            $data['image'] = 'uploads/' . $name;
        }

        $product->update($data);

        return redirect('/cms-admin/products')->with('success', 'Produk berhasil diupdate');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->image && file_exists(public_path($product->image))) {
            @unlink(public_path($product->image));
        }
        $product->delete();

        return redirect('/cms-admin/products')->with('success', 'Produk berhasil dihapus');
    }
}
