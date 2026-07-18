<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function edit()
    {
        $profile = Profile::first();
        return view('cms.profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $profile = Profile::first();
        
        $request->validate([
            'tag' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        $data = $request->except('_token');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = time() . '.' . $file->extension();
            $file->move(public_path('uploads'), $name);
            $data['image'] = 'uploads/' . $name;
        }

        $profile->update($data);
        return back()->with('success', 'Profil berhasil diupdate');
    }
}
